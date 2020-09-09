<?php 
session_start();
$connect = new PDO("mysql:host=localhost;dbname=mlm","root","");
date_default_timezone_set('Asia/Manila');

function send_new_message($sender,$reciever,$subject,$message,$connect){
	$dates = date("l , g:i A");
	$status = "Unread";
	$query = "SELECT * FROM new_messages WHERE sender='$sender' AND reciever='$reciever' OR sender='$reciever' AND reciever ='$sender' ";
		$stmt = $connect->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchall();
		$count = $stmt->rowCount();
		if($count == 0){
			$query = "INSERT INTO new_messages(sender,reciever,message,status,dates)VALUES('$sender','$reciever','$message','$status','$dates')";
			$stmt = $connect->prepare($query);
			$stmt->execute();
		}
		foreach($result as $row){
		$query = "UPDATE new_messages SET sender='$sender',reciever='$reciever',message='$message',status='$status' WHERE sender='$sender' AND reciever='$reciever' OR sender='$reciever' AND reciever ='$sender' ";
			$stmt= $connect->prepare($query);
			$stmt->execute();
	}

}
function send_message($sender,$reciever,$subject,$message,$connect){
	$date = date("l g:i A");
	$status = "Unread";
	$errors = array();

	if(empty($reciever)){
		array_push($errors, "Failed to Send, No Reciepient");
	}
	if(empty($message)){
		array_push($errors, "Failed to Send No Messages");
	}
	errors($errors);
	if(count($errors) == ""){
	$query = "INSERT INTO messages(sender,reciever,message,status,dates)VALUES('$sender','$reciever','$message','$status','$dates')";
	$stmt = $connect->prepare($query);
	$stmt->execute();
		send_new_message($sender,$reciever,$subject,$message,$connect);
	}
}

function count_unread_messages($sender,$reciever,$connect){
	$query = "SELECT action FROM messages WHERE sender='$reciever' AND reciever='$sender' AND action='Unread' ";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
	if($count != 0){
		return "<span style='padding:5px;background:red;float:right;margin-right:10px;color:white;'>".$count."</span>";
	}

}
function count_messages($sender,$reciever,$action,$connect){
	$query = "SELECT action FROM messages WHERE sender='$reciever' AND reciever='$sender' AND action='$action' ";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
	if($count != 0){
		return "<span style='padding:5px;background:red;float:right;margin-right:10px;color:white;'>".$count."</span>";
	}

}
function fetch_user_message($sender,$reciever,$connect){
	$query = "SELECT * FROM messages WHERE sender='$sender' AND reciever='$reciever' OR sender='$reciever' AND reciever ='$sender' ORDER BY dates ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchall();
	$count = $statement->rowCount();
	$output ='';
	foreach($result as $row){
		if($sender == $row['sender'] && $reciever == $row['reciever']){
	
		$output .='
			<br>
			<div id="message_container" style="width:100%;padding:5px;margin:15px;">
				<div id="main_message_container" style="float:right;margin-right:10px;background:#0099FF;font-size:14px;color:white;">
				<p>'.$row['message'].'</p>
				</div>
			</div>
		';	

		}else if($sender == $row['reciever'] && $reciever == $row['sender']){
		
							$output .='
			<br>
			<div id="message_container">
				<div id="main_message_container" style="float:left;background:#FFFFFF;color:black;">
				<p>'.$row['message'].'</p>
				</div>
			</div>
		';
		}
	}
	echo $output;
}

