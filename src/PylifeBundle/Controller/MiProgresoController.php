<?php

namespace PylifeBundle\Controller;

use DateTime;
use PylifeBundle\Entity\PlHistorialRango;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query;

class MiProgresoController extends Controller{
	
	public function indexAction(){
		$em = $this->getDoctrine()->getManager();
		$user = $this->getUser()->getId();
		$plUser = $em->getRepository('PylifeBundle:PlUser')->find($user);
		
		$sumaPuntos = 0;
		$sumaMonto = 0;
		$rangoActual = "";
		
		$plVenta = $em->getRepository('PylifeBundle:PlVenta')->findBy(array('venActive' => 1, 'venUsr'=>$user));
		if (isset($plVenta)){
			foreach ($plVenta as $ven) {
				$idVenta = $ven->getId();
				$plDetalle = $em->getRepository('PylifeBundle:PlVentaDetalle')->findBy(array('vdActive' => 1, 'vdVen' => $idVenta));
				foreach ($plDetalle as $det) {
					$sumaPuntos += $det->getVdSumaPuntos();
					$sumaMonto += $det->getVdSumaMonto();
				}
			}
		}
		
		$plRango = $em->getRepository('PylifeBundle:PlRango')->findByRaActive(1);
		foreach ($plRango as $ra){
			if($sumaPuntos >= $ra->getRaPuntosMin() && $sumaPuntos<= $ra->getRaPuntosMax()){
				$repoVenta = $em->getRepository('PylifeBundle:PlHistorialRango');
				$queryVenta =  $repoVenta->createQueryBuilder('hr')
						->select('max(hr.id) as max_val')
						->addSelect('IDENTITY(hr.hiraRaNuevo) as raNuevo')
						->where('hr.hiraActive = 1')
						->andWhere('hr.hiraUsr = '.$user)
						->setMaxResults(1)
						->getQuery();
				$plHr = $queryVenta->getResult(Query::HYDRATE_ARRAY);
				error_log($ra->getId() . " ---- ". $plHr[0]['raNuevo']);
				if ($ra->getId() == $plHr[0]['raNuevo']){
					$rangoActual = $ra->getRaNombre();
				}else{
					$raAnt = isset($plHr[0]['raNuevo']) ? $em->getRepository('PylifeBundle:PlRango')->find($plHr[0]['raNuevo']) : null;
					$raNew = $em->getRepository('PylifeBundle:PlRango')->find($ra->getId());
					
					$plHrNew = new PlHistorialRango();
					$plHrNew->setHiraUsr($plUser);
					$plHrNew->setHiraRaAnterior($raAnt);
					$plHrNew->setHiraRaNuevo($raNew);
					$plHrNew->setHiraCreatedAt(new \DateTime());
					$plHrNew->setHiraUsrCreatedBy($plUser);
					$plHrNew->setHiraActive(true);
					$em->persist($plHrNew);
					$em->flush();
				}
				$rangoActual = $ra->getRaNombre();
			}
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
		
		
		
		return $this->render('PylifeBundle:MiProgreso:index.html.twig', array(
			// ...variables con informacion
			'puntos' => $sumaPuntos,
			'ventas' =>$sumaMonto,
			'rangoActual' => $rangoActual,
			'compraReciente' => $comprasRecientes
		));
	}
	
}
