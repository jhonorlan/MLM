<?php include 'outline.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Member</title>
</head>
<body>
<div class="container">
		<div id="sub_header">
			<div id="header" style="border:0.5px solid lightgray;padding:0px;">
				<i class="fa fa-arrow-left"></i><i class="fa fa-home"></i><p>Home / </p> <p>Profile</p><div id="date"><?php get_date(); ?></div>
			</div>
		</div>
		<div id="header">
			<i class="fa fa-arrow-left"></i>
			<h2>Members Management</h2> - <h3>Add to Your Members</h3> <div id="date"><?php get_date(); ?></div>
		</div>
		<div id="header" style="border:0.5px solid lightgray;padding-top: 0px;padding-bottom:0px;">
			<i class="fa fa-home"></i><p>Home / </p> <p>Members Management /</p>  <p>Add Member /</p> 
		</div>
		<div id="body">
			<div id="note_input" style="display: block;">
				<div id="other_button"style="background: #337AB7;" data-state="Primary"><i class="fa fa-cog" style="color: white;"></i> Settings</div>
				<div id="other_button" style="background: #5CB85C;" data-state="Success"><i class="fa fa-plus" style="color: white;"></i> Add Member</div>
				<div id="other_button" style="background: #D9534F;" data-state="Danger"><i class="fa fa-minus" style="color: white;"></i>Remove Member</div>
			</div>
			<center>

				<div id="form">
	<span class="loading_area" style="display: none;">
    		<center>
    			<div class="lds-roller"><div></div><div></div><div></div><div>
    		</center>
    	</span>
				<span style="display: ;" id="add_member_container">
					<h2>Add a Member</h2>
				<center>
					<div id="error"></div>
					<form method="POST" id="add_member_form">
				<div id="form-group">
					<label id="label_username" >Username</label>
					<input type="text" name="username" placeholder="Username" data-label="#label_username" data-placeholder="Username">
				</div>
				<div id="form-group">
					<label id="label_email">Email</label>
					<input type="email" name="email" placeholder="Email" data-label="#label_email" data-placeholder="Email">
				</div>
				<div id="form-group">
					<label>Gender</label>
					<div id="gender_selection" class="gender_selection" data-gender="Male"><i class="fas fa-male"></i>Male</div>
					<div id="gender_selection"class="gender_selection" data-gender="Female"><i class="fas fa-female"></i>Female</div><br>
					<input type="text" name="gender" id="gender" style="display: none;">
				</div>
				<div id="form-group">
					<label id="label_mobile_number">Mobile</label>
					<input type="number" name="mobile" placeholder="Mobile Number" data-placeholder="Mobile Number" data-label="#label_mobile_number">
				</div>
				<div id="form-group">
					<label id="label_password">Password</label>
					<input type="password" name="password" placeholder="Password" data-placeholder="Password" data-label="#label_password">
				</div>
				<div id="form-group">
					<label id="label_confirm_password">Confirm Password</label>
					<input type="password" name="confirm_password" placeholder="Confirm Password" data-placeholder="Confirm Password" data-label="#label_confirm_password">
				</div>
				<div id="form-group">
					<input type="submit" id="add_member" value="ADD MEMBER">
				</div>
				</center>
				</form>
			</div>
				</span>
		</div>
			</center>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$(".gender_selection").click(function(){
			var gender = $(this).data('gender');
			console.log(gender);
			$(this).css({
				background:'#5CB85C'
			});
			$("#form-group .gender_selection").not($(this)).css({
				background:'#337AB7'
			});
			$("#gender").val(gender);
		});
		$("#add_member").click(function(e){
				$(".loading_area").show();
				$("#add_member_container").hide();
				setTimeout(function(){
				$(".loading_area").hide();
				$("#add_member_container").show();
				},2000);

			e.preventDefault();
			$.ajax({
				url:'data/add_member.php',
				type:'POST',
				data:$("#add_member_form").serialize(),
				success:function(data){
					$("#error").html(data);
					if(data == ""){
						location.reload(true);
					}
				}
			});
		});
	});
</script>
<style type="text/css">
#form{
	width: 50%;
	background: ;
	margin-top: 100px;
	padding: 20px;
	justify-content: center;
}
#form #form-group{
	background: ;
	margin: 10px;
}
#form #form-group label{
	font-size: 14px;
	color: black;
	text-align: left;
	margin: 10px;
	font-weight: 800;
	margin-left: 80px;
	display: none;
}
#form #form-group input{
	width: 300px;
	padding: 12px;
}
#form #form-group #gender_selection{
	width: 60px;
	padding: 10px;
	background: #337AB7;
	margin: 10px;
	display: inline-block;
	cursor: pointer;
	text-align: center;
	color: white;
}
#form #form-group #gender_selection i{
	font-size: 24px;
	color: white;
}
#form #form-group #add_member{
	background: #337AB7;
	color: white;
	border: none;
	border-radius: 5px;
}
</style>
</style>
</html>