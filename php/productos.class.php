<?php
	//namespace Producto;

	class Producto extends DbC{
		private $id;
		private $nombre;
		private $desc;
		private $cat;

		public function getAll(){
			$response = array();
			try{
				$result = array();
				$stmt = $this->connect()->query("SELECT P.id, P.nombre, P.descripcion, C.nombre as 'categoria' FROM tb_productos AS P LEFT OUTER JOIN tb_categorias AS C ON C.id = P.id_categoria");
				return $stmt->fetchAll(PDO::FETCH_OBJ);
			}catch(Exception $e){
				die($e->getMessage());
				return $response["exception"] = $e->getMessage();
			}			
		}
		public function getProducto($id){
			try{
				$result = array();
				$stmt = $this->connect()->query("SELECT P.id, P.nombre, P.descripcion, P.id_categoria FROM tb_productos AS P WHERE P.id=".$id);
				return $stmt->fetchAll(PDO::FETCH_OBJ);
			}catch(Exception $e){
				die($e->getMessage());
			}
		}
		public function save($nombre, $descripcion, $id_categoria){
			$response = array();
			try{
				$sql = "INSERT INTO tb_productos (nombre, descripcion, id_categoria)VALUES(:nombre,:descripcion,:id_categoria)";
				$stmt = $this->connect()->prepare($sql);
				$stmt->bindParam(":nombre",$nombre);
				$stmt->bindParam(":descripcion",$descripcion);
				$stmt->bindParam(":id_categoria",$id_categoria);
				
				if($stmt->execute()){
					$response["success"] = true;
				}else{
					$response["success"] = false;
				}
				return $response;
			}catch(Exception $e){
				die($e->getMessage());
				return $response["exception"] = $e->getMessage();
			}
		}
		
		public function update($id, $nombre, $descripcion, $id_categoria){
			$response = array();
			try{
				$sql = "UPDATE tb_productos SET nombre=:nombre, descripcion=:descripcion, id_categoria=:id_categoria WHERE id=:id";
				$smtm = $this->connect()->prepare($sql);
				$smtm->bindParam(":nombre",$nombre);
				$smtm->bindParam(":descripcion",$descripcion);
				$smtm->bindParam(":id_categoria",$id_categoria);
				$smtm->bindParam(":id",$id);
				
				if($smtm->execute()){
					$response["success"] = true;
				}else{
					$response["success"] = false;
				}
				return $response;
			}catch(Exception $e){
				die($e->getMessage());
				return $response['exception'] = $e->getMessage();
			}
		}
		public function delete($id){
			$response = array();
			try{
				$sql = "DELETE FROM tb_productos WHERE id=".$id;
				$stmt = $this->connect()->query($sql);
				if($stmt){
					$response["success"] = true;
				}else{
					$response["success"] = false;
				}
				return $response;
			}catch(Exception $e){
				die($e->getMessage());
				return $response['exception'] = $e->getMessage();
			}
		}
	}
?>
