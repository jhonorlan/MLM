<?php include 'outline.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Comission Details</title>
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
			<h2>Members Management</h2> - <h3>Manage your Members</h3> <div id="date"><?php get_date(); ?></div>
		</div>
		<div id="header" style="border:0.5px solid lightgray;padding-top: 0px;padding-bottom:0px;">
			<i class="fa fa-home"></i><p>Home / </p> <p>Members Management </p> 
		</div>
		<div id="body">
			<div id="note_input" style="display: block;">
				<div id="other_button"style="background: #337AB7;" data-state="Primary"><i class="fa fa-cog" style="color: white;"></i></div>
				<div id="other_button" style="background: #5CB85C;" data-state="Success"><i class="fa fa-plus" style="color: white;"></i></div>
				<div id="other_button" style="background: #D9534F;" data-state="Danger"><i class="fa fa-minus" style="color: white;"></i></div>
			</div>
<table>
  <tr>
  	<th><i class="fa fa-check"></i></th>
    <th>ID</th>
    <th>Reference ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Date Started</th>
    <th>Last Activity</th>
    <th>Status</th>
  </tr>
  <div id="display_all_member"><?php display_all_member($_SESSION['username'],$connect); ?></div>
</table>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("tr").click(function(){
			var reference_id = $(this).data('select');
			if($("#checkbox_"+reference_id).is(":checked")){
				$("#checkbox_"+reference_id).prop('checked',false);
				$(this).css("background","#FFFFFF");

			}else{
				$("#checkbox_"+reference_id).prop('checked',true);
				$(this).css("background","#EBEEEE");
			}
		});
	});
</script>
<style type="text/css">
	#body{
		padding:20px;
	}
table {
  border-collapse: collapse;
  width: 100%;
}

td, th {text-align: left;padding: 8px;}
tr{cursor: pointer;
	height: 50px;
}
tr:hover{
	background: #EBEEEE;
}
tr:hover #tools{
	display: inline-block;
}
#tools{
	width: 200px;
	height: 40px;
	float: right;
	margin: -20px 0px 0px -205px;
	background: #EBEEEE;
	position: absolute;
	display: none;
}
#tools i:hover{
	color: #337AB7;
}

</style>
</html>