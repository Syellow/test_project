<?php
class Dblink{
	public function getConn(){
		$db_host="db.mis.kuas.edu.tw";
		$db_name="s1102137107";
		$db_user="s1102137107";
		$db_password="88888";
		$dns="mysql:host=$db_host;dbname=$db_name;charset=utf8";
		try{
			$conn=new PDO($dns,$db_user,$db_password);
		}
		catch (PDOException $e){
			echo $e->getMessage();
		}
		return $conn;
	}
}
?>