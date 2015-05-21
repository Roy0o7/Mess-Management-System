<?php 
		session_start();
		if(isset($_SESSION['usertype'])&& $_SESSION['usertype']=="student")
			{
			$rollno = $_SESSION['userid'];
			}
			else
			{header('Location: ../index.php');}
		if(isset($_REQUEST['utype']))
		{
			include("../connect.php");
			$sql_connect=mysql_connect($host,$user,$pass) or die("cannot connect to database.please try after sometime");
			mysql_select_db($db,$sql_connect) or die("cannot find database");
			$ut=$_REQUEST['utype'];
			switch($ut)
			{
			case "student":
				$rollno=$_REQUEST['rollno'];
				$select_user_query="SELECT * FROM `student` WHERE `rollno`='$rollno'";
				$select_user=mysql_query($select_user_query);
				$user=mysql_fetch_array($select_user);
				$correctpass=$rollno;
				$change=mysql_query("UPDATE `mms`.`student` SET `password` = '$correctpass' WHERE `student`.`rollno` = '$rollno'");
				header('Location: resetstudentpass.php?success=1&roll='.$rollno);
				break;
			case "admin":
				$empcode=$_REQUEST['empcode'];
				$select_user_query="SELECT * FROM `admin` WHERE `empcode`='$empcode'";
				$select_user=mysql_query($select_user_query);
				$user=mysql_fetch_array($select_user);
				$correctpass=$empcode;
				$change=mysql_query("UPDATE `mms`.`admin` SET `password` = '$correctpass' WHERE `admin`.`empcode` = '$empcode'");
				header('Location: resetadminpass.php?success=1&empcode='.$empcode);
					break;
			case "mess":
				$messid=$_REQUEST['messid'];
				$select_user_query="SELECT * FROM `mess` WHERE `messid`='$messid'";
				$select_user=mysql_query($select_user_query);
				$user=mysql_fetch_array($select_user);
				$correctpass=$messid;
				$change=mysql_query("UPDATE `mms`.`mess` SET `password` = '$correctpass' WHERE `mess`.`messid` = '$messid'");
				header('Location: resetmesspass.php?success=1&messid='.$messid);
					break;
			}
		}
?>