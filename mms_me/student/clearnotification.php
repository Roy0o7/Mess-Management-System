<?php
session_start();
		if(isset($_SESSION['usertype'])&& $_SESSION['usertype']=="student")
			{
			$rollno = $_SESSION['userid'];
		if(isset($_REQUEST['cmid']))
			$cmid = $_REQUEST['cmid'];
			}
			else
			{header('Location: ../index.php');}
		if(isset($_REQUEST['notid']))
		{
			$connection = mysql_connect("localhost","root","");
							mysql_select_db("mms",$connection) or die("could not connect to database");
			$p=$_SERVER['HTTP_REFERER'];
			//echo $p;
			$n=$_REQUEST['notid'];
			$q="UPDATE `mms`.`notification` SET `seenbyreceiver` = 1 WHERE `notification`.`notid` ={$n}";
			$qq=mysql_query($q);
			
			header("Location: {$p}?success=1");
			
		}
?>