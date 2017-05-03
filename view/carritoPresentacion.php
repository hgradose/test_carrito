<?php 
require_once("controller/carritoController.php");

abstract class CarritoPresentacion { 

	static public function listadoUsuarios() { 
		$products_arr = carritoController::getAll(); 

		$retorno = "<h1>LISTA DE PRODUCTOS</h1>";
		$retorno .= '<ul>'; 

		foreach($products_arr as $objetoProducto){ 
			$retorno .= '<li>'.$objetoProducto; 
			$retorno .= " <a href='?modulo=insertar&id=".$objetoProducto->getId() ."'>Agregar</a> | "; 
			$retorno .='</li>'; 
		}
		
		$retorno .= "<li><a href='?modulo=nuevousuario'>Nuevo Usuario</a>"; 
		$retorno .= '</ul>';
		return $retorno;
	}

	static public function addProductoCarrito($id) 
	{ 
 		
		$addcarrito = new carritoController($id); 
		return $addcarrito->addProductoCarrito(); 
	} 

	static public function eliminarProductoCarrito($id) 
	{ 
 		
		$addcarrito = new carritoController($id); 
		return $addcarrito->eliminarProductoCarrito(); 
	} 



	static public function detalleCarrito() 
	{ 
		$products_arr = carritoController::detalleCarrito(); 
		$retorno = "<h1>MI CARRITO</h1>";
		if(!empty($products_arr)){
		$price = new carritoController();
		$price->setPrecioTotal();
		$total = $price->getPrecioTotal();

		
		$retorno .= "<table>";
		$retorno .= "<tr>";
		$retorno .= "<td>";
		$retorno .= "<strong>PRODUCTO</strong>";
		$retorno .= "</td>";
		$retorno .= "<td>";
		$retorno .= "<strong>PRECIO</strong>";
		$retorno .= "</td>";
		$retorno .= "<td>";
		$retorno .= "<strong>ACCION</strong>";
		$retorno .= "</td>";
		$retorno .= "</tr>";		 

		foreach($products_arr as $objetoProducto){ 
			$retorno .= "<tr>";		 
			$retorno .= "<td>";
			$retorno .= $objetoProducto;
			$retorno .= "</td>";

			$retorno .= "<td>";
			$retorno .= $objetoProducto->getPrecio();
			$retorno .= "</td>";

			$retorno .= "<td>";
			$retorno .= " <a href='?modulo=eliminar&id=". $objetoProducto->getId() ."'>Eliminar</a>"; 
			$retorno .= "</td>";
			$retorno .= "</tr>";		 
			 
		}

		$retorno .= "<tr>";
		$retorno .= "<td>";
		$retorno .= "<strong>TOTAL(inc igv): </strong>";
		$retorno .= "</td>";
		$retorno .= "<td>";
		$retorno .= "$total";
		$retorno .= "</td>";
		$retorno .= "<td>";
		$retorno .= "<strong></strong>";
		$retorno .= "</td>";
		$retorno .= "</tr>";	
		$retorno .= "</table>";
		}

		$retorno .= '<ul>'; 
		$retorno .= "<li><a href='?modulo=listado'>LISTA DE PRODUCTOS</a>"; 
		$retorno .= '</ul>';
		return $retorno;
 		
 	} 

}