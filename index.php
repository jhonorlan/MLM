<?php 
include 'database.php';


?>
<!DOCTYPE html>
<html>
<head>
	 <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon"  href="">

    <link rel="stylesheet" type="text/css" href="assets/css/index.css">

	<script src="https://kit.fontawesome.com/316c8d58b7.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<link rel="stylesheet" href="lib/owlcarousel/dist/assets/owl.carousel.css">
	<link rel="stylesheet" href="lib/owlcarousel/dist/assets/owl.theme.css">

	<script src="lib/owlcarousel/dist/owl.carousel.js"></script>
	<div class="navbar" id="navbar">
		<div id="logo"></div>
	<ul>
		<li id="home">Home</li>
		<li id="all_products">Products</li>
		<li id="contact_us">Contact Us</li>
		<li id="my_account">My Account</li>
		<li id="sign_up">SHOP NOW</li>
	
		<div id="hover_container">
			<div id="home_container" style="">
				<div id="item"><i class="fa fa-info-circle"></i><p>ABOUT US <small>Learn more about our Company</small></p></div>
				<div id="item"><i class="fa fa-question-circle"></i><p>WHY US <small>Why Choose Us</small></p></div>
				<div id="item"><i class="fas fa-blog"></i><p>BLOG <small>Our Blog</small></p></div>
				<div id="item"><i class="fas fa-laptop"></i><p>JOB <small>Jobs Offered</small></p></div>
				<div id="item"><i class="fas fa-user-tie"></i><p>TESTIMONIES <small>Testimonies to our Company</small></p></div>
				<div id="item"><p style="color: white;"><center>Learn More</center></p></div>
			</div>
			<div id="all_products_container" >
				<div id="item"><i class="fab fa-product-hunt"></i><p>OUR PRODUCT <small>View our Product</small></p></div>
				<div id="item"><i class="fas fa-wrench"></i><p>WHAT'S NEW <small>Features,Product and Availability</small></p></div>
				<div id="item"><i class="fas fa-user-check"></i><p>RECOMMENDED <small>Recommended for you</small></p></div>
				<div id="item"><i class="fas fa-store-alt"></i><p>SHOP <small>Go to Shop</small></p></div>
				<div id="item"><i class="fas fa-shopping-cart"></i><p>YOUR CART <small>Go to your Cart</small></p></div>
				<div id="item"><p style="color: white;"><center>Learn More</center></p></div>
			</div>
			<div id="contact_us_container">
			<div id="item"><i class="fa fa-envelope"></i><p>Get in Touch<small>Follow us in Facebook</small></p></div>
			<div id="item"><i class="fas fa-money"></i><p>Accounts & Billing<small>Follow us in Facebook</small></p></div>
			<div id="item"><i class="fas fa-exclamation-circle"></i><p>Report a Problem<small>Follow us in Facebook</small></p></div>
			<div id="item"><i class="far fa-comment-dots"></i><p>Ask the Community<small>Follow us in Facebook</small></p></div>
				<div id="item" class="follow_us"><p style="color: white;"><center>Follow Us</center></p>
					<div id="sub_follow_us_container" style="">
					<div id="item"><i class="fab fa-facebook"></i><p>Facebook <small>Follow us in Facebook</small></p></div>
					<div id="item"><i class="fab fa-twitter"></i><p>Twitter <small>Follow us in Twitter</small></p></div>
					<div id="item"><i class="fab fa-instagram"></i><p>Instagram <small>Follow us in Instagram</small></p></div>
					<div id="item" style="background: #f8f9fd"><i class="fa fa-envelope"></i><p>Write <small>Write a Message</small></p></div>

					</div>
				</div>
			</div>
			<div id="my_account_container" >
			<center>
	<?php if (!isset($_SESSION['username'])): ?>
		<span class="login_form">
				<form method="POST" id="login_account">
					<center><div id="login_error"></div></center>
					<label id="label_username" >Username</label>
					<input type="text" name="username" placeholder="Username" data-placeholder="Username" autocomplete="false" data-label="#label_username"  autocomplete="">
					<label id="label_password">Password</label>
					<input type="password" name="password" placeholder="Password" data-placeholder="Password" data-label="#label_password">
					<button class="sign_in" id="submit_button" value="">Sign In</button>
					<p id="myBtn">Not yet Member?</p>
					<p><a href="">Forget?</a></p>
				</form>
			</span>
		<?php else: ?>
			<span class="user_session">
				<center>
					<div id="profile_picture" style="width: 100px;height:100px;border-radius:50%;background: black;"><img src="<?php echo get_profile_picture($_SESSION['username'],$connect); ?>"></div>
					<a href="admin.php"><button id="submit_button" style="margin: 10px;">Continue as <?php echo $_SESSION['username'] ?></button></a>
					<a href="logout.php"><button id="submit_button">Logout</button></a>
				</center>
			</span>
	<?php endif ?>
		<span class="loading_area" style="display: none;">
    		<center>
    			<div class="lds-roller"><div></div><div></div><div></div><div>
    		</center>
    	</span>
			</center>
			</div>
		</div>
	</ul>
	</div>
	<div id="container">
		<center>
			<h1>BIG TAGLINE</h1>
			<h2>SUPPORTING DETAILS</h2>
			<div id="container_button">SHOP NOW!</div>
		</center>
	</div>
	<div class="container_2" id="container_2">
		<div id="container">
			<center>
				<h2>FEAUTURES</h2>
						<div id="items">
							<div id="icon"><i class="fa fa-bolt" style="transform:rotate(30deg);"></i></div>
							<h3>Faster</h3>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
						</div>
						<div id="items">
							<div id="icon"><i class="fa fa-mobile-phone"></i></div>
							<h3>Responsive</h3>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						</div>
						<div id="items">
							<div id="icon"><i class="fa fa-money"></i></div>
							<h3>Affordable</h3>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						</div>
			</center>
		</div>


