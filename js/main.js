$(document).ready(function(){
	$("a.btn_update").on("click",function(){
		//increment account access and return updated user info
		updateUser($(this).data("id"));
	});
});


function updateUser(user_id){
	//hide update button and show loading gif
	$("#user_"+user_id+" td.col_btn").addClass("updating");

	var url = "app/incrementUser.php";
	var data = "user_id="+user_id;
	$.ajax({
		type:"POST",
		url:url,
		data:data,
		success:function(result){
			var user = $.parseJSON(result);
			updateRow(user);
		},
		error: function (xhr, ajaxOptions, thrownError) {
	        alert(xhr.status);
	    	alert(thrownError);
	    }
	});
}

function updateRow(user){
	//get the row to be updated
	$row = $("#user_"+user.user_id);

	$row.find(".access_count").html(user.access_count);
	$row.find(".modify_dt").html(user.modify_dt);

	//remove loading gif and show update button
	$row.find(".col_btn").removeClass("updating");
}