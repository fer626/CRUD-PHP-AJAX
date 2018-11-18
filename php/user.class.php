<?php
	class User{
		private $id;
		private $username;
		private $password;
		private $correo;
		private $nombre;
		private $apellido_p;
		private $apellido_m;
		private $id_rol;
		private $verificado;
		
		function __construct($db_conn){
			$this->conn = $db_conn;
		}
		
		public function isLoggedin(){
			if(isset($_SESSION['user_session'])){
				return true;
			}else{
				return false;
			}
		}
		
		public function redirect($url){
			header("Location: $url");
		}
		
		public function logout(){
			session_destroy();
			unset($_SESSION['user_session']);
			return true;
		}
		
		public function register($usr, $psw, $email, $rol, $name, $apellido_p, $apellido_m){
			try{
				$new_psw = password_hash($psw, PASSWORD_DEFAULT);
				$q = "INSERT INTO tb_users (nombre, user, password, email, rol) 
						VALUES (:name,:usr,:psw,:emal,:rol)";
				$stmt->bindparam(":name", $name);
				$stmt->bindparam(":usr", $usr);
				$stmt->bindparam(":psw", $psw);
				$stmt->bindparam(":email", $email);
				$stmt->bindparam(":rol", $rol);
				
				if($stmt->execute()){
					echo $response['success'] = true;
				}else{
					echo $response['success'] = false;
				}
			}catch(PDOException $e){
				echo $response['exception'] = $e->getMessage();
			}
		}
		
		public function login($usr, $psw){
			$response = array();
			try{
				$q = "SELECT id, username, assword, correo, nombre, apellido_p, apellido_m, id_rol FROM tb_usuarios WHERE username=:username";
				$stmt = $this->conn->prepare($q);
				$stmt->execute(array(':username'=> $usr));
				$res = $stmt->fetch(PDO::FETCH_ASOC);
				
				if($stmt->rowCount() > 0){
					if(password_verify($psw,$res['password'])){
						$_SESSION['id_user'] = $res['id'];
						$_SESSION['username'] = $res['nombre'];
						$_SESSION['id_rol'] = $res['rol'];
						$_SESSION['correo'] = $res['rol'];
						$_SESSION['nombre'] = $res['rol'];
						$_SESSION['apellido_p'] = $res['rol'];
						$_SESSION['apellido_m'] = $res['rol'];

						return $response['success'] = true;
					}else{
						return $response['success'] = false;
					}
				}else{
					echo $response['error'] ="Error, no se encontro un usuario con ese correo";
				}
			}catch(PDOException $e){
				echo $response['exception'] = $e->getMessage();
			}
		}
	}