function fetch_messages_to_inbox($username,$connect){
	$query = "SELECT * FROM user WHERE username ='$username' ";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchall();
	foreach($result as $row){
		$filter =  $row['select_message'];
	}
	$query = "SELECT * FROM new_messages WHERE sender='$username' AND action='".$filter."' OR reciever='$username' AND action='".$filter."' ORDER BY timestamp DESC";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchall();
	$count = $stmt->rowCount();
	$header='
	<table>
  <tr class="not-tr" style="border-bottom:0.5px solid lightgray;">
  	<th></th>
    <th>Message</th>
    <th>From</th>
    <th>To</th>
    <th>Date</th>
  </tr>
	';
	echo $header;
		if($count == 0){
			$output = "<center><p style='color:red;'>No Messages</p></center>";
			echo $output;
		}
	foreach($result as $row){
		if($row['action'] != "Delete"){
			if($row['action'] == "Read"){
				$background = '#D3DCE3';
				$visibility = 'visible';
			}else if($row['action'] == "Hide"){
				if($filter == "Hide"){
					$visibility = "visible";
					$background = '';
				}else{
					$visibility = "hidden";
					$background = '';
				}
			}else{
				$background = '';
				$visibility = 'visible';
			}
				$output ='
			

	<tr class="tr_class" data-code="'.$row['sender'].$row['message_id'].'" data-value="'.$row['message_id'].'" style="background:'.$background.';visibility:'.$visibility.'">
	<td><center><input type="checkbox" class="checkbox" id="checkbox_'.$row['sender'].$row['message_id'].'" value="'.$row['message_id'].'" /></center></td>
	<td>'.$row['message']."".count_unread_messages($row['sender'],$row['reciever'],$connect).'</td>
    <td>'.identify_user($row['sender']).'</td>
    <td>'.identify_user($row['reciever']).'</td>
    <td>'.$row['dates'].'</td>
    <td><div id="tools" class="tools_'.$row['sender'].'">
    <i class="fa fa-user open-message-user" data-message_id="'.$row['message_id'].'" data-sender="'.$row['sender'].'" data-reciever="'.$row['reciever'].'" data-username="'.$_SESSION['username'].'">
    <div id="description">Open</div>
    </i>
    <i class="fa fa-archive archive" data-message_id="'.$row['message_id'].'" id="archive'.$row['sender'].$row['message_id'].'" data-value="'.$row['message_id'].'">
    <div id="description">Archive</div>
    </i>
    <i class="fa fa-trash-o delete"   data-message_id="'.$row['message_id'].'" id="delete'.$row['sender'].$row['message_id'].'" data-value="'.$row['message_id'].'">
    <div id="description">Delete</div>
    </i>
';
if($row['action'] == "Read"){
	$output .='
	    <i class="fa fa-envelope-open-text mark-as-unread"  data-message_id="'.$row['message_id'].'" id="mark-as-read'.$row['sender'].$row['message_id'].'" data-value="'.$row['message_id'].'">
    <div id="description">Mark as Unread</div>
    </i>
	';
}else{
	$output .='
	    <i class="fa fa-envelope-open-text mark-as-read"  data-message_id="'.$row['message_id'].'" id="mark-as-read'.$row['sender'].$row['message_id'].'" data-value="'.$row['message_id'].'">
    <div id="description">Mark as read</div>
    </i>
	
	';
}
if($row['action'] == "Hide"){
	$output .='
	 <i class="fas fa-eye unhide"  data-message_id="'.$row['message_id'].'" id="hide'.$row['sender'].$row['message_id'].'" data-value="'.$row['message_id'].'">
    <div id="description">Unhide</div>
    </i>
	';
}else{
	$output .='
	    <i class="fas fa-eye-slash hide"  data-message_id="'.$row['message_id'].'" id="hide'.$row['sender'].$row['message_id'].'" data-value="'.$row['message_id'].'">
    <div id="description">Hide</div>
    </i>
	';
}
$output .='
    </div></td>
    </tr>
		';
	if(!$row['sender']){
	$output = "<center><p>No Messages</p></center>";
	}
	echo $output;
		}
	}
}
function identify_user($username){
	if($username == $_SESSION['username']){
		return "You";
	}else{
		return $username;
	}
}

