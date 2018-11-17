<?php
	class User{
		private $conn;
		
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
		
		public function register($usr, $psw, $email, $rol, $name){
			try{
				$new_psw = password_hash($psw, PASSWORD_DEFAULT);
				$q = "INSERT INTO users (nombre, user, password, email, rol) 
						VALUES (:name,:usr,:psw,:emal,:rol)";
				$stmt->bindparam(":name", $name);
				$stmt->bindparam(":usr", $usr);
				$stmt->bindparam(":psw", $psw);
				$stmt->bindparam(":email", $email);
				$stmt->bindparam(":rol", $rol);
				
				$stmt->execute();
				
				return $stmt;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		
		public function login($email, $psw){
			try{
				$q = "SELECT password FROM users WHERE email=:email";
				$stmt = $this->conn->prepare($q);
				$stmt->execute(array(':email'=> $email));
				$res = $stmt->fetch(PDO::FETCH_ASOC);
				
				if($stmt->rowCount() > 0){
					if(password_verify($psw,$res['password'])){
						$_SESSION['user_id'] = $res['id'];
						$_SESSION['user_nombre'] = $res['nombre'];
						$_SESSION['user_rol'] = $res['rol'];
						return true;
					}else{
						return false;
					}
				}else{
					echo "Error, no se encontro un usuario con ese correo";
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	}