<div class="container_3">
	<center><h1 style="text-transform:uppercase;font-size:50px;font-weight: 800;color: #3776FF;">What People say in our Company?</h1></center>
<div id="owl-demo" class="owl-carousel owl-theme">

  <div class="item">
  	<center>
  		<div id="profile_picture"><img src="images/image_1.webp"></div>
  		<h2>John Doe</h2>
  		 			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
  		<div id="box">
  			<p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."</p>
 
  		</div>
  	</center>
  </div>
  <div class="item">
  	  	<center>
  		<div id="profile_picture"><img src="images/image_1.webp"></div>
  		<h2>John Doe</h2>
  		 	<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
  		<div id="box">

  			<p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."</p>

  		</div>
  	</center>
  </div>
  <div class="item">
  	  	<center>
  		<div id="profile_picture"><img src="images/image_1.webp"></div>
  		<h2>John Doe</h2>
  		 	<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
  		<div id="box">
  			<p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."</p>
 
  		</div>
  	</center>
  </div>
  <div class="item">
  	  	<center>
  		<div id="profile_picture"><img src="images/image_1.webp"></div>
  		<h2>John Doe</h2>
  		 	<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
  		<div id="box">
  			<p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."</p>
  
  		</div>
  	</center>
  </div>
  <div class="item">
  	  	<center>
  		<div id="profile_picture"><img src="images/image_1.webp"></div>
  		<h2>John Doe</h2>
  		 	<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
  		<div id="box">
  			<p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."</p>

  		</div>
  	</center>
  </div>
  <div class="item">
  	  	<center>
  		<div id="profile_picture"><img src="images/image_1.webp"></div>
  		<h2>John Doe</h2>
  		 	<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
  		<div id="box">
  			<p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."</p>
  		</div>
  	</center>
  </div>
 
</div>
	</div>
	</div>


</head>
<body>

<button id="myBtn">Open Modal</button>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    	<span class="register_form">
    		<form method="POST" id="create_an_account">
    		<center>
    			<h2>Create an Account</h2>
    			<div id="register_error"></div>
    		</center>
    		
    		<label id="register_username_label">Username</label>
    		<input type="text" name="username" placeholder="Username" data-placeholder="Username" data-label="#register_username_label">

    		<label id="register_email_label">Email</label>
    		<input type="email" name="email" placeholder="Email" data-placeholder="Email" data-label="#register_email_label">

    		<label id="register_password_label">Password</label>
    		<input type="password" name="password" placeholder="Password" data-placeholder="Password"data-label="#register_password_label">

    		<label id="register_confirm_password_label">Confirm Password</label>
    		<input type="password" name="confirm_password" placeholder="Confirm Password" data-placeholder="Confirm Password" data-label="#register_confirm_password_label">
    		<center><button type="submit" name="create_an_account" class="register_button" id="submit_button" value="">Create an Account</button></center>
    	</form>
    	</span>
    	<span class="loading_area" style="display: none;">
    		<center>
    			<div class="lds-roller"><div></div><div></div><div></div><div>
    		</center>
    	</span>
  </div>