function get_profile_picture($username,$connect){
	$query = "SELECT profile_picture FROM user WHERE username ='$username' AND profile_picture != '' ";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchall();
	$count = $stmt->rowCount();
	if($count == 0){
		return get_temporary_profile_picture($username,$connect);
	}else{
				foreach($result as $row){
			return "data:image;base64,".$row['profile_picture'];
		}
	}

}
function insert_member_position($username,$position,$connect){
	$query = "SELECT * FROM user WHERE username ='$username' AND position = '$position' ";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchall();
	$count = $stmt->rowCount();
	$errors = array();
	if($count == 0){
		$query = "UPDATE user SET position ='$position' WHERE username='$username' ";
		$stmt = $connect->prepare($query);
		$stmt->execute();
	}else{
		array_push($errors, "Sorry this position is already taken");
		errors($errors);
	}

}
function remove_member_position($username,$position,$connect){
	$query = "SELECT * FROM user WHERE username ='$username' AND position = '$position' ";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchall();
	$count = $stmt->rowCount();
	$errors = array();
	if($count != 0){
		$query = "UPDATE user SET position ='' WHERE username='$username' ";
		$stmt = $connect->prepare($query);
		$stmt->execute();
	}else{
	}

}
function fetch_member_position_and_send($username,$position,$connect){
	$query = "SELECT * FROM user WHERE join_by ='$username' AND position = '$position' ";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchall();
	$count = $stmt->rowCount();
	if($count == 0){
		if($position != "Admin"){
			$data = "empty";
			echo $data;
		}
	}
	foreach($result as $row){
		if($row['position']){
			$output ='
			<div id="user">
			<i class="fa fa-user" style="font-size:24px;margin-top:-20px;margin-left:-10px;position:absolute;color:#51AED9;"></i><br>
			<center style="margin-top:-10px;"><small >'.$row['username'].'</small></center>
			</div>
			';
			echo $output;
		}
	}
	if($position == "Admin"){
		$query = "SELECT * FROM user WHERE username ='$username' AND position = '$position' ";
		$stmt = $connect->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchall();
		foreach($result as $row){
			$output ='
			<div id="user">
			<i class="fa fa-user" style="font-size:24px;margin-top:-20px;margin-left:-10px;position:absolute;color:#51AED9;"></i><br>
			<center style="margin-top:-10px;"><small >'.$row['username'].'</small></center>
			</div>
			';
			echo $output;
		}
	}
}
function fetch_members_no_position($username,$number,$connect){
	$query = "SELECT * FROM user WHERE join_by ='$username'";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchall();
	$header ='
		<center>
			<span style="width:10px;height:10px;background:#10E5B1;padding:5px;margin:10px;"><p>Not assign</p></span>
			<span style="width:10px;height:10px;background:#F8665A;padding:5px;margin:10px;"><p>Has Position</p></span>
		</center>
		<br>
	';
	echo $header;
	foreach($result as $row){
		if(!$row['position']){
			$status = 'Not assign';
			echo "<div id='users' class='user add_position".$number."' data-username='".$row['username']."' style='background:#10E5B1;text-align:center;'><i class='fa fa-user' style='color:#FFFFFF;font-size:24px;'></i>
			<div id='description'>Add ".$row['username']." to this Position</div>
			</div> ";
		}else{
			$status = $row['position'];
			echo "<div id='users' class='user remove_position".$number."' data-username='".$row['username']."' style='background:#F8665A;text-align:center;'><i class='fa fa-user' style='color:#FFFFFF;font-size:24px;'></i>
			<div id='description'>Remove ".$row['username']." to ".$status."</div>
			</div> ";
		}
	}
}

function load_member_information($username,$position,$connect){
	$query = "SELECT * FROM user WHERE join_by ='$username'  AND position='$position' ";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchall();
	$output ='';
	foreach($result as $row){
		$user = $row['username'];
	$output .='
	<div id="container" style="z-index:999;">
	<div id="profile_picture">
		<img src="'.get_profile_picture($row['username'],$connect).'">
	</div>
	<h2 style="color:white;">'.$row['username'].'</h2>
	</div>
	';
	}
	if($position == "Admin"){
			$query = "SELECT * FROM user WHERE username ='$username'  AND position='$position' ";
			$stmt = $connect->prepare($query);
			$stmt->execute();
			$result = $stmt->fetchall();
			$output ='';
			foreach($result as $row){
				$user = $row['username'];
			$output .='
			<div id="container" style="z-index:999;">
			<div id="profile_picture">
				<img src="'.get_profile_picture($row['username'],$connect).'">
			</div>
			<h2 style="color:white;">'.$row['username'].'</h2>
			</div>
			';
		}
	}
	echo $output;
}
function add_action_messages($action,$id,$connect){
	$query = "UPDATE new_messages SET action='".$action."' WHERE message_id='".$id."' ";
	$stmt = $connect->prepare($query);
	$stmt->execute();
}
function select_messages($select,$username,$connect){
	$query = "UPDATE user SET select_message ='$select' WHERE username='$username' ";
	$stmt = $connect->prepare($query);
	$stmt->execute();
}
function select_message_filter($username,$connect){
	$query = "SELECT * FROM user WHERE username ='$username' ";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchall();
	foreach($result as $row){
		echo $row['select_message'];
	}
}
function check_if_user_exist($username,$connect){
	$query = "SELECT * FROM user WHERE username ='$username' ";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchall();
	foreach($result as $row){
		if($row['username']){
			array_push($errors, "Username is Already Exist");
		}
	}
}

