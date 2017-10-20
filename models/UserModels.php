<?php include "../models/DBConnect.php";
	
class UserModels extends DBConnect {
	
	function addUser($data){
		$query = "INSERT INTO users(fname,email,phone,pass) 
		VALUES (\"".$data['fname']."\",
				\"".$data['email']."\",
				\"".$data['phone']."\",
				\"".$data['pass']."\")";

				$result = mysqli_query($this->conn, $query);
				if ($result){
					echo "Data succesfully Added";
					echo "
						<script>
							window.location.href = \"index.php\";
						</script>	
					";
				}else {
					die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
				}
	}
}
?>