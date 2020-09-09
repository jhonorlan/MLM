<?php include 'outline.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="container">
			<div id="right_click_container" style="display: ;">
				<h2><div id="number"></div></h2>
				<div id="all_members_no_position"></div>
			</div>
		<div id="sub_header" style="width: 78%;margin-left:27px;z-index: 1;">
			<div id="header" style="border:0.5px solid lightgray;padding:0px;">
				<i class="fa fa-arrow-left"></i><i class="fa fa-home"></i><p>Home / </p> <p>Geneology</p><div id="date"><?php get_date(); ?></div>
			</div>
		</div>
		<div id="header">
			<i class="fa fa-arrow-left"></i>
			<h2>Geneology</h2> - <h3>Binary Tree</h3> <div id="date"><?php get_date(); ?></div>
		</div>
		<div id="header" style="border:0.5px solid lightgray;padding-top: 0px;padding-bottom:0px;">
			<i class="fa fa-home"></i><p>Home / </p> <p>Geneology</p>
		</div>
		<div id="body">
			<center>
				<div id="box-parent">
					<div id="user_parent" class="user empty" data-number="1"><div id="circle">1</div>
					<div id=""><i class="fa fa-user" style="font-size: 40px;margin-top: -10px;"></i></div>
						<div id="profile_container"></div>
					</div>
				</div>
				<div id="box" class=""></div>
				<br>
				<div id="box-parent" class="left top" >
					<div id="user_parent" class="user empty" data-number="2"><div id="circle">2</div>
					<div id="result2"></div>
						<div id="profile_container"></div>
					</div>
				</div>
				<div id="space"></div>
				<div id="box-parent" class="right ">
					<div id="user_parent" class="user empty" data-number="3"><div id="circle">3</div>
					<div id="result3"></div>
						<div id="profile_container"></div>
					</div>
				</div>
				<br>
				<div id="box-parent" class="left " >
				</div>
				<div id="space"></div>
				<div id="box-parent" class="right " >
				</div>
				<br>
				<div id="box-third" class="left" style="margin-left: -600px;">
					<div id="user_parent" class="user left-parent empty"  data-number="4"><div id="circle">4</div>
					<div id="result4"></div>
						<div id="profile_container"></div>
					</div>	
					<div id="user_parent" class="user right-parent empty "data-number="5"><div id="circle">5</div>
					<div id="result5"></div>
						<div id="profile_container"></div>
					</div>
				</div>
				<div id="box-third" class="right" style="margin-right: -600px;">
					<div id="user_parent" class="user left-parent empty" data-number="6"><div id="circle">6</div>
					<div id="result6"></div>
						<div id="profile_container"></div>
					</div>
					<div id="user_parent" class="user right-parent empty" data-number="7"><div id="circle">7</div>
					<div id="result7"></div>
						<div id="profile_container"></div>
					</div>
				</div>
				<br>
				<div id="box-third" class="left" style="margin-left: -700px;margin-top: 100px;">
					<div id="user_parent" class="user left-parent empty" data-number="8"><div id="circle">8</div>
					<div id="result8"></div>
						<div id="profile_container"></div>
					</div>
					<div id="user_parent" class="user right-parent empty" data-number="9"><div id="circle">9</div>
					<div id="result9"></div>
						<div id="profile_container"></div>
					</div>
				</div>
				<div id="box-third" class="right" style="margin-right: -700px;">
					<div id="user_parent" class="user left-parent empty" style="" data-number="10"><div id="circle">10</div>
					<div id="result10"></div>
					<div id="profile_container"></div>
				</div>
					<div id="user_parent" class="user right-parent empty" data-number="11"><div id="circle">11</div>
					<div id="result11"></div>
						<div id="profile_container"></div>
				</div>
				</div>

