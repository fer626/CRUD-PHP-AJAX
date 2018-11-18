<!DOCTYPE html>
<html>
<head>
	<?php include 'includes/header.php'; ?>
</head>
<body class="centered-wrapper">
	<div style="" class="container">
		<div class="row justify-content-md-center align-items-center">
			<div class="col-4">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li style="width: 50%; text-align: center;" class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
					</li>
					<li style="width: 50%; text-align: center;" class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Registro</a>
					</li>
				</ul>
<div class="tab-content" id="myTabContent">
	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
		<div class="container">
			<div class="row">
				<div class="col">
					<label>Usuario:</label><br>
					<input type="text" id="username" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label>Contrase&ntilde;a:</label><br>
					<input type="password" id="password" class="form-control">		
				</div>
			</div>
			<div style="padding-top: 10px;" class="row justify-content-md-center align-items-center">
				<div class="col">
					<input type="submit" style="width: 100%;" id="btn_login" class="btn btn-primary btn-lg" value="Iniciar sesi&oacute;n"/>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<a class="btn" id="recover-password">Olvidaste tu contrase&ntilde;a?</a>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
		<div class="container">
			<div class="row">
				<div class="col">
					<label>Usuario:</label><br>
					<input type="text" id="username" class="form-control" required>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label>Contrase&ntilde;a:</label><br>
					<input type="password" id="password" class="form-control" required>		
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label>correo:</label><br>
					<input type="email" id="password" class="form-control" required>		
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label>Nombre(s):</label><br>
					<input type="text" id="password" class="form-control" required>		
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label>Apellido Paterno:</label><br>
					<input type="text" id="password" class="form-control" required>		
				</div>
				<div class="col">
					<label>Apellido Materno:</label><br>
					<input type="text" id="password" class="form-control">	
				</div>
			</div>
			<div style="padding-top: 10px;" class="row justify-content-md-center align-items-center">
				<div class="col">
					<input id="btn_login" style="width: 100%;" type="submit" class="btn btn-primary btn-lg" value="Registro"/>
				</div>
			</div>
		</div>
	</div>
</div>
			</div>
		</div>
	</div>
</body>
</html>