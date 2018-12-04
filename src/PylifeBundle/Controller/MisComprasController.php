<?php

namespace PylifeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PylifeBundle\Entity\PlProducto;


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
		
		return $this->render('PylifeBundle:MisCompras:index.html.twig', array(
			'plPro'=> $plProducto,
			'existencias'=> "[".$stringArray."]"
		));
	}
	
	public function newAction()
	{
		return $this->render('PylifeBundle:MisCompras:new.html.twig', array(
			// ...
		));
	}
	
}
