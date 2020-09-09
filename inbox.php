<?php include 'outline.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Inbox</title>
</head>
<body>
<div class="container" style="background: ;min-height:570px;">
			<div id="chat_dialog"></div>
			<div id="right_click_container" style="display: ;">
					<li class="select-all"><a href="#"><i class="fa fa-globe"></i>All</a></li>
						<li class="select-Archive"><a href="#"><i class="fa fa-archive"></i> Archived Messages</a></li>
						<li class="select-Read"> <a href="#"><i class="fa fa-envelope-open-text "></i>Read Messages</a></li>
						<!-- <li class="select-Unread"><a href="#"><i class="fa fa-envelope-open-text "></i>Unread Messages</a></li> -->
						<li class="select-Hidden"><a href="#"><i class="fas fa-eye-slash hide "></i>Hidden Messages</a></li>
						<li class="select-Bin"><a href="#"><i class="far fa-trash-alt"></i>Recycle Bin</a></li>
						<li><small style="color: black;">Click Middle mouse click to close</small></li>
			</div>
		<div id="sub_header">
		<div id="header" style="border:0.5px solid lightgray;padding:0px;">
			<i class="fa fa-arrow-left"></i><i class="fa fa-home"></i><p>Home/</p> <p>Profile</p><div id="date"><?php get_date(); ?></div>
		</div>
	</div>
		<div id="header">
			<i class="fa fa-arrow-left"></i>
			<h2>Messages</h2> - <h3>Your Inbox</h3> <div id="date"><?php get_date(); ?></div>
		</div>
		<div id="header" style="border:0.5px solid lightgray;padding-top: 0px;padding-bottom:0px;">
			<i class="fa fa-home"></i><p>Home / </p> <p>Messages /</p> <p>Inbox</p>
		</div>
		<div id="body">

<div id="buttons" >
	<span style="float: left;margin:-20px 15px; ">
		<input id="checkbox-1" class="checkbox-custom" name="checkbox-1" type="checkbox">
	  <label for="checkbox-1" class="checkbox-custom-label"></label>
	</span>

	<div id="setting-icons" class="open" style="float: left;color: black;">
		<div id="items">
			<i class="fa fa-redo-alt refresh" style="color:black;">
				<div id="description">Refresh</div>
			</i>
		</div>
		<div id="items">
			<i class="fa fa-ellipsis-v menu" style="color: black;">
				<div id="description">Menu</div>
			</i>
					<div id="items_container" style="margin-top: 30px;">
						<li class="select-all"><a href="#"><i class="fa fa-globe"></i>All</a></li>
						<li class="select-Archive"><a href="#"><i class="fa fa-archive "></i> Archived Messages</a></li>
						<li class="select-Read"> <a href="#"><i class="fa fa-envelope-open-text "></i>Read Messages</a></li>
						<!-- <li class="select-Unread"><a href="#"><i class="fa fa-envelope-open-text "></i>Unread Messages</a></li> -->
						<li class="select-Hidden"><a href="#"><i class="fas fa-eye-slash hide "></i>Hidden Messages</a></li>
						<li class="select-Bin"><a href="#"><i class="far fa-trash-alt"></i>Recycle Bin</a></li>

					</div>
		</div>
		<div id="items">
			<i class="fa fa-plus open-new-message" style="color:black;"><div id="description">New Message</div></i>
		</div>
		<div id="items" class="filter-message"><?php select_message_filter($_SESSION['username'],$connect); ?>
			
		</div>
		<br>
	</div>
</div>
	<i class="fa fa-cog" style="float:right;font-size: 16px;cursor: pointer;"><div id="description">Settings</div></i>

<div id="setting-icons" class="close">
	<i class="fa fa-arrow-left"></i>
	<i class="fa fa-archive archive-all"></i>
	<i class="fa fa-trash delete-all"></i>
	<i class="fas fa-eye-slash hide-all"></i>
	<i class="fa fa-info-circle"></i>
	<i class="fa fa-sort sort"></i>
		<div id="count-user-selected-message" style="float: left;margin-top:10px;"></div>
</div>

  <div id="all_inbox_messages">
 	<table>
  <tr>
  	<th><i class="fa fa-check"></i></th>
    <th>Message</th>
    <th>From</th>
    <th>To</th>
    <th>Date</th>
    <th>Status</th>
  </tr>
  <span class="loading_area"style="margin-top:100px;margin-left:300px;position:absolute;"><center><div class="lds-roller"><div></div><div></div><div></div><div></center></span>
  </div>