function errors($errors){
	if(count($errors) != ""){
		foreach($errors as $error){
			echo "<p style='color:#3776FF;display:block;'>".$error."</p>";
		}
	}
}
function add_to_login_activity($username,$connect){
	$date = date('Y-m-d H:i:s');
	$query = "INSERT INTO login_activity(username,date)VALUES('$username','$date')";
	$stmt = $connect->prepare($query);
	$stmt->execute();
}
function user_last_activity($username,$connect){
	$query = "SELECT * FROM login_activity WHERE username='$username'";
	$stmt= $connect->prepare($query);
	$stmt->execute();
	$result  = $stmt->fetchall();
	foreach($result as $row){
		return time_ago($row['timestamp']);
	}
}
function get_date(){
	date_default_timezone_set('Asia/Manila');
	$date = date("Y, F d l g:i A");
	echo $date;
}
function insert_to_notes($username,$title,$note_content,$state,$connect){
	$date_inserted = date('Y-m-d H:i:s');
	$date = date("l g:i A");
	$query = "INSERT INTO notes(username,title,note_content,state,date_inserted,dates)VALUES('$username','$title','$note_content','$state','$date_inserted','$date')";
	$stmt = $connect->prepare($query);
	$stmt->execute();
}
function fetch_notes($connect){
	$query = "SELECT * FROM notes ORDER BY date_inserted";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchall();
	foreach($result as $row){
		if($row['state'] == "Primary"){
			$background = "#337AB7";
		}else if($row['state'] == "Success"){
			$background = "#5CB85C";
		}else if($row['state'] == "Information"){
			$background = "#5BC0DE";
		}else if($row['state'] == "Warning"){
			$background = "#F0AD4E";
		}else if($row['state'] == "Danger"){
			$background = "#D9534F";
		}else if($row['state'] == "Important"){
			$background = "#E43B3B";
		}
		$output = '
		<div class="note-cards" style="background:'.$background.';"><h2>'.$row["title"].'</h2><h3>'.$row["username"].'</h3><h5>'.substr($row["note_content"], 0,20).'</h5></div>
		';
		echo $output;
	}
}
function add_member($username,$email,$mobile,$password,$confirm_password,$gender,$connect){
	$errors = array();
	if(empty($username)){
		array_push($errors, "Please Enter a Username");
	}
	if(empty($email)){
		array_push($errors, "Please Enter a Email");
	}
	if(empty($password)){
		array_push($errors, "Please Enter a Password");
	}
	if($confirm_password != $password){
		array_push($errors, "Password did'nt Match");
	}
	check_if_user_exist($username,$connect);
	$reference_id = "BT".rand();
	$status = "Offline";
	$join_by = $_SESSION['username'];
	$type = "Member";
	$date_started = date("Y-m-d H:i:s");
	if(count($errors) == ""){
		$password = md5($password);
		$query = "INSERT INTO user(reference_id,username,email,mobile,password,join_by,type,date_started,status)VALUES('$reference_id','$username','$email','$mobile','$password','$join_by','$type','$date_started','$status')";
		$stmt = $connect->prepare($query);
		$stmt->execute();
	}else{
		errors($errors);
	}

}
function display_all_member($username,$connect){
	$query = "SELECT * FROM user WHERE join_by='$username' AND type='Member' ";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchall();
	foreach($result as $row){
		if($row['username']){
					$output ='
	<tr data-select="'.$row['reference_id'].'">
	<td><center><input type="checkbox" id="checkbox_'.$row['reference_id'].'"/></center></td>
	<td>'.$row['id'].'</td>
    <td>'.$row['reference_id'].'</td>
    <td>'.$row['username'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['mobile'].'</td>
    <td>'.$row['date_started'].'</td>
    <td>'.user_last_activity($row['reference_id'],$connect).'</td>
    <td>'.$row['status'].'</td>
    <td><div id="tools" class="tools_'.$row['reference_id'].'">
    <i class="fa fa-user"></i>
    <i class="fa fa-archive"></i>
    <i class="fa fa-trash-o"></i>
    <i class="fas fa-lock"></i>
    <i class="fas fa-lock-open" style="display:none;"></i>
    <i class="fas fa-eye-slash"></i>

    </div></td>
    </tr>
		';
		echo $output;
		}
	}
}

