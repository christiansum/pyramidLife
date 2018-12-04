<?php

namespace PylifeBundle\Controller;

use PylifeBundle\Entity\PlVentaDetalle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PylifeBundle\Entity\PlVenta;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Query;


class MisComprasController extends Controller{
	public function indexAction(){
		$em = $this->getDoctrine()->getManager();
		$user = $this->getUser()->getId();
		
		$plProducto = $em->getRepository('PylifeBundle:PlProducto')->findByProActive(1);
		
		// Existencias de Cada producto
		$existInventario = 0;
		$existVentaDetalle = 0;
		$existenciaTotal = 0;
		$stringArray = "";
		foreach ($plProducto as $pro){
			$plInventario = $em->getRepository('PylifeBundle:PlInventario')->findBy(array('invActive'=>1, 'invPro'=>$pro->getId()));
			foreach ($plInventario as $plInv){
				$existInventario += $plInv->getInvCantidad();
			}
			$plVentaDetalle = $em->getRepository('PylifeBundle:PlVentaDetalle')->findBy(array('vdActive'=>1, 'vdPro'=>$pro->getId() ));
			foreach ($plVentaDetalle as $plVD){
				$existVentaDetalle += $plVD->getVdCantidadVendida();
			}
			$existenciaTotal = ($existInventario - $existVentaDetalle)<0 ? 0 : $existInventario - $existVentaDetalle;
			$stringArray .="{'id':".$pro->getId().
						",'proPath':'".$pro->getProPath()."'".
						",'proNombre':'".$pro->getProNombre()."'".
						",'proPuntos':".$pro->getProPuntos()."".
						",'proPrecio':".$pro->getProPrecio()."".
						",'proMo':'".$pro->getProMo()."'".
						",'exist':".$existenciaTotal."},";
		}
		
		$repoVenta = $em->getRepository('PylifeBundle:PlVenta');
		$fechaActual = date("Y-m-d");
		$queryVenta =  $repoVenta->createQueryBuilder('v')
				->where('v.venActive = 1')
				->andWhere('v.venUsr = '.$user)
				->andWhere("v.venCreatedAt <= '".$fechaActual." 23:59:59'")
				->andWhere("v.venCreatedAt >= '".date("Y-m-d", strtotime($fechaActual."- 1 month"))." 23:59:59'")
				->getQuery();
		$plVentasRecientes = $queryVenta->getResult();
		
		$ventasArray = array();
		$productosVr = 0;
		$sumaCompras = 0;
		$sumaPuntosCompra = 0;
		if (isset($plVentasRecientes)){
			foreach ($plVentasRecientes as $vren) {
				$idVenta = $vren->getId();
				$plDetalle = $em->getRepository('PylifeBundle:PlVentaDetalle')->findBy(array('vdActive' => 1, 'vdVen' => $idVenta));
				foreach ($plDetalle as $det) {
					$sumaCompras += $det->getVdSumaMonto();
					$sumaPuntosCompra += $det->getVdSumaPuntos();
					$productosVr += $det->getVdCantidadVendida();
				}
				
				$ventasArray[] = array(
						'id' => $idVenta,
						'cantidad' => $productosVr,
						'monto'=> $sumaCompras,
						'puntos' => $sumaPuntosCompra
				);
				$sumaPuntosCompra = 0;
				$sumaCompras = 0;
				$productosVr = 0;
			}
			$comprasRecientes = '<table data-toggle="table" data-pagination="true" >
							<thead>
								<tr>
									<th>ID Compra</th>
									<th>Cantidad de Producto</th>
									<th>Puntos de Venta</th>
									<th>Monto Total</th>
						  		</tr>
						  	</thead>
						  	<tbody>';
			foreach ($ventasArray as $veRe){
				$comprasRecientes .= '<tr>
								<td><a href="'.$this->generateUrl('venta_show', array('id' => $veRe['id'])).'">'.$veRe['id'].'</a></td>
								<td>'.$veRe['cantidad'].'</td>
								<td>'.$veRe['puntos'].'</td>
								<td>'.$veRe['monto'].'</td>
							</tr>';
			}
			$comprasRecientes.='</tbody></table>';
		}else{
			$comprasRecientes = "No se han realizado compras.";
		}
		
		
		$repoVenta = $em->getRepository('PylifeBundle:PlHistorialRango');
		$queryVenta =  $repoVenta->createQueryBuilder('hr')
				->select('max(hr.id) as max_val')
				->addSelect('IDENTITY(hr.hiraRaNuevo) as raNuevo')
				->where('hr.hiraActive = 1')
				->andWhere('hr.hiraUsr = '.$user)
				->setMaxResults(1)
				->getQuery();
		$plHr = $queryVenta->getResult(Query::HYDRATE_ARRAY);
		$plRa = isset($plHr[0]['raNuevo']) ? $em->getRepository('PylifeBundle:PlRango')->find($plHr[0]['raNuevo']) :  $em->getRepository('PylifeBundle:PlRango')->find(1);
		$plUser = $em->getRepository('PylifeBundle:PlUser')->find($user);
		
		return $this->render('PylifeBundle:MisCompras:index.html.twig', array(
			'plPro'=> $plProducto,
			'existencias'=> "[".$stringArray."]",
			'ventas' => $comprasRecientes,
			'usuario' => $plUser,
			'rango' =>$plRa
		));
	}
	
	public function newAction(Request $request){
		$user = $this->getUser()->getId();
		$em = $this->getDoctrine()->getManager();
		$allDataTable = $request->request->get('ventaDetalle');
		
		$plUser = $em->getRepository('PylifeBundle:PlUser')->find($user);
		
		try {
			$plVenta = new PlVenta();
			$plVenta->setVenUsr($plUser);
			$plVenta->setVenPa($plUser->getUsrPa());
			$plVenta->setVenCreatedAt(new \DateTime());
			$plVenta->setVenUsrCreatedBy($plUser);
			$plVenta->setVenActive(true);
			$em->persist($plVenta);
			$em->flush();
			$ventaId = $plVenta->getId();
			
			foreach ($allDataTable as $dt) {
				$plPro = $em->getRepository('PylifeBundle:PlProducto')->find($dt['id']);
				$plVd = new PlVentaDetalle();
				$plVd->setVdVen($plVenta);
				$plVd->setVdPro($plPro);
				$plVd->setVdCantidadVendida($dt['proCantidad']);
				$plVd->setVdSumaMonto($dt['proSubTotal']);
				$plVd->setVdSumaPuntos($dt['proPuntos']);
				$plVd->setVdActive(true);
				$plVd->setVdCreatedAt(new \DateTime());
				$plVd->setVdUsrCreatedBy($plUser);
				$em->persist($plVd);
				$em->flush();
			}
			return new Response('1');
		}catch (Exception $e) {
			return new Response('0');
		}
	}
	
}
