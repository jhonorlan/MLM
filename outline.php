<?php
include 'database.php';
if (!isset($_SESSION['username'])) {
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon"  href="">

    <link rel="stylesheet" type="text/css" href="assets/css/admin.css">

	<script src="https://kit.fontawesome.com/316c8d58b7.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	<link rel="stylesheet" type="text/css" href="lib/emoji/css.css">
	<link rel="stylesheet" href="lib/owlcarousel/dist/assets/owl.carousel.css">
	<link rel="stylesheet" href="lib/owlcarousel/dist/assets/owl.theme.css">
	<script src="lib/owlcarousel/dist/owl.carousel.js"></script>
	<div class="big-loading-area" style="display: none;">
		<center>
    			<div class="lds-roller"><div></div><div></div><div></div><div>
    	</center>
	</div>
<span class="after">
	<div class="navbar" id="navbar">
		<div id="buttons">
			<div id="items">
				<i class="fa fa-plus"></i>New
				<div id="items_container">
			<li><a href="add_member.php"><i class="fa fa-users"></i> New Members</a></li>
					<li><a href="notes.php"><i class="fa fa-sticky-note"></i> New Note</a></li>
					<li><a href="inbox.php"><i class="fa fa-comment-dots"></i> New Message</a></li>
					<li><a href=""><i class="fa fa-gift"></i> New Product</a></li>
				</div>
			</div>
				<div id="search" style="float: left;">
					<input type="text" name="" placeholder="Search" id="search-engine">
					<select id="search_by" name="search_in">
						<option value="Member">Members</option>
						<option value="Friends">Friends</option>
						<option value="Admin">Admin</option>
					</select>
					<div id="display_search"></div>
				</div>
			<div id="items" style="margin-top: 5px;">
				<img src="lib/flags/png/united-states.png">English
				<div id="items_container">
					<li><a href=""><img src="lib/flags/png/united-states.png">English (US)</a></li>
					<li><a href=""><img src="lib/flags/png/united-kingdom.png">English (UK)</a></li>
					<li><a href=""><img src="lib/flags/png/spain.png">Spanish</a></li>
					<li><a href=""><img src="lib/flags/png/china.png">Chinise</a></li>
					<li><a href=""><img src="lib/flags/png/france.png">French</a></li>
				</div>
			</div>
<span style="float: left;">
			<div id="items" style="padding: 2px;padding-bottom:5px;">
				<i class="fa fa-comment-dots" style="font-size: 22px;"></i>

					<div id="items_container">
					<li><a href=""><i class="fa fa-users"></i> New Members</a></li>
					<li><a href=""><i class="fa fa-sticky-note"></i> New Note</a></li>
					<li><a href=""><i class="fa fa-comment-dots"></i> New Message</a></li>
					<li><a href=""><i class="fa fa-gift"></i> New Product</a></li>
				</div>
			</div>
			<div id="items"  style="padding: 2px;padding-bottom:5px;">
				<i class="fa fa-bell" style="font-size: 22px;"></i>

				<div id="items_container">
					<li><a href=""><i class="fa fa-users"></i> New Members</a></li>
					<li><a href=""><i class="fa fa-sticky-note"></i> New Note</a></li>
					<li><a href=""><i class="fa fa-comment-dots"></i> New Message</a></li>
					<li><a href=""><i class="fa fa-gift"></i> New Product</a></li>
				</div>
			</div>
			<div id="items"  style="padding: 2px;padding-bottom:5px;">
				<i class="fa fa-info-circle" style="font-size: 22px;"></i>
					<div id="items_container">
					<li><a href="add_member.php"><i class="fa fa-users"></i> New Members</a></li>
					<li><a href="notes.php"><i class="fa fa-sticky-note"></i> New Note</a></li>
					<li><a href="inbox.php"><i class="fa fa-comment-dots"></i> New Message</a></li>
					<li><a href=""><i class="fa fa-gift"></i> New Product</a></li>
				</div>
			</div>
</span>
			<div id="items" style="float: left;">
		<div id="profile_picture" style="float: left;border-radius: 50%;">
				<img src="<?php echo  get_profile_picture($_SESSION['username'],$connect); ?>"style="border-radius: 50%;width:30px;height: 30px;">
		</div>

				<?php echo $_SESSION['username']; ?>
				<div id="items_container" style="margin-top: 20px;z-index: 999;">
					<li style="z-index: 999;"><a href="profile_management.php"><i class="fa fa-user"></i> Profile</a></li>
					<li><a href=""><i class="fa fa-users"></i>Members</a></li>
					<li><a href=""><i class="fa fa-info"></i> Report</a></li>
					<li><a href=""><i class="fa fa-cog"></i>Settings</a></li>
					<li><a href="logout.php"><i class="fa fa-sign-out"></i>Sign out</a></li>
				</div>
			</div>
		</div>
	</div>
	<div class="vertical_navbar" id="vertical_navbar">

	<div id="sub_profile" >
			<div id="profile_picture">
				<img src="<?php echo get_profile_picture($_SESSION['username'],$connect); ?>">
		</div>
		<i class="fa fa-cog"></i>
		<h2><a href="profile_management.php"><?php echo $_SESSION['username']; ?></a></h2><h5><?php echo $_SESSION['email']; ?></h5>
	</div>

		<div id="profile" >
			<div id="profile_picture">
<img src="<?php echo  get_profile_picture($_SESSION['username'],$connect); ?>">
		</div>
		<i class="fa fa-cog"></i>
		<h2><?php echo $_SESSION['username']; ?></h2><h5><?php echo $_SESSION['email']; ?></h5></div>
		<label>Main</label>
		<li><i class="fa fa-home"></i><a href="admin.php">Dashboard</a></li>
		<li class="li-group" data-sub="sub_1" data-g ="g1"><i class="fas fa-warehouse"></i><p>Comission Details</p><i class="fas fa-chevron-left g1" style="float: right;margin:15px 20px;font-weight:600;font-size:14px;"></i></li>
	<span id="sub_1" class="sub-li" style="display: none;">
		<li><i class="far fa-clipboard"></i><a href="daily_income.php">Daily Income</a></li>
		<li><i class="far fa-clipboard"></i><a href="group_income.php">Group Income</a></li>		
	</span>
		<label>Accounts</label>
		<li><i class="fa fa-users"></i><a href="summary.php">Summary</a></li>
		<li><i class="fa fa-bar-chart"></i><a href="downline.php">Downline</a></li>
		<li><i class="fa fa-user"></i><a href="profile_management.php">Profile Management</a></li>
		<li class="li-group" data-sub="sub_2" data-g ="g2"><i class="fa fa-users"></i><p>Members Management</p><i class="fas fa-chevron-left g2" style="float: right;margin:15px 20px;font-weight:600;font-size:14px;"></i></li>
	<span id="sub_2" class="sub-li" style="display: none;">
		<li><i class="fa fa-plus"></i><a href="add_member.php">Add Member</a></li>
		<li><i class="fa fa-minus"></i><a href="members_management.php">Remove Member</a></li>	
		<li><i class="fa fa-cog"></i><a href="members_management.php">Manage</a></li>		
	</span>
	<li><i class="fas fa-stream"></i><a href="Geneology.php">Geneology</a></li>
	<label>Tools</label>
	<li><i class="fas fa-sticky-note"></i><a href="notes.php">Notes</a></li>
	<li  class="li-group" data-sub="sub_3" data-g ="g3"><i class="far fa-comment-dots"></i><p>Message</p><i class="fas fa-chevron-left g3" style="float: right;margin:15px 20px;font-weight:600;font-size:14px;"></i></li>
	<span id="sub_3" class="sub-li" style="display: none;">
		<li><i class="fa fa-pen"></i><p>Write a Message</p></li>
		<li><i class="fa fa-envelope"></i><a href="inbox.php">My Inbox</a></li>	
		<li><i class="fa fa-archive"></i><a href="inbox.php">Archived Message</a></li>	
	</span>

	<li><i class="fa fa-bell"></i><p>Notification</p></li>
	<label>Reports</label>
	<li class="li-group" data-sub="sub_4" data-g ="g4"><i class="fa fa-users"></i><p>Reports</p><i class="fas fa-chevron-left g4" style="float: right;margin:15px 20px;font-weight:600;font-size:14px;"></i></li>
	<span id="sub_4" class="sub-li" style="display: none;">
		<li><i class="fa fa-minus"></i><p>Direct Referral</p></li>
		<li><i class="fa fa-minus"></i><p>In-Direct Referral</p></li>	
		<li><i class="fa fa-minus"></i><p>Sales Match History</p></li>	
		<li><i class="fa fa-minus"></i><p>Group Sales History</p></li>	
		<li><i class="fa fa-minus"></i><p>Travel Point History</p></li>	
		<li><i class="fa fa-minus"></i><p>Transaction History</p></li>	
	</span>
	<label>Settings</label>
	<li><i class="fa fa-wrench"></i><p>Configuration</p></li>
	</div>
</span>
</head>
<body>
	<div class="chat-dialog-container"></div>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".li-group").click(function(){
			var sub = $(this).data('sub');
			var g = $(this).data('g');
			$("#"+sub).toggle();
			$("#"+sub).css('transition','0.5s');
			$("."+g).toggleClass('change');
			$("."+g).css('transition','0.5s');
		});
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 120) {
    document.getElementById("sub_header").style.display = "block";
   
  } else {
     document.getElementById("sub_header").style.display = "none";
  }
}
var vertical_navbar = document.getElementById('vertical_navbar');
vertical_navbar.onscroll = function() {scrollFunctions()};
function scrollFunctions() {
  if (vertical_navbar.scrollTop > 80 || document.documentElement.scrollTop > 70) {
    document.getElementById("sub_profile").style.display = "block";

  } else {
     document.getElementById("sub_profile").style.display = "none";
  }
}

	$("#buttons #items").click(function(){
		 $(this).find('div#items_container').toggle();
		 $("div#items_container").not($(this).find('#items_container')).css('display','none');
	});
	$(window).click(function(e){
		var nav = document.getElementById('header');
		if(e.target == nav){
			 $("div#items_container").css('display','none');
		}
	});

$('input').focus(function(){
		var label = $(this).data('label');
			$(this).removeAttr('placeholder');
			$(label).css('display','block');

		});
		$('input').blur(function(){
			var label = $(this).data('label');
			var placeholder =$(this).not($("#search-engine")).data('placeholder');
			$(this).attr('placeholder',placeholder);
			$(label).css('display','none');
		});																			
});

$(document).on('keyup','#search-engine',function(){
       var name = $('#search-engine').val();
       var where = $("#search_by").val();  
       if (name == "") {
           $("#display_search").html(" ");
       }
       else {
           $.ajax({
               type: "POST",
               url: "data/search_in.php",
               data: {
                   search: name,
                   where:where
               },
               success: function(html) {
                   $("#display_search").html(html).show();
   					$("#search-engine").attr('placeholder','Search');
               }	
           });
       }
});
</script>


</body>

</html>