function get_temporary_profile_picture($username,$connect){
   $query = "SELECT * FROM user WHERE username='$username' AND profile_picture ='' ";
   $stmt = $connect->prepare($query);
   $stmt->execute();
   $count = $stmt->rowCount();
   if($count == 1){
   		$first_letter = substr($username, 0, 1);
		return 'images/temporary_pictures/'.$first_letter.'.png';
   }
	
}
function search_in_database($username,$filter,$connect){
   $username = $_POST['search'];

   $sub_query = "SELECT * FROM user WHERE username LIKE '%$username%' AND type='$filter' LIMIT 5";
   $stmt = $connect->prepare($sub_query);
   $stmt->execute();
   $fetch= $stmt->fetchall();
   $count = $stmt->rowCount();
   foreach($fetch as $row){
  		$output ='
  			<li class="user_search_result" data-username="'.$row['username'].'">
  			<p class="user_search_result" data-username="'.$row['username'].'">'.$row['username'].'</p>
  			<span style="float:right;color:black;margin:5px;">
  			<i class="fa fa-user" style="color:black;"></i>
  			</span>
  			</li>
  		';
  		echo $output;
   }
   if($count == 0){
   	 echo "<li><p>No User Result</p></li>";
   }
}
 function time_ago($timestamp)  
 {  
      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours= round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days =round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks= round($seconds / 604800);          // 7*24*60*60;  
      $months= round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60)  
      {  
     return "Just Now";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "1min";  
     }  
     else  
           {  
       return "$minutes min";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       return "1hr";  
     }  
           else  
           {  
       return "$hours hrs";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "Yesterday";  
     }  
           else  
           {  
       return "$days days";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "1 week";  
     }  
           else  
           {  
       return "$weeks weeks";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "1 month";  
     }  
           else  
           {  
       return "$months months";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       return "1 year";  
     }  
           else  
           {  
       return "$years years";  
     }  
   }  
 }  


