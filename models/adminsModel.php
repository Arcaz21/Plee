<?php include "../models/DBConnect.php";
	
class adminsModel extends DBConnect {
//-----------Add---------------------------   
	function addUser($data){
		$query = "INSERT INTO users(fname,email,phone,pass) 
		VALUES (\"".$data['fname']."\",
				\"".$data['email']."\",
				\"".$data['phone']."\",
				\"".$data['pass']."\")";

				$result = mysqli_query($this->conn, $query);
				if ($result){
					return TRUE;
				}else {
					die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
				}
	}
//-----------CHECKS---------------------------   
	function checkLogin($data){
		$query = "SELECT * from users 
		WHERE email = \"".$data['email']."\" && pass = \"".$data['pass']."\" ";
		print_r($query);
		$result = mysqli_query($this->conn, $query);
            $res = array();
                while ($row = mysqli_fetch_array($result)){
                    array_push($res, $row);
                }
            return ($result->num_rows>0)? $res: FALSE;
	}
//-----------VIEW---------------------------  
	function showUser($data){
		$query ="SELECT user_id, fname, email, phone, pass FROM users WHERE email = \"".$data['email']."\"";
		$result = mysqli_query($this->conn, $query);
		$data = $result->fetch_object();
        return $data;
	}
}
?>