</table>

		</div>
	</div>
	<div id="created_new_message_container" class="new_message">
		<div id="headers" class="created_new_message_container-header"><p>New Message</p>
			<span style="float: right;margin-top: 5px;">
				<i class="fa fa-window-minimize minimize"></i>
				<i class="fa fa-window-maximize maximize"></i>
				<i class="fa fa-times close-new-message"></i>
			</span>
		</div>
		<div id="body" >
		<div id="input_container">
				<small>Search from</small>
				<select name="user_filter" id="user_filter">
				<option value="Member">Members</option>
				<option value="Friends">Friends</option>
				<option value="Admin">Admin</option>
			</select>
			<br>
		<form method="POST" id="add-new-message-form"></form>
			<p>From: </p>
			<input type="text" name="from" id="from" value="<?php echo $_SESSION['username']; ?>" >
			<br>
			<p>To</p>: 
			<input type="text" name="to" id="search_in">
			<br>
			<div id="display_search_in"></div>
			<p>Subject:</p>
			<input type="text" name="subject" id="your_subject" placeholder="Your Subject">
		</div>
		</div>
		<div id="footer">
				<textarea id="new_message_textarea" name="message"></textarea>
				<i class="fa fa-plus"></i>
				<i class="fa fa-copy"></i>
				<i class="fa fa-archive"></i>
				<i class="fa fa-trash-o"></i>
				<i class="fa fa-send send" id="send_new_message"></i>
	</form>
		</div>

	</div>


</body>
<style type="text/css">
	.refresh-animate{
		transform: rotate(360deg);
		transition: 1s;
	}

