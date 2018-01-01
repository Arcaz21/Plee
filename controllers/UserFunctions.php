<?php include '../models/UserModels.php'; ?>
<?php
	$db = new UserModels();

	$add = "no";
	$add = isset ($_REQUEST['add']) ? $_REQUEST['add']:"no";
	
	$data['fname'] = isset($_REQUEST['fname'])?$_REQUEST['fname']:NULL;
	$data['email'] = isset($_REQUEST['email'])?$_REQUEST['email']:NULL;
	$data['phone'] = isset($_REQUEST['phone'])?$_REQUEST['phone']:NULL;
	$data['pass'] = isset($_REQUEST['pass'])?$_REQUEST['pass']:NULL;

	if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "submit"){
		$db->addUser($data);
	}
	if(isset($_REQUEST['login']) && $_REQUEST['login'] == 'Login'){
		
	}

	// print_r($data);
?>