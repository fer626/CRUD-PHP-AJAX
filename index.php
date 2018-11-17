<?php
	include_once 'php/db_connection/db.class.php';
	include_once 'php/productos.class.php';
	include_once 'php/user.class.php';
?>
<!DOCTYPE HTML PUBLIC>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" href="css/mycss.css">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="js/views.js"></script>
		<title>Inventory</title>
	</head>
	<body>
		<div class="body-form">
		</div>
	</body>
	
	<!-- Loading screen -->
	<div class="modal modal-loading">
	</div>
	
	<!-- Modal Para editar los datos -->
	<div class="modal fade editModal" id="modalEditarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Editar Producto</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<input id="id-producto" type="hidden">
			<div class="container">
				<div class="row div-padd-fields">
					<label>Nombre:</label>
					<input type="text" class="form-control" id="txt_nombre_producto">
				</div>
				<div class="row div-padd-fields">
					<label>Descripcion:</label>
					<textarea class="form-control" id="txt_descripcion_producto" rows="3"></textarea>
				</div>
				<div class="row div-padd-fields">
					<div class="col-md-auto">
						<label>Categoria:</label>
					</div>
					<div class="col">
						<select id="select_categoria_producto" class="form-control">
							<option val="0">Seleccione una opcion...</option>
						</select>
					</div>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button onclick="removeData()" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			<button id="btn-guardar-producto" type="button" class="btn btn-primary">Guardar</button>
		  </div>
		</div>
	  </div>
	</div>
</html>