</div>
<script type="text/javascript" >
		$(document).ready(function(){
		$(window).hover(function(e){
			var home = document.getElementById('home');
			var all_products = document.getElementById('all_products');
			var contact_us = document.getElementById('contact_us');
			var my_account = document.getElementById('my_account');
			var navbar = document.getElementById('navbar');
			var hover_container = document.getElementById('hover_container');

			//container//
			var home_container = document.getElementById('home_container');
			var contact_us_container = document.getElementById('contact_us_container');
			var my_account_container = document.getElementById('my_account_container');
			var all_products_container = document.getElementById('all_products_container');
			var container = document.getElementById('container');
			var container_2 =document.getElementById('container_2');
			if(e.target == home){
				$("#hover_container").css({
					'display':'flex',
					'visibility':'visible',
					'margin-left':'-100px'
				});
				$(this).css('color','#3776ff');
				$(" #home_container").css("display","block");
				$("#contact_us_container").css("display","none");
				$(" #my_account_container").css("display","none");
				$(" #all_products_container").css("display","none");
	

			}else if(e.target == all_products){
					$("#hover_container").css({
					'display':'flex',
					'visibility':'visible',
					'margin-left':'0px'
				});
				$("#home_container").css("display","none");
				$("#contact_us_container").css("display","none");
				$("#my_account_container").css("display","none");
				$("#all_products_container").css("display","block");
			
			}else if(e.target == contact_us){
				$("#hover_container").css({
					'display':'flex',
					'visibility':'visible',
					'margin-left':'110px'
				});
				$("#home_container").css("display","none");
				$("#contact_us_container").css("display","block");
				$("#my_account_container").css("display","none");
				$("#all_products_container").css("display","none");
			
			}else if(e.target == my_account){
				$("#hover_container").css({
					'display':'flex',
					'visibility':'visible',
					'margin-left':'255px',
					'width':'300px'
				});
				$("#home_container").css("display","none");
				$("#contact_us_container").css("display","none");
				$("#my_account_container").css("display","block");
				$("#all_products_container").css("display","none");
				
			}else if(e.target == container){
				$("#hover_container").css({
					'display':'flex',
					'visibility':'hidden'
				});

			}else if(e.target == container_2){
				$("#hover_container").css({
					'display':'flex',
					'visibility':'hidden'
				});

			}else if(e.target == hover_container){
				$("#hover_container").css({
					'display':'flex',
					'visibility':'visible',
				});
			}else if(e.target == home_container){
				$("#hover_container").css({
					'display':'flex',
					'visibility':'visible',
				});
			}else if(e.target == all_products_container){
				$("#hover_container").css({
					'display':'flex',
					'visibility':'visible',
				});
			}else if(e.target == contact_us_container){
				$("#hover_container").css({
					'display':'flex',
					'visibility':'visible',
				});
			}else if(e.target == my_account_container){
				$("#hover_container").css({
					'display':'flex',
					'visibility':'visible',
				});
			}
		});
		$('input').focus(function(){
			var label = $(this).data('label');
			$(this).removeAttr('placeholder');
			$(this).css('background','#FFFFFF');
			$(label).css('display','block');

		});
		$('input').blur(function(){
			var label = $(this).data('label');
			var placeholder =$(this).data('placeholder');
			$(this).attr('placeholder',placeholder);
			$(this).css('background','#e0e2e5');
			$(label).css('display','none');
		});
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
			  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 50) {
			    document.getElementById("navbar").style.background = "white";
			   	$(".navbar li").css({
			   		color:'#797E82'
			   	});
			   	$("#sign_up").css('color','white');
			  } else {
			    document.getElementById("navbar").style.background = "transparent";
			     $(".navbar li").css('color','white');
			     $("#sign_up").css('color','white');
			  }
			}

			$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      loop:true
 
  });
  var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
 
});
			$(".register_button").on('click',function(e){
				e.preventDefault();
				$(".loading_area").show();
				$(".register_form").hide();
				setTimeout(function(){
				$(".loading_area").hide();
				$(".register_form").show();
				},2000);

				$.ajax({
					url:'data/register_session.php',
					type:'POST',
					data:$('#create_an_account').serialize(),
					success:function(data){
						$("#register_error").html(data);
						if(data.index() = ""){
							$("#success").show();
						}
					}
				});
			});	

			$(".sign_in").on('click',function(e){
				e.preventDefault();
				$(".loading_area").show();
				$(".login_form").hide();
				setTimeout(function(){
				$(".loading_area").hide();
				$(".login_form").show();

				location.reload(true);
				},2000);
				$.ajax({
					url:'data/login_session.php',
					type:'POST',
					data: $("#login_account").serialize(),
					success:function(data){
						$("#login_error").html(data);
					}
				});
			});
	});
