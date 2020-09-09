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
			<h2>Comission Details</h2> - <h3>Daily Income</h3> <div id="date"><?php get_date(); ?></div>
		</div>
		<div id="header" style="border:0.5px solid lightgray;padding-top: 0px;padding-bottom:0px;">
			<i class="fa fa-home"></i><p>Home / </p> <p>Comission Details /</p> <p>Daily Income</p>
		</div>
		<div id="body">
<table>
  <tr>
    <th>Date</th>
    <th>Direct</th>
    <th>In-Direct</th>
    <th>Sales Match</th>
    <th>Unilevel</th>
    <th>Daily Total</th>
  </tr>

</table>

		</div>
	</div>
</body>
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
</style>
</html>