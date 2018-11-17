<?php
	include_once 'db_connection/db.class.php';
	include_once 'productos.class.php';
	include_once 'user.class.php';
	include_once 'categoria.class.php';

	switch($_POST['metodo']){
		case 'productosGetAll':
				$productos = new Producto;
				echo json_encode($productos->getAll());
			break;
		case 'getProducto':
				$producto = new Producto;
				echo json_encode($producto->getProducto($_POST['id']));
			break;
		case 'editProducto':
				$producto = new Producto;
				echo json_encode($producto->update($_POST['id'],$_POST['nombre'],$_POST['descripcion'],$_POST['id_categoria']));
			break;
		case 'newProducto':
				$producto = new Producto;
				echo json_encode($producto->save($_POST['nombre'],$_POST['descripcion'],$_POST['id_categoria']));
			break;
		case 'deleteProducto':
				$producto = new Producto;
				echo json_encode($producto->delete($_POST['id']));
			break;
		case 'fillComponent':
				$categorias = new Categoria;
				echo json_encode($categorias->fillComponent());
			break;
		case 'login':
			$user = new User;
			$result['user'] = $user->login($_POST['email'], $_POST['password']);
			return json_encode($result);
			break;
		default:
			$response['message'] = "No se encontro lo que buscabas";
			$response['success'] = false;
			return json_encode($response);
			break;
	}
?>
