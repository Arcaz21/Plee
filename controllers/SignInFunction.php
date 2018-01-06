<?php 
	include "../models/adminsModel.php";
	$LOGGED_IN = FALSE;
	$ERROR = FALSE;
	$REG = FALSE;

	$data['fname'] = isset($_REQUEST['fname'])?$_REQUEST['fname']:NULL;
	$data['email'] = isset($_REQUEST['email'])?$_REQUEST['email']:NULL;
	$data['phone'] = isset($_REQUEST['phone'])?$_REQUEST['phone']:NULL;
	$data['pass'] = isset($_REQUEST['pass'])?$_REQUEST['pass']:NULL;

	$db = new adminsModel();
	
	if(isset($_REQUEST['register']) && $_REQUEST['register'] == "Register"){
		
		$reg = $db->addUser($data);
		if($reg){
			$REG = TRUE;
		}
	}

	if(isset($_REQUEST['login']) && $_REQUEST['login'] == 'Login'){
		$checkUser = $db->checkLogin($data);
		if($checkUser){
			$LOGGED_IN = TRUE;
		}else{$ERROR = TRUE;}
	}


	$db->close();
?>	