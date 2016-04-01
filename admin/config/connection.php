<?php

class connectionDB {

	private $host = null;
	private $dbName = null;
	private $user = null;
	private $password = null;
	private $dbHost = null;
	
	public $sql = null;
	public $logs = null;
	
	function __construct() {
		$this->host =  "localhost";
		$this->dbName =  "web_papsi";
		$this->user =  "root";
		$this->password =  "";
	}

	public function connect() {
		try{
			$dns = "mysql:host=$this->host;dbname=$this->dbName";
			$this->dbHost = new PDO($dns, $this->user, $this->password);
			$this->logs .= $this->getDateNow() . " | Koneksi Berhasil: Use Database $this->dbName <br>";
		} 
		catch(PDOException $e){
			$this->dbHost = null;		
			$this->logs .= $this->getDateNow() . "| Koneksi Gagal: ".$e->getMessage()."<br>";
		}
	}

	public function disconnect() {
		$this->dbh = null;
		$this->logs .= $this->getDateNow() . " | Koneksi Diputus <br>";
	}
	
	public function clear_log() {
		$this->logs = "";
	}
	
	public function getDateNow(){
		date_default_timezone_set("Asia/Jakarta"); 
		return date("D / Y-m-d / H:i:s T"); 
	}
	
	public function selectQuery($table, $array_field = null, $array_where = null) {
		$field = "";
		$where = "";
		
		if(is_null($array_field) || empty($array_field)) {
			$field .= "*";
		}
		else {
			if(is_array($array_field)) {
				foreach($array_field as $data){
					$field .= $data .",";
				}
				$field = substr($field, 0, -1);  
			}
			else{
				$field = $array_field;
			}
		}
		
		if(is_null($array_where) || empty($array_field)) {
			$where .= "";
		}
		else {
			$where .= "WHERE ";
			foreach($array_where as $key => $value){
				$where .= $key ."='".$value."' AND ";
			}
			$where = substr($where, 0, -4);
		}
		
		$this->sql = "SELECT $field FROM $table $where";
	}
 
	public function insertQuery() {

	}

	public function updateQuery() {

	}

	public function deleteQuery() {

	}

	public function execQuery() {

	}

}


?>