</style>
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click','.refresh',function(){
	
			$(".refresh").toggleClass('refresh-animate');
			fetch_all_messages_and_sent_to_inbox();
		});
		$(document).on('click','.archive',function(){
			var id = $(this).data('message_id');
			var action = "Archive";
				$.confirm({
			    title: 'Confirm!',
			    content: 'Are you sure you want to Archive this Message?',
			    buttons: {
			        cancel: function () {
			   			
			        },
			        Archive: {
			            text: 'Continue',
			            btnClass: 'btn-blue',
			            keys: ['enter', 'shift'],
			            action: function(){
			                $.ajax({
			                	url:'data/add_action_to_messages.php',
			                	type:'POST',
			                	data:{action:action,id:id},
			                	success:function(){
			                		fetch_all_messages_and_sent_to_inbox();

			                	}
			                });
			            }
			        }
			    }
			});
		});
		$(document).on('click','.mark-as-read',function(){
			var id = $(this).data('message_id');
			var action = "Read";
	       $.ajax({
            	url:'data/add_action_to_messages.php',
            	type:'POST',
            	data:{action:action,id:id},
            	success:function(){
            		fetch_all_messages_and_sent_to_inbox();
        
            	}
            });
		});
		$(document).on('click','.mark-as-unread',function(){
			var id = $(this).data('message_id');
			var action = "Unread";
	       $.ajax({
            	url:'data/add_action_to_messages.php',
            	type:'POST',
            	data:{action:action,id:id},
            	success:function(){
            		fetch_all_messages_and_sent_to_inbox();
  
            	}
            });
		});
		$(document).on('click','.delete',function(){
			var id = $(this).data('message_id');
			var action = "Delete";
			$.confirm({
			    title: 'Confirm!',
			    content: 'Are you sure you want to Delete this Message?',
			    buttons: {
			        cancel: function () {
			   		
			        },
			        Delete: {
			            text: 'Delete',
			            btnClass: 'btn-red',
			            keys: ['enter', 'shift'],
			            action: function(){
			                $.ajax({
			                	url:'data/add_action_to_messages.php',
			                	type:'POST',
			                	data:{action:action,id:id},
			                	success:function(){
			                		fetch_all_messages_and_sent_to_inbox();
			                	}
			                });
			            }
			        }
			    }
			});
		});
		$(document).on('click','.hide',function(){
			var id = $(this).data('message_id');
			var action = "Hide";
					$.confirm({
			    title: 'Confirm!',
			    content: 'Are you sure you want to Hide this Message?',
			    buttons: {
			        cancel: function () {
			   		
			        },
			        Hide: {
			            text: 'Delete',
			            btnClass: 'btn-red',
			            keys: ['enter', 'shift'],
			            action: function(){
			               	$.ajax({
			                	url:'data/add_action_to_messages.php',
			                	type:'POST',
			                	data:{action:action,id:id},
			                	success:function(){
			                		fetch_all_messages_and_sent_to_inbox();
			                	}
			                });
			            }
			        }
			    }
			});
		});
		$(document).on('click','.unhide',function(){
			var id = $(this).data('message_id');
			var action = "";
					$.confirm({
			    title: 'Confirm!',
			    content: 'Are you sure you want to Unhide this Message?',
			    buttons: {
			        cancel: function () {
			   		
			        },
			        Hide: {
			            text: 'Unhide',
			            btnClass: 'btn-red',
			            keys: ['enter', 'shift'],
			            action: function(){
			               	$.ajax({
			                	url:'data/add_action_to_messages.php',
			                	type:'POST',
			                	data:{action:action,id:id},
			                	success:function(){
			                		fetch_all_messages_and_sent_to_inbox();
			                	}
			                });
			            }
			        }
			    }
			});
		});
			$(document).on('click','.select-Archive',function(){
				var select = "Archive";
				$.ajax({
					url:'data/select_inbox_message.php',
					type:'POST',
					data:{select:select},
					success:function(){
						fetch_all_messages_and_sent_to_inbox();
						$(".filter-message").html(select);
					}
				});
			});

			$(document).on('click','.select-Read',function(){
				var select = "Read";
				$.ajax({
					url:'data/select_inbox_message.php',
					type:'POST',
					data:{select:select},
					success:function(){
						fetch_all_messages_and_sent_to_inbox();
						$(".filter-message").html(select);
					}
				});
			});
			$(document).on('click','.select-Unread',function(){
				var select = "Unread";
				$.ajax({
					url:'data/select_inbox_message.php',
					type:'POST',
					data:{select:select},
					success:function(){
						fetch_all_messages_and_sent_to_inbox();
						$(".filter-message").html(select);
					}
				});
			});
			$(document).on('click','.select-Hidden',function(){
				var select = "Hide";
				$.ajax({
					url:'data/select_inbox_message.php',
					type:'POST',
					data:{select:select},
					success:function(){
						fetch_all_messages_and_sent_to_inbox();
						$(".filter-message").html(select);
					}
				});
			});
			$(document).on('click','.select-Bin',function(){
				var select = "Delete";
				$.ajax({
					url:'data/select_inbox_message.php',
					type:'POST',
					data:{select:select},
					success:function(){
						fetch_all_messages_and_sent_to_inbox();
						$(".filter-message").html(select);
					}
				});
			});
			$(document).on('click','.select-all',function(){
				var select = "";
				$.ajax({
					url:'data/select_inbox_message.php',
					type:'POST',
					data:{select:select},
					success:function(){
						fetch_all_messages_and_sent_to_inbox();
						$(".filter-message").html(select);
					}
				});
			});

		$(document).on('click','tr',function(e){
			var code = $(this).data('code');
			var selected = [];
			var archive = document.getElementById('archive'+code);
			var delete_icon = document.getElementById('delete'+code);
			var mark = document.getElementById('mark-as-read'+code);
			var hide = document.getElementById('hide'+code);
			if(e.target == archive){

			}else if(e.target == delete_icon){

			}else if(e.target == mark){
				
			}else if(e.target == hide){
				
			}else{
				if($("#checkbox_"+code).is(":checked")){
				$("#checkbox_"+code).prop('checked',false);
				$(this).toggleClass('toggleColor');

			}else{
				$("#checkbox_"+code).prop('checked',true);
				$(this).toggleClass('toggleColor');
			}

			$("tr input:checkbox:checked").each(function(){  
					var count = $('tr input:checkbox:checked').length;
				    selected.push($(this).val());
				    $("#count-user-selected-message").html(count + " Selected");
			});
			$("tr input:checkbox:not(:checked)").each(function(){
				var tr = $('tr').length - 1;
				var ckbx =  $("tr input:checkbox:not(:checked)").length;
				if(tr == ckbx){
				   	$(".close").hide();
				   	$(".open").show();
				   }else{
				   	$(".close").show();
				   	$(".open").hide();
				   }
			});
			}
			$("input[name='gender']").click(function(){
				$("input[name='gender']").prop("chec")
			});
			$(document).on('click','.delete-all',function(){
				   		var count = $('tr input:checkbox:checked').length;
				   		var action = "Delete";

				   		$.confirm({
						    title: 'Confirm!',
						    content: 'Are you sure you want to Delete all this '+count+' Messages?',
						    buttons: {
						        cancel: function () {
						   		
						        },
						        Hide: {
						            text: 'Delete',
						            btnClass: 'btn-red',
						            keys: ['enter', 'shift'],
						            action: function(){
						   
			               	 		$.ajax({
				   			url:'data/add_action_to_messages.php',
				   			type:'POST',
				   			data:{action:action,selected:selected},
				   			success:function(){
				   				fetch_all_messages_and_sent_to_inbox();
				   				
				   			}
				   		});
			            }
			        }
			    }
			});
				  
		});
				   	$(document).on('click','.archive-all',function(){
				   		var count = $('tr input:checkbox:checked').length;
				   		var action = "Archive";
				   		$.confirm({
						    title: 'Confirm!',
						    content: 'Are you sure you want to Archive all this '+count+' Messages?',
						    buttons: {
						        cancel: function () {
						   		
						        },
						        Archive: {
						            text: 'Archive',
						            btnClass: 'btn-red',
						            keys: ['enter', 'shift'],
						            action: function(){

			               	 		$.ajax({
				   			url:'data/add_action_to_messages.php',
				   			type:'POST',
				   			data:{action:action,selected:selected},
				   			success:function(){
				   				fetch_all_messages_and_sent_to_inbox();
				   				
				   			}
				   		});
			            }
			        }
			    }
			});
				  
		});
				   	$(document).on('click','.hide-all',function(){
				   		var count = $('tr input:checkbox:checked').length;
				   		var action = "Hide";
				   		$.confirm({
						    title: 'Confirm!',
						    content: 'Are you sure you want to Hide all this '+count+' Messages?',
						    buttons: {
						        cancel: function () {
						   		
						        },
						        Hide: {
						            text: 'Hide',
						            btnClass: 'btn-red',
						            keys: ['enter', 'shift'],
						            action: function(){
			               	 		$.ajax({
				   			url:'data/add_action_to_messages.php',
				   			type:'POST',
				   			data:{action:action,selected:selected},
				   			success:function(){
				   				fetch_all_messages_and_sent_to_inbox();
				   				
				   			}
				   		});
			            }
			        }
			    }
			});
				  
		});
		});

		$(document).on('click','#checkbox-1',function(){
		var selected = [];

			if($(this).is(":checked")){
				$("tr input:checkbox:not(:checked)").prop('checked',true);
			$("tr input:checkbox:checked").each(function(){  
					var count = $('tr input:checkbox:checked').length;
				    selected.push($(this).val());
				    $("#count-user-selected-message").html(count + " Selected");
			});
					$(".close").show();
				   	$(".open").hide();
				   	$("tr").not($(".not-tr")).toggleClass('toggleColor');
				   	$(document).on('click','.delete-all',function(){
				   		var count = $('tr input:checkbox:checked').length;
				   		var action = "Delete";

				   		$.confirm({
						    title: 'Confirm!',
						    content: 'Are you sure you want to Delete all this '+count+' Messages?',
						    buttons: {
						        cancel: function () {
						   		
						        },
						        Hide: {
						            text: 'Delete',
						            btnClass: 'btn-red',
						            keys: ['enter', 'shift'],
						            action: function(){
						   
			               	 		$.ajax({
				   			url:'data/add_action_to_messages.php',
				   			type:'POST',
				   			data:{action:action,selected:selected},
				   			success:function(){
				   				fetch_all_messages_and_sent_to_inbox();
				   				
				   			}
				   		});
			            }
			        }
			    }
			});
				  
		});
				   	$(document).on('click','.archive-all',function(){
				   		var count = $('tr input:checkbox:checked').length;
				   		var action = "Archive";
				   		$.confirm({
						    title: 'Confirm!',
						    content: 'Are you sure you want to Archive all this '+count+' Messages?',
						    buttons: {
						        cancel: function () {
						   		
						        },
						        Archive: {
						            text: 'Archive',
						            btnClass: 'btn-red',
						            keys: ['enter', 'shift'],
						            action: function(){

			               	 		$.ajax({
				   			url:'data/add_action_to_messages.php',
				   			type:'POST',
				   			data:{action:action,selected:selected},
				   			success:function(){
				   				fetch_all_messages_and_sent_to_inbox();
				   				
				   			}
				   		});
			            }
			        }
			    }
			});
				  
		});
				   	$(document).on('click','.hide-all',function(){
				   		var count = $('tr input:checkbox:checked').length;
				   		var action = "Hide";
				   		$.confirm({
						    title: 'Confirm!',
						    content: 'Are you sure you want to Hide all this '+count+' Messages?',
						    buttons: {
						        cancel: function () {
						   		
						        },
						        Hide: {
						            text: 'Hide',
						            btnClass: 'btn-red',
						            keys: ['enter', 'shift'],
						            action: function(){
			               	 		$.ajax({
				   			url:'data/add_action_to_messages.php',
				   			type:'POST',
				   			data:{action:action,selected:selected},
				   			success:function(){
				   				fetch_all_messages_and_sent_to_inbox();
				   				
				   			}
				   		});
			            }
			        }
			    }
			});
				  
		});
			}else{
				$("tr input:checkbox:checked").prop('checked',false);
				var remove_Item = selected;
				selected = $.grep(selected, function(value) {
				  return value != remove_Item;
				});
					$(".close").hide();
				   	$(".open").show();
				   	$('tr').not($(".not-tr")).toggleClass('toggleColor');
			}
		});




   $("#search_in").keyup(function() {
       var name = $('#search_in').val();
       var where = $("#user_filter").val();  
       if (name == "") {
           $("#display_search_in").html("");
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
                   $("#display_search_in").html(html).show();
                          $(".user_search_result").click(function(){
				       		var username = $(this).data('username');
				       		$("#search_in").val(username);
				       		$("#display_search_in").html("");
				       });
               }	
           });
       }
});
    $("#new_message_textarea").emojioneArea({
       		inline:false,
       		placeholder:'Enter Your Messages'
       });

   });  

	$(".minimize").click(function(){
			$("#created_new_message_container").height(60);
	});
	$(".maximize").click(function(){
			$("#created_new_message_container").height(400);
	});
	$(".close-new-message").click(function(){
		$("#created_new_message_container").hide();
	});
	$(".open-new-message").click(function(){
		$("#created_new_message_container").show();
	});
	$("#add-new-message-error").click(function(){
		$("#add-new-message-error").hide();
	});

	$(".send").click(function(){
		var from = $("#from").val();
		var to = $("#search_in").val();
		var subject = $("#your_subject").val();
		var message = $("#new_message_textarea").val();
		$.ajax({
			url:'data/send_new_message.php',
			type:'POST',
			data:{from:from,to:to,subject:subject,message:message},
			success:function(data){
				$("#add-new-message-error").show();
				$("#add-new-message-error").html(data);
				$("#created_new_message_container input").not($("#from")).val("");
				$("#new_message_textarea").val("");
				fetch_all_messages_and_sent_to_inbox();
			}
		});
	});

	fetch_all_messages_and_sent_to_inbox();

	function fetch_all_messages_and_sent_to_inbox(){
		$.ajax({
			url:'data/fetch_messages_to_inbox.php',
			type:'POST',
			success:function(data){
				$("#all_inbox_messages").html(data);
			}
		});
	}
	function make_chat_dialog(sender,reciever,message_id){
		var chat_dialog ='<div id="" class="user-chat-dialog'+reciever+'" style="position:fixed;bottom:0px;left:350px;">';
		chat_dialog +='<div id="user-chat-dialog" class="user-chat-dialog-orig'+reciever+'" data-reciever="'+reciever+'">';
		chat_dialog += '<div id="header" class="header'+reciever+'">';
		chat_dialog += '<div id="profile_picture"></div>'+reciever+'<span style="float: right;margin-top:-5px;font-size: 12px;">';
		chat_dialog += '<i class="fa fa-window-minimize minimize'+reciever+'" title="Minimize"></i><i class="fa fa-window-maximize maximize'+reciever+'" title="Maximize"></i><i class="fa fa-times close-new-message'+reciever+'" title="Close"></i></span>';
		chat_dialog += '</div><div id="body"><div id="chat_history_'+reciever+'" class="chat_history"></div></div>';
		chat_dialog += '<div id="footer"><input type="text" placeholder="Enter your Messages" id="" class="new_message_textarea_'+reciever+'" data-sender="'+sender+'" data-reciever="'+reciever+'"></div>';
		chat_dialog += '</div></div>';

		$(".chat-dialog-container").html(chat_dialog);
	}
	$(".ui-dialog-titlebar").hide();
	$(document).on('click','.open-message-user',function(){
				var sender = $(this).data('sender');
				var reciever = $(this).data('reciever');
				var username = $(this).data('username');
				var selected = [];
				$(this).addClass('opening');
				 $(".opening").each(function(){
				 	var all = $(this).data('reciever');
				 	selected.push(all);
				 	  
				 });
			var id = $(this).data('message_id');
			var action = "Read";
	       $.ajax({
            	url:'data/add_action_to_messages.php',
            	type:'POST',
            	data:{action:action,id:id},
            	success:function(){
            		fetch_all_messages_and_sent_to_inbox();
  
            	}
            });
				if(reciever == username){
					reciever = $(this).data('sender');
					sender  = $(this).data('reciever');
				}
				var message_id = $(this).data('message_id');

				if($(".user-chat-dialog"+reciever).length ){
					$(".user-chat-dialog"+reciever).show();
					$(".user-chat-dialog"+reciever).css('bottom','0px');
				}else{
					if($('#user-chat-dialog').is(':visible')){
						var index = $("#user-chat-dialog").length;
						index++;
						if(index == 1){
							make_chat_dialog(sender,reciever,message_id);
					
						}else if($("#user-chat-dialog").hasClass('.user-chat-dialog"+reciever')){
							return false;
						}else{
							make_chat_dialog(sender,reciever,message_id);
							$(".user-chat-dialog"+reciever).css('margin-left','+=260px');
						}
					}else{
						make_chat_dialog(sender,reciever,message_id);
					}
					
				}
				setInterval(function(){
					fetch_user_messages();
				},2000);
			function fetch_user_messages(){
				$.ajax({
					url:'data/fetch_user_messages.php',
					type:'POST',
					data:{reciever:reciever,sender,sender},
					success:function(data){
						$("#chat_history_"+reciever).html(data);
				
					}
				});
			}

				$(document).on('keypress','.new_message_textarea_'+reciever,function(e){
			var code = (e.keyCode ? e.keyCode : e.which);
			var reciever = $(this).data('reciever');
			var message = $(this).val();

			if(code == 13){
				$.ajax({
					url:'data/insert_new_message.php',
					type:'POST',
					data:{message:message,reciever:reciever},
					success:function(){
						$(".new_message_textarea_"+reciever).val("");
						fetch_all_messages_and_sent_to_inbox();
					}
				});
			}
		});
				  	$(".user-chat-dialog"+reciever).dialog({
						   autoOpen:true,
						   bgiframe: false,
						   modal: false,
						   resizable: false,
						   draggable: false,
						   maxWidth:220,
						   outline: false,
						  	dialogClass: "no-close"
						  });
			$(".minimize"+reciever).click(function(){
			$(".user-chat-dialog"+reciever).css('bottom','-310px');
			});
			$(".header"+reciever).click(function(){
				
			});
			$(".maximize"+reciever).click(function(){
				$(".user-chat-dialog"+reciever).css('bottom','0px');
			});
			 
			$(".close-new-message"+reciever).click(function(){
				var remove_Item = reciever;
				selected = $.grep(selected, function(value) {
				  return value != remove_Item;
				});
				$(".user-chat-dialog"+reciever).hide();

				var index = $("#user-chat-dialog").length;
				var num = $(".user-chat-dialog"+reciever).position().left;
				console.log(selected);
	});
			console.log(selected);

});
   $('.container').mousedown(function(event) {
   	var x = event.clientX;
   	var y = event.clientY;

   	if(y > 290){
   		y = y - 300;
   	}
   	if(x > 1186){
   		x = x -200;
   	}
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
            break;
        default:
            
    }
});

