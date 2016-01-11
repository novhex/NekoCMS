<?php class DBServer{


public $_db;

public $host='mysql.hostinger.ph';

public $username='u723754042_nekoc';

public $password='OzEg530OFO6V3LBHK6';

public $db_name='u723754042_nekoc';

	public function __construct(){ 		try{ 		 		$this->_db=new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password); 		}catch(PDOException $e){  		echo $e->getMessage(); 	}  }   }

