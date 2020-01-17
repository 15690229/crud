<?php
class Database{
	private $con;
	private $dbname = "inventario";
	private $user = "root";
	private $passwd = "";
	private $host = "localhost";
	private $table_name = "bebidas";


 	function __construct(){
 		$this->connect_db();
 	} 

 	public function connect_db(){

 		try{
 			$this->con = $this->con = new PDO("mysql:host=". $this->host . ";dbname=" . $this->dbname, $this->user, $this->passwd);
 			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		}catch(PDOException $e){
 			echo $e->getMessage();

 		}

 	}


 	public function createSoda($marca, $sabor, $tamano, $cantidad){

 		$query = "INSERT INTO 
 			" . $this->table_name . "(marca, sabor, tamano, cantidad) VALUES (?, ?, ?, ?);";


 		$sql = $this->con->prepare($query);
 		
 		$marca=htmlspecialchars(strip_tags($marca));
 		$sabor=htmlspecialchars(strip_tags($sabor));
 		$tamano=htmlspecialchars(strip_tags($tamano));
 		$cantidad=htmlspecialchars(strip_tags($cantidad));

 		$sql->bindParam(1, $marca,PDO::PARAM_STR);
 		$sql->bindParam(2, $sabor,PDO::PARAM_STR);
 		$sql->bindParam(3, $tamano,PDO::PARAM_STR);
 		$sql->bindParam(4, $cantidad,PDO::PARAM_STR);

 		$execute = $sql->execute();

 		if($execute){
 			return true;
 		}else{
 			return false;
 		}



 	}

	public function readSodas(){
		$query = "select * from bebidas;";
		$sql = $this->con->prepare($query);
		$sql->execute();
		return $sql;
	}

	public function deleteSoda($id){

		$query = "DELETE FROM bebidas where id = ?;";
		$sql = $this->con->prepare($query);
		$id=htmlspecialchars(strip_tags($id));
		$sql->bindParam(1, $id, PDO::PARAM_STR);
		$execute =$sql->execute();

		if($execute){
			return true;
		}else{
			return false;
		}

	}
		public function selectSoda($id){
			$query = "SELECT * FROM bebidas where id = ?;";
			$sql = $this->con->prepare($query);
			$id=htmlspecialchars(strip_tags($id));
			$sql->bindParam(1, $id, PDO::PARAM_STR);
			 $sql->execute();
			return $sql;
			}
			
			public function updateSoda($marca, $sabor, $tamano, $cantidad, $id){

				$query = "UPDATE
				 bebidas
	                SET
                    marca = ?,
                    sabor = ?,
                    tamano = ?,
                    cantidad = ?
                WHERE
                    id = ?";	 
	   
				$sql = $this->con->prepare($query);
				
				$marca=htmlspecialchars(strip_tags($marca));
				$sabor=htmlspecialchars(strip_tags($sabor));
				$tamano=htmlspecialchars(strip_tags($tamano));
				$cantidad=htmlspecialchars(strip_tags($cantidad));
				$id=htmlspecialchars(strip_tags($id));	   
				$sql->bindParam(1, $marca,PDO::PARAM_STR);
				$sql->bindParam(2, $sabor,PDO::PARAM_STR);
				$sql->bindParam(3, $tamano,PDO::PARAM_STR);
				$sql->bindParam(4, $cantidad,PDO::PARAM_STR);
				$sql->bindParam(5, $id, PDO::PARAM_STR);
				$execute = $sql->execute();
	   
				if($execute){
					return true;
				}else{
					return false;
				}
	   
	   
	   
			}	

}

?>