$(document).ready(function(){
		
});

function getProductos(object){
	console.log($(object).attr('data-id'));
	
	$.ajax({
		url: "php/class.php",
		type: "POST",
		data: {
			metodo: 'productosGetAll'
		},
		success: function(data){
			console.log('Obtube la siguiente informacion:');
			console.log(data);
			var htmlStr = "";
			htmlStr += "<p>Obtube la siguiente informacion:</p>";
			htmlStr += "<p>"+data+"</p>";
			
			$('.body_form').html(htmlStr);
		},
		error: function(error, xhr, status){
			console.log('Ocurrio un error.');
			console.log(error);
			console.log(xhr);
			console.log(status);
		}
	});
}
