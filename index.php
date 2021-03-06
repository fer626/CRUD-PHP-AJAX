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
			<h5 class="modal-title" id="exampleModalLongTitle">Title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<input id="id-producto" type="hidden">
			<div class="container">
				<div class="row div-padd-fields">
					<div class="col">
						<label>Nombre:</label>
						<input type="text" maxlength="50" class="form-control" id="txt_nombre_producto" required>
						<div class="valid-tooltip">
							Si ya tienes un nombre, por que no pones los demas campos?!.
						</div>
						<div class="invalid-tooltip">
							Por favor proporciona un nombre para tu producto
						</div>
					</div>
				</div>
				<div class="row div-padd-fields">
					<div class="col">
						<label>Descripcion:</label>
						<textarea class="form-control" maxlength="150" id="txt_descripcion_producto" rows="3" required></textarea>
						<div class="valid-tooltip">
							Todo correcto!, al menos en este campo.
						</div>
						<div class="invalid-tooltip">
							Aun que no lo parezca, una descripcion ayuda mucho a diferenciar los distintos tipos de presentaciones de un producto.
						</div>
					</div>
				</div>
				<div class="row div-padd-fields">
					<div class="col-md-auto">
						<label>Categoria:</label>
					</div>
					<div class="col">
						<select id="select_categoria_producto" class="form-control" required>
							<option val="0">Seleccione una opcion...</option>
						</select>
						<div class="valid-tooltip">
							Si ya tienes una categoria, revisa que cumplas con los otros dos campos anteriores.
						</div>
						<div class="invalid-tooltip">
							Sin una categoria tu producto no podra ser encontrado facilmente en la base de datos.
						</div>
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
	<div id="confirm-modal" class="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="title-confirm">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<p>Estas seguro de eliminar el producto?</p>
			<div class="container">
				<div class="row">
					<div class="col">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<p class="name-producto"></p>
						<p class="desc-producto"></p>
						<p class="cat-producto"></p>
					</div>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			<button id="btn-confirm-delete" type="button" class="btn btn-primary">Confirmar</button>
		  </div>
		</div>
	  </div>
	</div>
</html>
