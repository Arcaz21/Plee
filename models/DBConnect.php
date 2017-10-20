<?php
	class DBConnect {
		protected $conn;

		function __construct() {
			//DB CREDENTIALS
			$dbhost = "localhost:3306";
			$dbuser = "root";
			$dbpass = "";
			$dbname = "plee";

			//CONNECT TO THE DB USING THE CREDENTIALS ABOVE
			$this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			
			if(!$this->conn) {	//if the connection is not established
				die("Could not connect: ".mysql_error());   //exit the execution and display the errors
			} 
		}

		function close() {
			//closes the database connection
			mysqli_close($this->conn);
		}

	}	
?>