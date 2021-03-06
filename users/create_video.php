/****************************************************************************************/
/*
/* FILE NAME: create_video.php
/*
/* DESCRIPTION: Code for handling style of video submission page.
/*
/*   DATE      	  BY       	 	 DESCRIPTION
/* ========   	======   		=============
/* 4/26/2017 Amber Johnson  	Created file before header initializations
/*
/****************************************************************************************/
<?php
include("../includes/check_login_status.php");
// If user is already logged in, the user can add a video from their computer files and upload the video to the FitnessZone.
if($user_ok != true){
	header("location: ../index.php");
    exit();
    }
?>
<?php
$sql = "SELECT * FROM exercises WHERE username = '$log_username' ORDER BY date DESC LIMIT 1";
$user_query = mysqli_query($db_connect, $sql);

while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
	$id = $row["id"];
}

?>
<?php include('meta.php'); ?>
<body class="w3-theme-l5">
<title>Add a Video</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<style type="text/css">

</style>
<script>
function Uploading(){
_("status").innerHTML = 'please wait ...';
		
}
</script>
</head>
<body>
<?php include("nav.php"); ?>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">
<div class="w3-container" style="margin-top:80px" id="showcase">
<div id="pageMiddle">
 <form enctype="multipart/form-data" method="post" action ="../parsers/video_system.php">
 <h2>Now upload a video of the exercise!</h2>
    <div>Video: </div>
    <input name="video" type="file">
    <br /><br />
    <input type="submit" value="Upload" onClick="Uploading()">
    <span id="status"></span>
  </form> 
  <hr>
  <form>
  <h2>Use a Youtube video instead?</h2>
  	<div>Video URL:</div>
  	 <input id="video" type="text">
    	<br /><br />
    	<input type="submit" value="Finish">
    	<span id="status"></span>
  </form>
</div>
</div>
</div>
<?php include_once("../footer.php"); ?>
</body>
</html>
