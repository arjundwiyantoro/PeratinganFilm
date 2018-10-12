<?php
session_start();

class Db
{
	private static $instance = null;
	private $host   = 'localhost';
	private $user   = 'root';
	private $pass   = '';
	private $dbname = 'tesrating';
	public $db;

	public function __construct()
	{
		$this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->user,$this->pass);
	}
	/* metode singleton pattern
	public static function GetInstance()
	{
		if(!isset(self::$instance)){
			self::$instance = new Db();
		}
			
		return self::$instance;
	}
	
	public function tampil1($table)
	{
		$query = $this->db->query("SELECT * FROM $table");
		return $query;
	}
	*/
	public function run($query)
	{
		
		while($d = $query->fetchObject()){
			$hasil[] = $d;
		}
		if(!empty($hasil)){
			return $hasil;
		}else{
			return false;
		}

	}

	public function tf($query)
	{
		if($query){
			return true;
		}else{
			return false;
		}
	}
	/* metode singleton pattern
	public function tes($statmen)
	{
		$query = $this->db->prepare($statmen);
		return $query;
	}
	*/
}



 ?>