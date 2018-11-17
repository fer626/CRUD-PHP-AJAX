<?php
	//namespace Categoria;

	class Categoria extends DbC{
		private $id;
		private $nombre;
		private $descripcion;

		public function fillComponent(){
			try{
				$result = array();
				$stmt = $this->connect()->query("SELECT C.id, C.nombre FROM tb_categorias AS C");
				return $stmt->fetchAll(PDO::FETCH_OBJ);
			}catch(Exception $e){
				die($e->getMessage());
			}			
		}
	}
