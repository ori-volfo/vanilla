<?php

    CONST HOST = 'localhost';
    CONST DB = '';
    CONST USERNAME = 'root';
    CONST PASSWORD = 1;

	function connect(){
		$db = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

//        PHP 5
//        $db = mysql_connect(HOST, USERNAME, PASSWORD);
//        mysql_select_db(DB, $db);

		return $db; // Resource
	}
	
	function query($query){
		$db = connect();
		$resource = mysqli_query($db, $query);
//		  PHP 5
//        $resource = mysql_query($query, $db);
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
