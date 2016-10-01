<h1>User Data</h1>
<div class="user_container">

<?php

require_once('app/classes/user.php');

$userData = new UserData();
$users = $userData->getAllUsers();

if(count($users)>0){
	$table = "<table class='users'>";
	$table.= "<tr>";
	$table.= "<th>User ID</th>";
	$table.= "<th>Name</th>";
	$table.= "<th>Access Count</th>";
	$table.= "<th>Modified</th>";
	$table.= "<th></th>";
	$table.= "</td>";

	foreach ($users as $user) {
		$table.="<tr id='user_" . $user->user_id . "'>";
		$table.="<td class='user_id'>" . $user->user_id . "</td>";
		$table.="<td class='name'>" . $user->name . "</td>";
		$table.="<td class='access_count'>" . $user->access_count . "</td>";
		$table.="<td class='modify_dt'>" . $user->modify_dt . "</td>";
		$table.="<td class='col_btn'><a class='btn_update' data-id='" . $user->user_id . "'>update</a></td>";
		$table.="</tr>";
	}

	$table.= "</table>";

	echo $table;
}
else{
	echo "No records were found.";
}

?>

</div>