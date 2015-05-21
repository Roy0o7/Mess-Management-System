<?php session_start();
		if(isset($_SESSION['usertype'])&& $_SESSION['usertype']=="admin")
		{
			$empcode = $_SESSION['userid'];
		}
		else
		{
			header('Location: ../index.php');
		}
		if(isset($_REQUEST['messid']))
		{
			include("../connect.php");
			$sql_connect=mysql_connect($host,$user,$pass) or die("cannot connect to database.please try after sometime");
			mysql_select_db($db,$sql_connect) or die("cannot find database");
			$add_mess_query="DELETE FROM `mms`.`mess` WHERE `mess`.`messid` = '{$_REQUEST['messid']}'";
			$add_mess=mysql_query($add_mess_query);
			header('Location: showmesslist.php');
		}
?>