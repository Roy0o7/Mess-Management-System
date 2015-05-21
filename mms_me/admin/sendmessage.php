<?php
session_start();
		if(isset($_SESSION['usertype'])&& $_SESSION['usertype']=="admin")
			{
			$rollno = $_SESSION['userid'];
		if(isset($_REQUEST['cmid']))
			$cmid = $_REQUEST['cmid'];
			}
			else
			{header('Location: ../index.php');}
		if(isset($_REQUEST['send_submit']))
		{
			$connection = mysql_connect("localhost","root","");
							mysql_select_db("mms",$connection) or die("could not connect to database");
			$p=$_SERVER['HTTP_REFERER'];
			//echo $p;
			$s=$_REQUEST['sender'];
			$r=$_REQUEST['receiver'];
			$m=$_REQUEST['message'];
			$q="INSERT INTO `mms`.`notification` (`notid`, `sender`, `receiver`, `seenbyreceiver`, `content`) VALUES ('', '$s', '$r', '0', '$m');";
			$qq=mysql_query($q);
			header("Location: {$p}?success=1");
		}
?>