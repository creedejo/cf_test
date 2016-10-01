<?php
require_once('config/config.php');
require_once("classes/user.php");

if(isset($_POST["user_id"])){
	$user_id = $_POST["user_id"];
	$userData = new UserData();
	if($userData->incrementUser($user_id)){
		$user=$userData->getUserById($user_id);
		echo json_encode($user);
	}
	else{
		echo 'ERROR: Unable to update user.';
	}
}
else{
	echo "ERROR: User id was not detected.";
}

?>