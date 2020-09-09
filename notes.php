<?php include 'outline.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Notes</title>
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
			<h2>Add Notes</h2> - <h3>Create Notes</h3> <div id="date"><?php get_date(); ?></div>
		</div>
		<div id="header" style="border:0.5px solid lightgray;padding-top: 0px;padding-bottom:0px;">
			<i class="fa fa-home"></i><p>Home / </p><i class="fa fa-sticky-note"></i><p>Notes /</p>
		</div>
		<div id="body">

			<h2>Create a Note</h2><p id="state">Primary</p>
			<div id="note_input" style="display: block;">
				<input type="text" name="title" placeholder="Title" id="title">
				<textarea name="note_content" placeholder="Note Content" id="note_content"></textarea>
				<div id="other_button" class="button" style="background: #337AB7;" data-state="Primary">Primary</div>
				<div id="other_button" class="button"  style="background: #5CB85C;" data-state="Success">Success</div>
				<div id="other_button" class="button" style="background: #5BC0DE;" data-state="Information">Information</div>
				<div id="other_button" class="button" style="background: #F0AD4E;" data-state="Warning">Warning</div>
				<div id="other_button" class="button" style="background: #D9534F;" data-state="Danger">Danger</div>
				<div id="other_button" class="button" style="background: #e43b3b" data-state="Important">Important</div>
				<div id="save_button">Save Note</div>
			</div>
		<span class="loading_area" style="display: none;">
    		<center>
    			<div class="lds-roller"><div></div><div></div><div></div><div>
    		</center>
    	</span>
    	<br><br><br>
    	<h2>Created Notes</h2>

    	<div id="all_notes"><?php fetch_notes($connect); ?></div>

		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$(".button").click(function(){
			var state = $(this).data('state');
			$("#state").html(state);
			$(this).css({
				'border-bottom':'2px solid #114167'
			});
			$(".button").not($(this)).css({
				'border':'none'
			});
		});
		$("#save_button").click(function(){
			var title = $("#title").val();
			var note_content = $("#note_content").val();
			var state = $("#state").html();
			$.ajax({
				url:'data/insert_notes.php',
				type:'POST',
				data:{title:title,note_content:note_content,state:state},
				success:function(){

				}
			});
				$(".loading_area").show();
				$("#note_input").hide();
				setTimeout(function(){
				$(".loading_area").hide();
				$("#note_input").show();

				location.reload(true);
				},2000);
		});
	});
</script>
<style type="text/css">

</style>
</style>
</html>