$('.container').bind("contextmenu",function(e){
    return false;
});


</script>

<style type="text/css">
	.toggleColor{
		background: #EBEEEE;
	}
.no-close .ui-dialog-titlebar {
  display: none;
}
#mybutton{
	 display: none;
	outline: none;
}
.hides{
  	bottom:-310px;
  	position: fixed;
}
#main_message_container{
	border-radius: 15px;
	padding: 0px;
	padding-left: 10px;
	padding-right: 10px;
	font-size: 14px;
}
</style>
<style type="text/css">
	#created_new_message_container{
		width: 300px;
		height: 400px;
		background: #EBEEEE;
		position: fixed;
		right: 10px;
		bottom: 0;
		border: 1px solid lightgray;
		display: none;
	}
	#created_new_message_container #headers{
		padding: 5px;
		background: white;
		padding-left: 15px;
		cursor: pointer;
	}
	#created_new_message_container #input_container{
		padding: 5px;
	}
	#created_new_message_container #input_container input{
		width: 40%;
		padding:10px 15px;
		height: 10px;
		border: none;
		outline: none;
		font-size: 16px;
		background: none;
		border-bottom: 0.5px solid lightgray;
	}
	#created_new_message_container #input_container select{
		padding: 5px;
		background:none;
		border: none;
		outline: none;
		border-bottom: 0.5px solid lightgray;
	}
	.hide_show{
		height: 60px;
	}
	#display_search_in li{
		list-style-type: none;
		cursor: pointer;
		padding: 5px;
		padding-left: 20px;
	}
	#display_search_in li:hover{
		background: gray;
		color: white;
	}
	#display_search_in{
		position: absolute;
		background: white;
		width: 250px;
		z-index: 999;
		overflow-y: auto;
		overflow-x: hidden;
	}
	#display_search_in p{
		text-align: center;
		font-size: 
	}
	#display_search_in #profile_picture img{
		width: 30px;
		height: 30px;
		border-radius: 50%
	}
	#created_new_message_container #body{
		background: #EBEEEE;
		padding-top: 0px;
		overflow-y: auto;
		overflow-x: hidden;
	}
	#created_new_message_container #footer{
		padding: 20px;	
		margin-top: -50px;
	}
	#created_new_message_container #footer textarea{
		width: 80%;
		padding: 12px 16px;
	}
	#created_new_message_container #footer #send_new_message{
		padding: 10px;
		margin: 5px;
		border: none;
		cursor: pointer;
		float: right;
	}
	#created_new_message_container #footer i{
		cursor: pointer;
	}
