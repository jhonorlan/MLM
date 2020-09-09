<?php include 'outline.php'; 
if(isset($_POST['upload_profile_picture'])){
	$filetmp  = $_FILES['profile_picture']['tmp_name'];
	$profile_picture = base64_encode(file_get_contents(addslashes($filetmp)));

	$query = "UPDATE user SET profile_picture ='$profile_picture' WHERE username='".$_SESSION['username']."' ";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	header("Location: logout.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container" id="container" >
		<div id="sub_header">
		<div id="header" style="border:0.5px solid lightgray;padding:0px;">
			<i class="fa fa-arrow-left"></i><i class="fa fa-home"></i><p>Home / </p> <p>Profile</p><div id="date"><?php get_date(); ?></div>
		</div>

		</div>
		<div id="header">
			<i class="fa fa-arrow-left"></i>
			<h2>Profile Management</h2> - <h3>Your Profile</h3> <div id="date"><?php get_date(); ?></div>
		</div>
		<div id="header" style="border:0.5px solid lightgray;padding-top: 0px;padding-bottom:0px;">
			<i class="fa fa-home"></i><p>Home / </p> <p>Profile</p>
		</div>
		<div id="body">
			<div id="profile_container">
				<div id="coverphoto_container">
					<div id="profile_picture_container"><img src="<?php echo get_profile_picture($_SESSION['username'],$connect); ?>"></div>
					<div id="name_container">
						<h1><?php echo $_SESSION['username']; ?></h1>
						<h3><?php echo $_SESSION['email']; ?></h3>
						<h3>Rank</h3>
					</div>
					<form method="POST" enctype="multipart/form-data">
						<input type="file" name="profile_picture" style="display: none;">
						<input type="submit" name="upload_profile_picture" id="upload_profile_picture">
					</form>
				</div>
			</div>

			<div class="tab">
  <button class="tablinks" onclick="profile_tabs(event, 'Overview')" style="background: ">Overview</button>
    <button class="tablinks" onclick="profile_tabs(event, 'Basic')">Edit Information</button>
    <i class="fa fa-cog" style="float: right;margin: 10px;font-size: 24px;cursor: pointer;"></i>
</div>

<div id="Basic" class="tabcontent">
  <div id="body">
  	
  </div>
</div>

<div id="Overview" class="tabcontent" style="display: block;">
  <div id="body">
  	<div class="cards"><h2><?php echo $_SESSION['username'] ?></h2><h3><?php echo $_SESSION['email'] ?></h3><h5>Position</h5></div>

  	<div class="cards" style="background: #2ABBAC;"><h2>Birthday</h2><h3>Age</h3><h5>Contact Number</h5></div>

  	<div class="cards" style="background: #FFBB34;"><h2>My Income</h2><h3>Number of Income</h3><h5>Last Activity</h5></div>

  	 <div class="cards" style="background: #AA66CD;"><h2>My Group</h2><h3>Number of Group</h3><h5>Last Activity</h5></div>

  	<div class="cards" style="background: #33B5E7;"><h2>Pictures</h2><h3>0 out of 0</h3><h5></h5></div>
  </div>
</div>



		</div>
	</div>
</body>
<script>
function profile_tabs(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("sub_header").style.display = "block";
  } else {
     document.getElementById("sub_header").style.display = "none";
  }
}
</script>
<style type="text/css">
	body{
		margin: 0;
		font-family: lato, sans-serif;
	}
	#body{
		padding: 20px;
	}
	#profile_container{
		width: 100%;
		height: 400px;
		background: #2ABBAC;
	}
	#coverphoto_container{

	}
	#coverphoto_container #profile_picture_container{
		float: left;
		width: 150px;
		height: 150px;
		background: blue;
		margin-top: 225px;
		margin-left: 50px;
		border-radius: 50%;
	}
	#profile_picture_container img{
		width: 150px;
		height: 150px;
		border-radius: 50%;
	}
	#coverphoto_container #name_container{
		float: left;
		width: 400px;
		height: 150px;
		margin-top: 225px;
		margin-left: 25px;
	}
	#coverphoto_container #name_container h1{
		color: white;
		font-size: 40px;
		margin: 20px;
		line-height: 24px;
	}
	#coverphoto_container #name_container h3{
		color: white;
		font-size: 22px;
		margin: 20px;
		margin-top: 5px;
	}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.cards{
		width: 250px;
		background: #F8665A;
		display: inline-block;
		margin: 15px;
		user-select: none;
		text-align: left;
		cursor: pointer;
}
.cards h2{
		color: white;
		font-size: 40px;
		margin-left: 20px;
		margin-top: 20px;
	}
.cards h3{
		color: white;
		font-size: 20px;
		margin-left: 20px;
		margin-top: 0px;
	}
.cards h5{
		color: white;
		font-size: 16px;
		margin-left: 20px;
		margin-top: -10px;
	}
	#sub_header{
		height: 40px;
		margin-left: 50px;
		width: 75%;
		background:white;
		position: fixed;
		z-index: 92;
	}
</style>
</html>