<div id="box-last" style="padding:0px;background: ;display:block;margin-top:150px;width:100%;margin-left: ;">
				<div id="user_parent" class="user empty "data-number="12"><div id="circle">12</div>
				<div id="result12"></div>
					<div id="profile_container"></div>
				</div>
				<div id="user_parent" class="user empty" data-number="13"><div id="circle">13</div>
				<div id="result13"></div>
					<div id="profile_container"></div>
				</div>
				<div id="user_parent" class="user empty" data-number="14"><div id="circle">14</div>
				<div id="result14"></div>
					<div id="profile_container"></div>
				</div>
				<div id="user_parent" class="user empty" data-number="15"><div id="circle">15</div>
				<div id="result15"></div>
					<div id="profile_container"></div>
				</div>
				<div id="user_parent" class="user" data-number="" style="visibility: hidden;"><div id="circle">16</div>
				<div id=""></div>
					<div id="profile_container"></div>
				</div>
				<div id="user_parent" class="user empty" data-number="16"><div id="circle">16</div>
				<div id="result16"></div>
					<div id="profile_container"></div>
				</div>
				<div id="user_parent" class="user empty" data-number="17"><div id="circle">17</div>
				<div id="result17"></div>
					<div id="profile_container"></div>
				</div>
				<div id="user_parent" class="user empty"data-number="18"><div id="circle">18</div>
				<div id="result18"></div>
					<div id="profile_container"></div>
				</div>
				<div id="user_parent" class="user empty" data-number="19"><div id="circle">19</div>
				<div id="result19"></div>
					<div id="profile_container"></div>
				</div>
				<div id="user_parent" class="user empty" data-number="20"><div id="circle">20</div>
				<div id="result20"></div>
					<div id="profile_container"></div>
				</div>
</div>
			</center>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(window).on('load',function(){
				         $(".empty").each(function(){
            		var number = $(this).data('number');
            		if(number == 1){
            			$.ajax({
							url:'data/fetch_member_position_and_send.php',
							type:'POST',
							data:{number:number},
							success:function(data){
								$("#result"+number).html(data);
							}
						});
            		}else{
						$.ajax({
							url:'data/fetch_member_position_and_send.php',
							type:'POST',
							data:{number:number},
							success:function(data){
								$("#result"+number).html(data);
							}
						});
            		}
            	});
				
	});
	$('.container').click(function(){
		         $(".empty").each(function(){
            		var number = $(this).data('number');
            		if(number == 1){
            			$.ajax({
							url:'data/fetch_member_position_and_send.php',
							type:'POST',
							data:{number:number},
							success:function(data){
								$("#result"+number).html(data);
							}
						});
            		}else{
						$.ajax({
							url:'data/fetch_member_position_and_send.php',
							type:'POST',
							data:{number:number},
							success:function(data){
								$("#result"+number).html(data);
							}
						});
            		}
            	});
				
	});
 
 $('.user').mousedown(function(event) {
 	var number = $(this).data('number');
   	var x = event.clientX;
   	var y = event.clientY;

   	if(x > 1186){
   		x = x -200;
   	}else{
   		x = x + 30;
   	}
   	y = y + -170;


if(number != 1){
	   switch (event.which) {
        case 1:
             
            break;
        case 2:
             $("#right_click_container").hide();
            break;
        case 3:
            $("#right_click_container").show();
            $("#right_click_container").css({
            	'margin-left':x - '250',
            	'margin-top':y - '50'
            });
            $.ajax({
            	url:'data/fetch_member_position.php',
            	type:'POST',
            	data:{number:number},
            	success:function(data){
            		$("#all_members_no_position").html(data)
            	}
            });
            $(document).on('click','.add_position'+number,function(){
            	var username = $(this).data('username');
            	console.log(username);
            });
            break;
        default:
            
    }
}
	var position = "";
	if(number == 2){
		 position = " Left";
	}else if(number == 3){
	 	position = " Right";
	}else if(number == 4){
	 	position = " Left";
	}else if(number == 5){
	 	position = " Left";
	}else if(number == 6){
	 	position = " Right";
	}else if(number == 7){
	 	position = " Right";
	}else if(number == 8){
	 	position = " Left";
	}else if(number == 9){
	 	position = " Left";
	}else if(number == 10){
	 	position = " Right";
	}else if(number == 11){
	 	position = " Right";
	}else if(number == 12){
	 	position = " Left";
	}else if(number == 13){
	 	position = " Left";
	}else if(number == 14){
	 	position = " Left";
	}else if(number == 15){
	 	position = " Left";
	}else if(number == 16){
	 	position = " Right";
	}else if(number == 17){
	 	position = " Right";
	}else if(number == 18){
	 	position = " Right";
	}else if(number == 19){
	 	position = " Right";
	}else if(number == 20){
	 	position = " Right";
	}

	

$("#number").html(number + position + " Leg");	
});