</style>
<style type="text/css">

	body{
		font-family: lato, sans-serif;
	}
	@font-face{
		src:url(assets/fonts/Lato-Regular.ttf);
		font-family: lato;
	}
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
.tr_class:hover{
	background: #EBEEEE;
}
#tools{
	width: 250px;
	height: 45px;
	float: right;
	margin: -20px 0px 0px -205px;
	background: #EBEEEE;
	position: absolute;
	display: none;

}
#tools i{
	padding: 10px;
	background: white;
	border-radius: 50%;
	margin:5px 5px;
}
 i:hover{
	color: #337AB7;
}
 i #description{	
	padding: 5px;
	border-radius: 5px;
	background: #4c5054;
	margin-top: 15px;
	position: absolute;
	display: none;
	color: white;
	font-family: lato;
	font-size: 12px;
}
i:hover #description{
	display: block;
}
#items i:hover{
	color: #337AB7;
}
#items i #description{	
	padding: 5px;
	border-radius: 5px;
	background: #4c5054;
	margin-top: 15px;
	position: absolute;
	display: none;
	color: white;
	font-family: lato;
	font-size: 12px;
}
#items i:hover #description{
	display: block;
}
#right_click_container{	
	border-radius: 5px;
	background: #4c5054;
	margin-top:200px;
	margin-left: 50px;
	position: fixed;
	display: none;
	color: white;
	font-family: lato;
	font-size: 12px;
	z-index: 1000;
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
#setting-icons i{
	cursor: pointer;
	font-size: 22px;
	float: left;
}
.close{
	display: none;
}
.open{
	display: block;
}
.checkbox-custom {
  opacity: 0;
  float: left;
}
.checkbox-custom,
.checkbox-custom-label {
  vertical-align: middle;
  cursor: pointer;
  float: left;
  margin-top: 7px;
}
.checkbox-custom + .checkbox-custom-label:before {
  content: '';
  background: #fff;
  border-radius: 5px;
  border: 2px solid #ddd;
  display: inline-block;
  vertical-align: middle;
  width: 15px;
  height: 15px;
  padding: 2px;
  text-align: center;
  margin-right: 20px;
  margin-left: -5px;
}
.checkbox-custom:checked + .checkbox-custom-label:before {
  content: "";
  display: inline-block;
  width: 2px;
  height: 8px;
  border: solid #000000;
  border-width: 0 3px 3px 0;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  border-radius: 0px;
  margin: 0px 15px 5px 5px;
}
</style>
</style>
</html>