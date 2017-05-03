<?php 

Class Producto{

	private $_id;
	private $_nombre;
	private $_precio;
	private $_listaproductos = array();

	public function __construct($id = "",$nombre = "",$precio = ""){
		$this->_id = $id;
		$this->_nombre = $nombre;
		$this->_precio = $precio;
	}

	public function getId(){
		return $this->_id;

	}

	public function getNombre(){
		return $this->_nombre;
		
	}

	public function getPrecio(){
		return $this->_precio;	
	}

	public function setListaProductos(){
		for ($i=0; $i < 100 ; $i++) { 
			$listaproduct[$i] = (object)array("productid" => "$i",
											  "productname" => "producto $i",
											  "productprice" => 10);
		}
		$this->_listaproductos = $listaproduct;
	}


	public function getListaProductos(){

		$this->setListaProductos();
		return $this->_listaproductos;
	}

	public function __toString(){

		return $this->_nombre;

	}


}