function get_random_colors(){
$colors = array("#63b598", "#ce7d78", "#ea9e70", "#a48a9e", "#c6e1e8", "#648177" ,"#0d5ac1" ,
"#f205e6" ,"#1c0365" ,"#14a9ad" ,"#4ca2f9" ,"#a4e43f" ,"#d298e2" ,"#6119d0",
"#d2737d" ,"#c0a43c" ,"#f2510e" ,"#651be6" ,"#79806e" ,"#61da5e" ,"#cd2f00" ,
"#9348af" ,"#01ac53" ,"#c5a4fb" ,"#996635","#b11573" ,"#4bb473" ,"#75d89e" ,
"#2f3f94" ,"#2f7b99" ,"#da967d" ,"#34891f" ,"#b0d87b" ,"#ca4751" ,"#7e50a8" ,
"#c4d647" ,"#e0eeb8" ,"#11dec1" ,"#289812" ,"#566ca0" ,"#ffdbe1" ,"#2f1179" ,
"#935b6d" ,"#916988" ,"#513d98" ,"#aead3a", "#9e6d71", "#4b5bdc", "#0cd36d",
"#250662", "#cb5bea", "#228916", "#ac3e1b", "#df514a", "#539397", "#880977",
"#f697c1", "#ba96ce", "#679c9d", "#c6c42c", "#5d2c52", "#48b41b", "#e1cf3b",
"#5be4f0", "#57c4d8", "#a4d17a", "#225b8", "#be608b", "#96b00c", "#088baf",
"#f158bf", "#e145ba", "#ee91e3", "#05d371", "#5426e0", "#4834d0", "#802234",
"#6749e8", "#0971f0", "#8fb413", "#b2b4f0", "#c3c89d", "#c9a941", "#41d158",
"#fb21a3", "#51aed9", "#5bb32d", "#807fb", "#21538e", "#89d534", "#d36647",
"#7fb411", "#0023b8", "#3b8c2a", "#986b53", "#f50422", "#983f7a", "#ea24a3",
"#79352c", "#521250", "#c79ed2", "#d6dd92", "#e33e52", "#b2be57", "#fa06ec",
"#1bb699", "#6b2e5f", "#64820f", "#1c271", "#21538e", "#89d534", "#d36647",
"#7fb411", "#0023b8", "#3b8c2a", "#986b53", "#f50422", "#983f7a", "#ea24a3",
"#79352c", "#521250", "#c79ed2", "#d6dd92", "#e33e52", "#b2be57", "#fa06ec",
"#1bb699", "#6b2e5f", "#64820f", "#1c271", "#9cb64a", "#996c48", "#9ab9b7",
"#06e052", "#e3a481", "#0eb621", "#fc458e", "#b2db15", "#aa226d", "#792ed8",
"#73872a", "#520d3a", "#cefcb8", "#a5b3d9", "#7d1d85", "#c4fd57", "#f1ae16",
"#8fe22a", "#ef6e3c", "#243eeb", "#1dc18", "#dd93fd", "#3f8473", "#e7dbce",
"#421f79", "#7a3d93", "#635f6d", "#93f2d7", "#9b5c2a", "#15b9ee", "#0f5997",
"#409188", "#911e20", "#1350ce", "#10e5b1", "#fff4d7", "#cb2582", "#ce00be",
"#32d5d6", "#17232", "#608572", "#c79bc2", "#00f87c", "#77772a", "#6995ba",
"#fc6b57", "#f07815", "#8fd883", "#060e27", "#96e591", "#21d52e", "#d00043",
"#b47162", "#1ec227", "#4f0f6f", "#1d1d58", "#947002", "#bde052", "#e08c56",
"#28fcfd", "#bb09b", "#36486a", "#d02e29", "#1ae6db", "#3e464c", "#a84a8f",
"#911e7e", "#3f16d9", "#0f525f", "#ac7c0a", "#b4c086", "#c9d730", "#30cc49",
"#3d6751", "#fb4c03", "#640fc1", "#62c03e", "#d3493a", "#88aa0b", "#406df9",
"#615af0", "#4be47", "#2a3434", "#4a543f", "#79bca0", "#a8b8d4", "#00efd4",
"#7ad236", "#7260d8", "#1deaa7", "#06f43a", "#823c59", "#e3d94c", "#dc1c06",
"#f53b2a", "#b46238", "#2dfff6", "#a82b89", "#1a8011", "#436a9f", "#1a806a",
"#4cf09d", "#c188a2", "#67eb4b", "#b308d3", "#fc7e41", "#af3101", "#ff065",
"#71b1f4", "#a2f8a5", "#e23dd0", "#d3486d", "#00f7f9", "#474893", "#3cec35",
"#1c65cb", "#5d1d0c", "#2d7d2a", "#ff3420", "#5cdd87", "#a259a4", "#e4ac44",
"#1bede6", "#8798a4", "#d7790f", "#b2c24f", "#de73c2", "#d70a9c", "#25b67",
"#88e9b8", "#c2b0e2", "#86e98f", "#ae90e2", "#1a806b", "#436a9e", "#0ec0ff",
"#f812b3", "#b17fc9", "#8d6c2f", "#d3277a", "#2ca1ae", "#9685eb", "#8a96c6",
"#dba2e6", "#76fc1b", "#608fa4", "#20f6ba", "#07d7f6", "#dce77a", "#77ecca");

echo $colors[rand(0,240)];
}
?>



