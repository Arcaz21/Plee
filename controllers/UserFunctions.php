<?php include '../models/UserModels.php'; ?>
<?php
	$db = new UserModels();

	$add = "no";
	$add = isset ($_REQUEST['add']) ? $_REQUEST['add']:"no";
	
	$data['fname'] = isset($_REQUEST['fname'])?$_REQUEST['fname']:NULL;
	$data['email'] = isset($_REQUEST['email'])?$_REQUEST['email']:NULL;
	$data['phone'] = isset($_REQUEST['phone'])?$_REQUEST['phone']:NULL;
	$data['pass'] = isset($_REQUEST['pass'])?$_REQUEST['pass']:NULL;
	

	if(isset($_REQUEST['register']) && $_REQUEST['register'] == "Register"){
		$db->addUser($data);
	}
	if(isset($_REQUEST['login']) && $_REQUEST['login'] == 'Login'){
		$data['email'] = isset($_REQUEST['email'])?$_REQUEST['email']:NULL;
		$data['pass'] = isset($_REQUEST['pass'])?$_REQUEST['pass']:NULL;
		$checkUser = $db->checkLogin($data);
		if($checkUser){
			$_SESSION['username'] = $data['email'];
			$_SESSION['password'] = $data['pass'];
			$userInfo = $db->showUser($data);
			$_SESSION['fname'] = $userInfo->fname;
			//print_r($_SESSION);
			header('location: user-profile(layout-2).php');
		}
	}

	$db->close();
	

	// print_r($data);
?>