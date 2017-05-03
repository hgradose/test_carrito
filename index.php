<?php
require_once "view/carritoPresentacion.php";

abstract class Index {

    const SIN_PARAMETROS  = 0;

    static public function run($get) 
	{
      
	        if (count($get) != self::SIN_PARAMETROS) {
	        	self::_procesarModulo(); 
	        }else{ 
	        	self::_porDefecto(); 
	        }
	}

    static private function _porDefecto() {
    	echo  'Pagina por Defecto'; 
    	echo '<ul>'; 
    	echo '<li><a href="?modulo=listado">listado</li>'; 
    	echo '</ul>'; 
	}

    static private function _moduloNoExiste() {
    	echo  'Modulo no Existe'; 
    }

	static private function _procesarModulo() { 
		switch ($_GET['modulo']){

		case 'listado': 
			if (isset($_GET['mensage']) && $_GET['mensaje'] != ""){ 
				echo "El Usuario ha sido ".$_GET['mensaje']." correctamente"; 
			}

			echo carritoPresentacion::listadoUsuarios(); 
		break; 
		case 'detalle': 
			echo carritoPresentacion::detalleCarrito(); 
			break; 
		case 'insertar': 

			carritoPresentacion::addProductoCarrito( $_GET['id']);
			header("Location:index.php?modulo=detalle"); 
			break; 
		
		case 'eliminar': 
	
			carritoPresentacion::eliminarProductoCarrito($_GET['id']);
			header("Location:index.php?modulo=detalle&mensaje=eliminado"); 
			break; 
		
		default: 
			self::_moduloNoExiste(); break; 
		} 
	} 
}


Index::run($_GET);