$('.user').bind("contextmenu",function(e){
    return false;
});

</script>
<style type="text/css">
	#body{
		padding-bottom: 200px;
	}
	#body .user{
		width: 80px;
		height: 80px;
		background: #EBEEEE;
		border-radius: 50%;
		display: inline-block;
		cursor: pointer;
		z-index: 999;
		box-shadow: 10px 7px 25px -11px rgba(0,0,0,0.75);
	}
	#box-last .user{
		margin-left: 20px;
	}
	#body .user #circle{
		width: 30px;
		height: 30px;
		margin-left: 55px;
		background: #F8665A;
		border-radius: 50%;
		text-align: center;
		color: white;
		font-size: 20px;
	}
	#body .user #profile_container{
		width: 350px;
		height: 200px;
		background: blue;
		position: absolute;
		margin-top: 50px;
		margin-right: 100px;
		border-radius: 5px;
		display: none;
		transition-delay: 2s;
		transition: 5s;
	}
	#body .user:hover #profile_container{
		display: block;
		transition-timing-function: 10s;
		transition: 5s;
	}
	#body .user:hover{
		transform: translate(-5px, -5px);
	}
	#body #box{
		width: 400px;
		background:;
		height: 50px;
		margin: none;
		margin-top: 0px;
		border-bottom: none;
		z-index: -1;
	}
	#body #box-parent{
		width: 300px;
		background:;
		height: 50px;
		border: none;
		margin-top: 30px;
		display: inline-block;
		z-index: -100;
		background: ;
	}
	#body .left{
		margin-left: -300px;
	}
	#body .right{
		margin-right: -300px;
	}
	#body #space{
		width: 100px;
		background:;
		height: 50px;
		border:1px solid black;
		border-bottom: none;
		margin: none;
		margin-top: -20px;
		display: inline-block;
		visibility: hidden;
	}
	#body #box-third{
		width: 450px;
		background:;
		height: 50px;
		background: ;
		border: none;
		display: inline-block;
		margin-top: -3px;
		border-bottom: none;
	}
	#body .left-parent{
		margin-left: -200px;
		margin-top: 10px;
	}
	#body .right-parent{
		float: right;
		margin-right: 10px;
		margin-top: 10px;
	}
	#body .top{
		margin-top: -5px;
	}
#right_click_container{	
	border-radius: 5px;
	background: #4c5054;
	width: 150px;
	margin-top:200px;
	margin-left: 50px;
	position: fixed;
	display: none;
	color: white;
	font-family: lato;
	font-size: 12px;
	z-index: 1000;

}
#right_click_container .user{
	width: 50px;
	height: 50px;
	float: left;
	border-radius: 50%;
	cursor: pointer;
	margin: 10px;
	background: red;
	z-index: 999;

}
#right_click_container li{
	padding: 0px;
	background: white;
	list-style-type: none;
	cursor: pointer;
	border: 0.1px solid lightgray;
}
#right_click_container li:hover{
	background: #EBEEEE;
}


</style>
</html>