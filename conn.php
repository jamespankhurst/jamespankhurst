<?php
/*=========================================*/
/*=== SITE: JPIC - JAMESPANKHURST.CO.UK ===*/
/*=========== Ver 1.0: 25.02.21 ===========*/
/*=========================================*/



	function initConn()
	   {
		$servername = 'localhost';
		$dbname = 'jap';
		$username = 'root'; 
		$password = '';

		try 
		{
		//create a new PDO object	
		$database = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		}
		catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		}
		return $database;
	   }


?>