</script>

<style type="text/css">
		body{
		margin: 0;
		font-family: lato, sans-serif;
		background: #E9EBEE;
	}
	@font-face{
		src:url(assets/fonts/Lato-Regular.ttf);
		font-family: lato;
	}
	.navbar{
		padding-top: 10px;
		padding-right: 150px;
		height: 75px;
		position: fixed;
		width: 100%;
		background: transparent;
		z-index: 999;
		transition: 0.2s;
		box-shadow: 3px 11px 15px -8px rgba(0,0,0,0.75);
	}
	.navbar ul{float: right;margin-top: 0px;}
	.navbar ul div#hover_container{
		position: absolute;
		padding: 5px;
		min-width: 150px;
		min-height: 150px;
		border-radius: 10px;
		background: #f8f9fd;
		margin-top: 30px;
		justify-content: center;
		display: none;
		transition:all 0.5s;
		z-index: 990;
	}
	.navbar ul div#hover_container::before{
		content: "";
		position: absolute;
		 width: 0; 
	 	 height: 0; 
	 	 border-left: 25px solid transparent;
	 	 border-right: 25px solid transparent;
	 	 border-bottom: 20px solid #f8f9fd;
	 	 margin-top: -25px;
	}
	#hover_container input{
		width: 200px;
		margin: 20px;
		padding: 14px 16px;
		border-radius: 4px;
		border: none;
		background: #e0e2e5;
		border:2px solid #e0e2e5;
		display: block;
		transition: 0.5s;
		outline-color: #3776ff;
	}
	#hover_container label{
		font-size: 14px;
		text-align: left;
		margin-left: 20px;
		display: none;
		font-weight: 700;
		color: #3776ff;
		margin-top: 5px;
	}
	#hover_container input:hover{
		border:2px solid #3776ff;
	}
	#hover_container a{
		text-decoration: none;
		color: #3776ff;
	}
	#hover_container p{
		color: #3776ff;
		cursor: pointer;
	}
	#hover_container #item i{
		float: left;
		font-size: 24px;
		color: #3776ff;
		margin-right: 20px;
	}
	#hover_container #item{
		min-width:250px;
		margin: 10px;
		padding:14px;
		height: 25px;
		text-align: left;
		border-radius: 5px;
		cursor: pointer;
	}
	#hover_container #item small{
		display: block;
		font-size: 12px;
		
	}
	#hover_container #item:hover{
		margin-left: 15px;
			transition: 0.2s;
	}
	#hover_container #item p{
		font-size: 24px;
		color: #3776ff;
		float: left;
		margin-top: -5px;
	}
	#hover_container #item:last-child{
		background: #3776ff;
		color: white;
		text-align: center;
		border-radius: 25px;
	}
	#hover_container #item:last-child:hover{
		margin: 10px;

	}
	#hover_container #submit_button{
		width: 90%;
		padding: 15px;
		border-radius: 25px;
		cursor: pointer;
		background: #3776ff;
		border: none;
		color: white;
		outline: none;
	
	}#submit_button:hover{
		border: none;
	}
	#submit_button{
		width: 80%;
		padding: 15px;
		border-radius: 25px;
		cursor: pointer;
		background: #3776ff;
		border: none;
		color: white;
	
	}#submit_button:hover{
		border: none;
	}
	#sub_follow_us_container{
		position: absolute;
		padding: 5px;
		min-width: 150px;
		min-height: 150px;
		border-radius: 10px;
		background: #f8f9fd;
		margin-top: -100px;
		justify-content: center;
		transition:all 0.5s;
		z-index: 999;
		margin-left: -345px;
		display: none;
	}
	#sub_follow_us_container:before{
		content: "";
		position: absolute;
		 width: 0; 
		  height: 0; 
		  border-top: 25px solid transparent;
		  border-bottom: 25px solid transparent;
		  border-left: 25px solid #f8f9fd;
		  right: -20px;
		  margin-top: 65px;
	
	}
	.follow_us:hover #sub_follow_us_container{
		display: block;
	}
	
	.navbar li{
		list-style-type: none;
		display: inline-block;
		padding: 10px;
		margin: 5px 10px 0px 10px;
		font-size: 18px;
		color: white;
		cursor: pointer;
		font-weight: 400;
	}
	.navbar li:hover{color: white;transform: scale(1.2);}/*#3776ff */
	.navbar li#sign_up{
		background: #6090f8;
		color: #FFFFFF;
		padding: 15px 40px 15px 40px;
		border-radius: 50px;
		font-weight: 800;
		margin-right: 50px;
	}

	 #container{
		position: absolute;
		width: 100%;
		height: 640px;
		left: 0;
		top: -20px;
		margin-top: 20px;
		background:url('images/backgrounds.png');
		padding-top: 120px;
		background-size: cover;
		background-position: center;
		margin-bottom: 100px;
	}
	#container h1{
		font-size: 100px;
		font-weight: 800;
		color: white;
		line-height: 54px;
	}
	#container h2{
		font-size:30px;
		color: white;
	}
	 #container_button{
		width: 250px;
		padding: 14px;
		cursor: pointer;
		background: white;
		border: none;
		margin: 10px;
		text-align: center;
		font-size: 24px;
		font-weight: 700;
		color: #3776ff;
		border-radius: 50px;
	}
	.container_2{
		width: 100%;
		height:800px;
		position: absolute;
		background: url('images/background.png');
		background-repeat: no-repeat;
		background-size: cover;
		z-index: 99;
		top: 130%;
		display: /**/;
	}
	.container_2 #container{
		width: 1000px;
		height: auto;
		padding-top: 0px;
		background: #FFFFFF;
		border-radius: 25px;
		margin:25px 15%;
		padding-bottom: 100px;
		box-shadow: 10px 10px 15px -8px rgba(0,0,0,0.85);
	}
	.container_2 #container #items{
		width: 250px;
		padding: 15px;
		margin: 25px;
		margin-top: 0px;
		background: ;
		border-radius: 5px;
		background: ;
		display: inline-block;
			cursor: pointer;
		height: auto;
		box-shadow: 10px 10px 25px -8px rgba(0,0,0,0.75);
	}
	.container_2 #container h2{
		color: #3776FF;
		font-weight: 800;
		font-size: 60px;
	}
	.container_2 #container #items #icon{
		width: 100px;
		height: 100px;
		background: ;
		font-size: 50px;
		color: #3776FF;
		margin:10px;
		border-radius: 50%;
		box-shadow: 10px 10px 25px -8px rgba(0,0,0,0.75);
		cursor: pointer;
	}
	.container_2 #container #items #icon:hover{
		transform: translate(-5px, -5px);
	}
	.container_2 #container #items h3{
		color: black;
		font-size: 24px;
		font-weight: 600;
	}.container_2 #container #items p{
		color: #797e82;
		font-size: 16px;
		line-height: 24px;
	}	
	#icon i{
		margin:25px 10px;
		position: relative;
	}
	.container_3{
		height: 500px;
		background: ;
		margin-top: 55%;
		margin-bottom: 50px;
		padding-top: 50px;
		padding-right: 50px;
		padding-left: 30px;
	}
	
	 #items:hover{
		transform: scale(1.1);
	}

	#owl-demo .item{
    width: 300px;
    padding-bottom: 15px;
    background: white;
    margin: 50px;
    float: left;
    border-radius: 15px;
    cursor: pointer;
}
#owl-demo .item #profile_picture{
	width: 100px;
	height: 100px;
	border-radius: 50%;
	background: black;
	margin: 15px;
}
#owl-demo .item #profile_picture img{
	width: 100%;
	height: 100%;
	border-radius: 50%;
}
 #profile_picture img{
	width: 100%;
	height: 100%;
	border-radius: 50%;

}
#owl-demo .item .fa-star{
	color: #FFA500;
}
#owl-demo .item h2{
	font-size: 20px;
	color: #797E82;
}
#owl-demo .item #box{
	width: 80%;
	border-radius: 5px;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  z-index: 999;
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 30%;
  z-index: 999;
  border-radius: 10px;
  padding-left: 40px;
}
.modal-content input[type='text'],input[type='password'],input[type='email']{
		width: 300px;
		margin: 20px;
		padding: 14px 16px;
		border-radius: 4px;
		border: none;
		background: #e0e2e5;
		border:2px solid #e0e2e5;
		display: block;
		transition: 0.5s;
		outline-color: #3776ff;
	}
.modal-content label{
		font-size: 14px;
		text-align: left;
		margin-left: 20px;
		display: none;
		font-weight: 700;
		color: #3776ff;
		margin-top: 5px;
	}
.modal-content input:hover{
		border:2px solid #3776ff;
	}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  display: none;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>
<style type="text/css">
	.lds-roller {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #903FFE;
  margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 63px;
  left: 63px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 68px;
  left: 56px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 71px;
  left: 48px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 72px;
  left: 40px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 71px;
  left: 32px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 68px;
  left: 24px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 63px;
  left: 17px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 56px;
  left: 12px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

</style>
</body>
</html>