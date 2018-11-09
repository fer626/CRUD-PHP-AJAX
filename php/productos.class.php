<?php
	class Producto extends DbC{
		private $id;
		private $nombre;
		private $desc;
		private $cat;

		public function getAll(){
			try{
				$result = array();
				$stmt = $this->connect()->query("SELECT P.id, P.nombre, P.descripcion, C.nombre as 'categoria' FROM tb_productos AS P LEFT OUTER JOIN tb_categorias AS C ON C.id = P.id_categoria");
				return $stmt->fetchAll(PDO::FETCH_OBJ);
			}catch(Exception $e){
				die($e->getMessage());
			}			
		}
		
		public function save(Producto $data){
			try{
				$sql = "INSERT INTO tb_productos (nombre, descripcion, id_categoria)VALUES(?,?,?)";
				$this->connect()->prepare($sql)->execute(
					$data->nombre,
					$data->desc,
					$data->cat
				);
			}catch(Exception $e){
				die($e->getMessage());
			}
		}
		
		public function update(Persona $data){
			try{
				$sql = "UPDATE tb_productos SET nombre=?, descripcion=?, id_categoria=?";
				$this->connect()->prepare($sql)->execute(
					array(
						$data->nombre,
						$data->desc,
						$data->cat
					)
				);
			}catch(Exception $e){
				die($e->getMessage());
			}
		}
	}
?>
