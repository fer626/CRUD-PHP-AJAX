<?php
	include_once 'php/db_connection/db.class.php';
	include_once 'php/productos.class.php';
	include_once 'php/user.class.php';
?>
<!DOCTYPE HTML PUBLIC>
<html>
	<?php include 'includes/header.php'; ?>
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
