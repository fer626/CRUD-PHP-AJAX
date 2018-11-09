<?php
	include_once 'php/db_connection/db.class.php';
	include_once 'php/productos.class.php';
?>

<!doctype>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="css/mycss.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="js/views.js"></script>
		<title>Inventory</title>
	</head>
	<body>
		<div class="body_form">
			<p class="message"></p>
		</div>
		<h2 class="title">Inventario de lujo!.</h2>
		
		<table class="table table-striped table-hover table-responsive-lg">
			<thead class="thead-light">
				<tr>
					<th scope="col">id</th>
					<th scope="col">Nombre</th>
					<th scope="col">Descripcion</th>
					<th scope="col">Categoria</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$object = new Producto;
					$cont = 1;
					foreach($object->getAll() as $r){
						echo "<tr>";
						echo "	<td>".$r->id."</td>";
						echo "	<td>".$r->nombre."</td>";
						echo "	<td>".$r->descripcion."</td>";
						echo "	<td>".$r->categoria."</td>";
						echo "	<td><a onclick='getProductos(this)' class='btn btn-primary btn_edit'data-id='".$r->id."' role='button'><i class='fa fa-edit'>Edit</i></a></td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</body>
</html>
