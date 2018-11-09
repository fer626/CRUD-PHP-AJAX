<?php
	include_once 'db_connection/db.class.php';
	include_once 'productos.class.php';

	switch($_POST['metodo']){
		case 'productosGetAll':
				$productos = new Producto;
				echo json_encode($productos->getAll());
			break;
		default:
			$response['message'] = "No se encontro lo que buscabas";
			$response['success'] = false;
			return json_encode($response);
			break;
	}
?>
