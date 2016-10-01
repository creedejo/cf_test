<?php

class User{
	var $user_id;
	var $name;
	var $access_count;
	var $modify_dt;

	function __construct($user_id, $name, $access_count, $modify_dt){
		$this->user_id = $user_id;
		$this->name = $name;
		$this->access_count = $access_count;
		$this->modify_dt = $modify_dt;
	}
}

class UserData{

	function getAllUsers(){
		$users = array();
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$sql = "SELECT user_id,name,access_count,modify_dt FROM user";
		$result = $conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				$user = new User($row["user_id"],$row["name"],$row["access_count"],$row["modify_dt"]);
				array_push($users, $user);
			}
		}
		return $users;
		$conn->close();
	}

	function getUserById($user_id){
		$user = new User();

		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$sql = "SELECT user_id, name, access_count, modify_dt FROM user WHERE user_id=?";
		
		$query=$conn->prepare($sql);
		$query->bind_param('i',$user_id);
		if($query->execute()===true){
			$query->bind_result($id,$name,$access,$modified);
			$query->fetch();
			$user = new User($id,$name,$access,$modified);
		}

		return $user;
	}

	function incrementUser($user_id){
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		$sql = "UPDATE user SET access_count=access_count+1 WHERE user_id=?";
		$query=$conn->prepare($sql);
		$query->bind_param('i',$user_id);
		if($query->execute()===true){
			return true;
		}
		else{
			return false;
		}
		$conn->close();

	}
}