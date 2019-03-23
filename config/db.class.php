<?php
	/**
	 * summary
	 */
	class Db
	{
	    public static $conn;

	    public function __construct()
	    {
	    }
	    public function connect()
	    {
	    	if(!isset(self::$conn)) {
		    	$config = parse_ini_file('config.ini');
		    	self::$conn = new mysqli("localhost",$config["username"],$config["password"],$config["databasename"]);
	    	}

	    	if(self::$conn == FALSE)
	    	{
	    		return false;
	    	}

	    	mysqli_set_charset(self::$conn,"utf8");

	    	return self::$conn;
	    }
	    public function query_excute($queryString)
	    {
	    	$conn = $this->connect();
	    	//thuc hien excute truy van
	    	$conn->query("SET NAME utf8");
	    	$result = $conn->query($queryString);

	    	return $result;
				$conn->close();
	    }
	    public function select_to_array($queryString)
	    {
	    	$rows = array();
	    	$result = $this->query_excute($queryString);
	    	if($result == false) {
	    		return false;
	    	}
	    	while($item = $result->fetch_assoc()) {
	    		$rows[] = $item;
	    	}
	    	return $rows;
	    }
	}
?>
