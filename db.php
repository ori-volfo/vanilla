<?php

    CONST HOST = 'localhost';
    CONST DB = 'sisense';
    CONST USERNAME = 'root';
    CONST PASSWORD = 1;

	function connect(){
		$db = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
		return $db; // Resource
	}
	
	function query($query){
		$db = connect();
		$resource = mysqli_query($db, $query);
		$res = array();
		if (stripos($query, 'select') !== FALSE)
		{
			while($row = mysqli_fetch_assoc($resource))
			{
				$res[] = $row;
			}
		}
		return $res;
		
	}
