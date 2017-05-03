<?php 
require_once("producto.php");
class Carrito
{
	private $_idcarrito;
	private $_listaproductos = array();


	public function addProductoCarrito($productid){

		session_start();
 		array_push($_SESSION['micarrito'], $productid );
  	}

  	public function eliminarProductoCarrito($productid){
		session_start();

		foreach ($_SESSION['micarrito'] as $key => $value) {
			if($value == $productid){
				unset($_SESSION['micarrito'][$key]);
			}
		}
  	}

 
 }
