<?php

namespace PylifeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MiProgresoController extends Controller{
	
	public function indexAction(){
		$em = $this->getDoctrine()->getManager();
		$user = $this->getUser()->getId();
		
		$sumaPuntos = 0;
		$sumaMonto = 0;
		$productos = array();
		$rangoActual = "";
		
		$plVenta = $em->getRepository('PylifeBundle:PlVenta')->findBy(array('venActive' => 1, 'venUsr'=>$user));
		if (is_object($plVenta)){
			foreach ($plVenta as $ven) {
				$idVenta = $ven->getId();
				$plDetalle = $em->getRepository('PylifeBundle:PlVentaDetalle')->findBy(array('vdActive' => 1, 'vdIdVen' => $idVenta));
				foreach ($plDetalle as $det) {
					$sumaPuntos += $det->getVdSumaPuntos();
					$sumaMonto += $det->getVdSumaMonto();
					$plInventario = $em->getRepository('PylifeBundle:PlInventario')->findBy(array('invActive' => 1, 'id' => $det->getVdIdInv()));
					foreach ($plInventario as $inv) {
						$productos[] = $inv->getInvProId();
					}
				}
			}
		}
		
		$plRango = $em->getRepository('PylifeBundle:PlRango')->findByRaActive(1);
		foreach ($plRango as $ra){
			if($sumaPuntos >= $ra->getRaPuntosMin() && $sumaPuntos<= $ra->getRaPuntosMin()){
				$rangoActual = $ra->getRaNombre();
			}
			
		}
		
		$repoVenta = $em->getRepository('PylifeBundle:PlVenta');
		$fechaActual = date("Y-m-d");
		$queryVenta =  $repoVenta->createQueryBuilder('v')
			->where('v.venActive = 1')
			->andWhere('v.venUsr = '.$user)
			->andWhere('v.venCreatedAt <= '.$fechaActual)
			->andWhere('v.venCreatedAt >= '.date("Y-m-d", strtotime($fechaActual."- 1 month")))
			->getQuery();
		$plVentasRecientes = $queryVenta->getResult();

		$ventasArray = array();
		$productosVr = 0;
		$sumaCompras = 0;
		$sumaPuntosCompra = 0;
		if (is_object($plVentasRecientes)){
			foreach ($plVentasRecientes as $vren) {
				$idVenta = $vren->getId();
				$plDetalle = $em->getRepository('PylifeBundle:PlVentaDetalle')->findBy(array('vdActive' => 1, 'vdIdVen' => $idVenta));
				foreach ($plDetalle as $det) {
					$sumaCompras += $det->getVdSumaMonto();
					$sumaPuntosCompra += $det->getVdSumaPuntos();
					$plInventario = $em->getRepository('PylifeBundle:PlInventario')->findBy(array('invActive' => 1, 'id' => $det->getVdIdInv()));
					foreach ($plInventario as $inv) {
						$productosVr ++;
					}
				}
				$ventasArray[] = array(
									'id' => $idVenta,
									'cantidad' => $productosVr,
									'monto'=> $sumaCompras,
									'puntos' => $sumaPuntosCompra
								);
				$sumaCompras = 0;
				$productosVr = 0;
			}
			$comprasRecientes = '<table data-toggle="table">
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
								<td>'.$veRe['id'].'<td>
								<td>'.$veRe['cantidad'].'</td>
								<td>'.$veRe['monto'].'</td>
								<td>'.$veRe['puntos'].'</td>
							</tr>';
			}
			$comprasRecientes.='</tbody></table>';
		}{
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
