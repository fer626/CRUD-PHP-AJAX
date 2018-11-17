$body = $("body");
var editProducto = new FormData();
$(document).ready(function(){
	//Primer Listener en ejecutarse en contexto de toda la pagina
	getAllProductos();
	
	$('input textarea select').on('change paste keyup',function(){
		//alert($(e).attr('id'));
		console.log($(this).val());
	});
	
	$('input, select, textarea').on('input',function(){
		// Metodo para detectar cambio en cualquier input, select o textarea del formulario indicado
	});
});
$(document).on({
	// Metodo que se ejecuta cuando se modifica algun elemento 
	// de la interfaz pero no los contenidos de los input text u otros
    ajaxStart: function() {$body.addClass("loading");},
    ajaxStop: function() {$body.removeClass("loading");}
});

/*************** LOGIN ****************/
function login(email, password){
	
}

/*************** PRODUCTOS ****************/
function guardarCambiosProducto(id){
	$.ajax({
		url: "php/class.php",
		type: "POST",
		data: {
			metodo: 'editProducto',
			id: id,
			nombre: $('#txt_nombre_producto').val(),
			descripcion: $('#txt_descripcion_producto').val(),
			id_categoria: $('#select_categoria_producto').val()
		},
		dataType: "json",
		success: function(data){
			if(data.success){
				$('.body-form').empty();
				getAllProductos();
			}else{
				
			}
			$('.editModal').modal('toggle');
			removeData();
			
		},
		error: function(error, xhr, status){
			$('.editModal').modal('toggle');
			removeData();
			console.log('(guardarCambiosProducto) Ocurrio el siguiente error:');
			console.log(error);
			console.log(xhr);
			console.log(status);
		}
	});
}
function getAllProductos(){
	$.ajax({
		url: "php/class.php",
		type: "POST",
		dataType: "json",
		data:{
			metodo: 'productosGetAll'
		},
		success: function(data){
			var htmlStr = "";
			htmlStr += '<h1>Productos disponibles: '+data.length+'</h1>';
			//htmlStr += '<a href="#" class-"btn btn-outline-success" role="button"><i class="fa fa-plus"></i>Nuevo</a>';
			htmlStr += '<a id="btn_nuevo" onclick="prepareModal()" class="btn btn-success" href="#" role="button"><i class="fa fa-plus"></i>Nuevo</a>';
			htmlStr += '<table class="table table-dark">';
			htmlStr += '	<thead>';
			htmlStr += '		<th scope="col">Nombre</th>';
			htmlStr += '		<th scope="col">Descripcion</th>';
			htmlStr += '		<th scope="col">Categoria</th>';
			htmlStr += '		<th scope="col">Acciones</th>';
			htmlStr += '	</thead>';
			htmlStr += '	<tbody>';
			for(var i=0;i<=data.length-1;i++){
				htmlStr += '	<tr>';
				htmlStr += '		<th scope="col">'+data[i].nombre+'</th>';
				htmlStr += '		<td>'+data[i].descripcion+'</td>';
				htmlStr += '		<td>'+data[i].categoria+'</td>';
				htmlStr += '		<td>';
				htmlStr += '			<a onclick="showDataProducto(this)" data-id="'+data[i].id+'" class="btn btn-warning" href="#" role="button"><i class="fa fa-pencil-square-o"></i></a>';
				htmlStr += '			<a onclick="deleteProducto(this)" data-id="'+data[i].id+'" class="btn btn-danger" href="#" role="button"><i class="fa fa-trash"></i></a>';
				htmlStr += '		</td>';
				htmlStr += '	</tr>';
			}
			htmlStr += '	</tbody>';
			htmlStr += '</table>';
			
			$('.body-form').html(htmlStr);
		},
		error: function(error, xhr, status){
			console.log('(getAllProductos) Ocurrio el siguiente error:');
			console.log(error);
			console.log(xhr);
			console.log(status);
		}
	});
}
function prepareModal(){
	fillSelectCategoria();
	$('#btn-guardar-producto').attr({'onclick': 'saveNewProducto()'});
	$('.editModal').modal('show');
}
function saveNewProducto(){
	$.ajax({
		url: "php/class.php",
		type: "POST",
		dataType: "json",
		data:{
			metodo: 'newProducto',
			nombre: $('#txt_nombre_producto').val(),
			descripcion: $('#txt_descripcion_producto').val(),
			id_categoria: $('#select_categoria_producto').val()
		},
		success: function(data){
			if(data.success){
				$('.body-form').empty();
				getAllProductos();
			}else{
				console.log("no se hizo la machaca");
			}
			$('.editModal').modal('toggle');
			removeData();
		},
		error: function(error, xhr, status){
			console.log('(showDataProducto) Ocurrio el siguiente error:');
			console.log(error);
			console.log(xhr);
			console.log(status);
			$('.editModal').modal('toggle');
			removeData();
		}
	});
}
function deleteProducto(id){
	alert("deleteProducto: "+$(id).attr('data-id'));
	$.ajax({
		url: "php/class.php",
		type: "POST",
		dataType: "json",
		data:{
			metodo: 'deleteProducto',
			id: $(id).attr('data-id')
		},
		success: function(data){
			if(data.success){
				$('.body-form').empty();
				getAllProductos();
			}else{
				console.log("no se hizo la machaca");
			}
		},
		error: function(error, xhr, status){
			console.log('(showDataProducto) Ocurrio el siguiente error:');
			console.log(error);
			console.log(xhr);
			console.log(status);
			$('.editModal').modal('toggle');
			removeData();
		}
	});
}
function showDataProducto(obj){
	fillSelectCategoria();
	$.ajax({
		url: "php/class.php",
		type: "POST",
		dataType: "json",
		data:{
			metodo: 'getProducto',
			id: $(obj).attr('data-id')
		},
		success: function(data){
			$('#txt_nombre_producto').val(data[0].nombre);
			$('#txt_descripcion_producto').val(data[0].descripcion);
			$('#select_categoria_producto').val(data[0].id_categoria);
			
			$('#id-producto').attr({'data-id': $(obj).attr('data-id')});
			$('#btn-guardar-producto').attr({
					'data-id': $(obj).attr('data-id'),
					'onclick': 'guardarCambiosProducto('+$(obj).attr('data-id')+')'
				});
			$('.editModal').modal('show');
		},
		error: function(error, xhr, status){
			console.log('(showDataProducto) Ocurrio el siguiente error:');
			console.log(error);
			console.log(xhr);
			console.log(status);
		}
	});
}
function fillSelectCategoria(){
	$.ajax({
		url: "php/class.php",
		type: "POST",
		dataType: "json",
		data:{
			metodo: 'fillComponent'
		},
		success: function(data){
			var options = '<option val="0">Seleccione una opcion...</option>';
			for(var i=0;i<=data.length-1;i++){
				options += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
			}
			$('#select_categoria_producto').html(options);
		},
		error: function(error, xhr, status){
			console.log('(fillSelectCategoria) Ocurrio el siguiente error:');
			console.log(error);
			console.log(xhr);
			console.log(status);
		}
	});
}
function removeData(){
	$('#id-producto').removeAttr('data-id');
	$('#btn-guardar-producto').removeAttr('data-id');
	$('#btn-guardar-producto').removeAttr('onclick');
	$('#txt_nombre_producto').val('');
	$('#txt_descripcion_producto').val('');
	$('#select_categoria_producto').empty();
}
