<?php session_start();
		if(isset($_SESSION['usertype'])&& $_SESSION['usertype']=="mess")
			{
			$messid = $_SESSION['userid'];
			}
			else
			{header('Location: ../index.php');}
		
?>

<?php 
		$connection = mysql_connect("localhost","root","");
		mysql_select_db("mms") or die("database connection failed");
		
		$query1 =  "UPDATE `mms`.`monday` SET `breakfast` = '{$_REQUEST['mbreakfast']}',
					`lunch` = '{$_REQUEST['mlunch']}',
					`snacks` = '{$_REQUEST['msnacks']}',
					`dinner` = '{$_REQUEST['mdinner']}',
					`cost` = '{$_REQUEST['mcost']}' WHERE `monday`.`messid` = '{$messid}'";
		$query2 =  "UPDATE `mms`.`tuesday` SET `breakfast` = '{$_REQUEST['tubreakfast']}',
					`lunch` = '{$_REQUEST['tulunch']}',
					`snacks` = '{$_REQUEST['tusnacks']}',
					`dinner` = '{$_REQUEST['tudinner']}',
					`cost` = '{$_REQUEST['tucost']}' WHERE `tuesday`.`messid` = '{$messid}'";
		$query3 =  "UPDATE `mms`.`wednesday` SET `breakfast` = '{$_REQUEST['wbreakfast']}',
					`lunch` = '{$_REQUEST['wlunch']}',
					`snacks` = '{$_REQUEST['wsnacks']}',
					`dinner` = '{$_REQUEST['wdinner']}',
					`cost` = '{$_REQUEST['wcost']}' WHERE `wednesday`.`messid` = '{$messid}'";
		$query4 =  "UPDATE `mms`.`thursday` SET `breakfast` = '{$_REQUEST['thbreakfast']}',
					`lunch` = '{$_REQUEST['thlunch']}',
					`snacks` = '{$_REQUEST['thsnacks']}',
					`dinner` = '{$_REQUEST['thdinner']}',
					`cost` = '{$_REQUEST['thcost']}' WHERE `thursday`.`messid` = '{$messid}'";
		$query5 =  "UPDATE `mms`.`friday` SET `breakfast` = '{$_REQUEST['fbreakfast']}',
					`lunch` = '{$_REQUEST['flunch']}',
					`snacks` = '{$_REQUEST['fsnacks']}',
					`dinner` = '{$_REQUEST['fdinner']}',
					`cost` = '{$_REQUEST['fcost']}' WHERE `friday`.`messid` = '{$messid}'";
		$query6 =  "UPDATE `mms`.`saturday` SET `breakfast` = '{$_REQUEST['sabreakfast']}',
					`lunch` = '{$_REQUEST['salunch']}',
					`snacks` = '{$_REQUEST['sasnacks']}',
					`dinner` = '{$_REQUEST['sadinner']}',
					`cost` = '{$_REQUEST['sacost']}' WHERE `saturday`.`messid` = '{$messid}'";
		$query7 =  "UPDATE `mms`.`sunday` SET `breakfast` = '{$_REQUEST['subreakfast']}',
					`lunch` = '{$_REQUEST['sulunch']}',
					`snacks` = '{$_REQUEST['susnacks']}',
					`dinner` = '{$_REQUEST['sudinner']}',
					`cost` = '{$_REQUEST['sucost']}' WHERE `sunday`.`messid` = '{$messid}'";
					
		mysql_query($query1);
		mysql_query($query2);
		mysql_query($query3);
		mysql_query($query4);
		mysql_query($query5);
		mysql_query($query6);
		mysql_query($query7);
		$q="select * from monday where messid=\"JO0001\"";
		
		?>
		
		<img src="../images/upd2.jpg"/><img src="../images/upd1.jpg"/>
		<br /><br /><br /><br /><br /><br /><CENTER><h1>UPDATED SUCESSFULLY</H1></CENTER><br /><br />
		<a href="index.php?messid=<?php echo $messid ?>"><CENTER><h3>GO BACK</H3></CENTER></a>