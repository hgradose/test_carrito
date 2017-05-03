<?php 
class carritoController extends PHPUnit_Framework_testCase

{ 
 
	private $_productid_to_add;
	private $_precioTotal;

	public function __construct($_productid_to_add = "") 
	{ 
		$this->_productid_to_add = $_productid_to_add;
	} 

	public static function testgetAll() 
	{ 
		require_once("../model/Producto.php");
 		$Producto = new Producto();
 		$datos_array = $Producto->getListaProductos(); 



 	 
		foreach($datos_array as $usuario_array){ 

			$productid = $usuario_array->productid; 
			$productname = $usuario_array->productname; 
			$productprice = $usuario_array->productprice; 
		 	$retorno[] = new Producto($productid,$productname,$productprice);
		}
		return $retorno; 
	}

	public function testgetPrecioTotal(){

		return $this->_precioTotal;
	}
	
	public function addProductoCarrito() 
	{ 
		$carrito = new Carrito(); 

		$guardo = $carrito->addProductoCarrito($this->_productid_to_add); 


		return $guardo; 
	}

	public function detalleCarrito() 
	{ 
 		session_start();
		$Producto = new Producto();
 		$datos_array = $Producto->getListaProductos();
		
		foreach($datos_array as $usuario_array){ 
			if(in_array($usuario_array->productid,$_SESSION['micarrito'])){
				$productid = $usuario_array->productid; 
				$productname = $usuario_array->productname; 
				$productprice = $usuario_array->productprice; 
 			 	$retorno[] = new Producto($productid,$productname,$productprice);
			}
		}
 
		if(!empty($retorno)){
			return $retorno; 
		}

 	}

 	public function setPrecioTotal(){

		$Producto = new Producto();
 		$datos_array = $Producto->getListaProductos();
		$array_price = array();
		foreach($datos_array as $usuario_array){ 
			if(in_array($usuario_array->productid,$_SESSION['micarrito'])){
				$array_price[] = $usuario_array->productprice; 
			}
		}
		$total = array_sum($array_price) * 1.18;
		$this->_precioTotal = $total;
 	}

	public function eliminarProductoCarrito()
	{
		$carrito = new Carrito(); 
		$eliminar = $carrito->eliminarProductoCarrito($this->_productid_to_add); 
		return $eliminar; 
	} 

	public function __toString()
	{
		return $this->_id." ".$this->_nombre." ".$this->_apellido;
	}



}