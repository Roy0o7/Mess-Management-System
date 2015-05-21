<?php session_start();
		if(isset($_SESSION['usertype'])&& $_SESSION['usertype']=="admin")
		{
			$empcode = $_SESSION['userid'];
		}
		else
		{
			header('Location: ../index.php');
		}
		if(isset($_REQUEST['editstudent_submit']))
		{
			$roll = $_REQUEST['rollno'];
			$newname=$_POST['name'];
			$newphno=$_POST['phno'];
			$newemail=$_POST['email'];
			$newhall=$_POST['hall'];
			$newroom=$_POST['room'];
			$newdept=$_POST['dept'];
			
	//$u=toupper($u);
	// add a toupper function here
			include("../connect.php");
			$sql_connect=mysql_connect($host,$user,$pass) or die("cannot connect to database.please try after sometime");
			mysql_select_db($db,$sql_connect) or die("cannot find database");
			$add_student_query= "UPDATE `mms`.`student` SET `name` = '$newname',`hallno`='$newhall',`roomno`='$newroom',`dept`='$newdept',`phoneno` = '$newphno', `mailid` = '$newemail' WHERE `student`.`rollno` ='$roll'";
			$add_student=mysql_query($add_student_query);
			header('Location: showstudentlist.php?success=1');
			//$user=mysql_fetch_array($select_user);
		}
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
 <head profile="http://gmpg.org/xfn/11">
    <title>Mess Management Systen | NIT Rourkela</title>

    
    <link rel="alternate" type="application/atom+xml" title="Atom Feed" href="http://yoursite.com/atom" />
    <link rel="pingback" href="http://yoursite.com" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

    <style type="text/css" media="all">
      @import "../style.css";
    </style>
    <!--[if lte IE 6]>
    <script type="text/javascript">
    /* <![CDATA[ */
       blankimgpath = 'images/blank.gif';
     /* ]]> */
    </script>

    <style type="./text/css" media="screen">
      @import "../ie6.css";
      body{ behavior:url("ie6hoverfix.htc"); }
      img{ behavior: url("ie6pngfix.htc"); }
    </style>
    <![endif]-->

    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/fusion.js" type="text/javascript"></script>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
 </head>
 <body class="home">
  <!-- page wrappers (100% width) -->
  <div id="page-wrap1">
    <div id="page-wrap2">
      <!-- page (actual site content, custom width) -->
      <div id="page" class="with-sidebar">

       <!-- main wrapper (side & main) -->
       <div id="main-wrap">
        <!-- mid column wrap -->
    	<div id="mid-wrap">
         <!-- sidebar wrap -->
         <div id="side-wrap">
          <!-- mid column -->
    	  <div id="mid">
            <!-- header -->
            <div id="header">

              <div id="topnav"><p><a href="logout.php">Log Out</a></p></div>
              <a id="logo" href="#"><img src="../images/logo.png" alt="Mess Management System" /></a><br /><br /><br /><br />
			  <font color="#ffffff"><h4>National Institute Of Technology Rourkela</h4></font>
			  <div style="margin-left:1000px;"><a id="logo" href="http://nitrkl.ac.in/" target="blank"><img src="../images/nitrlogo.png" alt="Mess Management System" /></a></div>

              <!-- top tab navigation -->
              <div id="tabs">
                <ul>
	            </ul>
              </div>
              <!-- /top tabs -->

            </div><!-- /header -->

            <!-- mid content -->
            <div id="mid-content">
					 
                   <!-- post -->
                   <div class="post">
                    
                    <!-- post header -->
                    <div class="postheader">
                    <!-- title -->
					
                    <h1 class="posttitle">
                      <a href="#"><?php echo "Add New Student"; ?></a>
                    </h1>
                    <!-- /title -->
                    
                    </div>
                    
                    <div class="postbody">
						<form id="editstudent_form" action="editstudent.php?rollno=<?php echo $_REQUEST['rollno'];?>" method="post">
							<table>
							<?php
							include("../connect.php");
							$sql_connect=mysql_connect($host,$user,$pass) or die("cannot connect to database.please try after sometime");
							mysql_select_db($db,$sql_connect) or die("cannot find database");
							$query2 = "select * from `notification` where `receiver`='admin' and `seenbyreceiver`=0";
					$result2 = mysql_query($query2);
					$countnot=$result2?mysql_num_rows($result2):0;
							$q="select * from `student` where `rollno`='{$_REQUEST['rollno']}'";
							$q_result=mysql_query($q);
							$q_a=mysql_fetch_array($q_result);					
			
							?>
								<tr>
									<td>ROLL NUMBER:</td>
									<td><b><?php echo $q_a['rollno']?></b></td>
								</tr>
								<tr>
									<td>NAME:</td>
									<td><input type="text" maxlength="20" name ="name" value="<?php echo $q_a['name']?>"></td>
								</tr>
								<tr>
									<td>PHONE NUMBER:</td>
									<td><input type="text" maxlength="10" name ="phno" value="<?php echo $q_a['phoneno']?>"></td>
								</tr>
								<tr>
									<td>HALL NUMBER</td>
									<td><input type="text" maxlength="1" name ="hall" value="<?php echo $q_a['hallno']?>"></td>
								</tr>
								<tr>
									<td>ROOM NUMBER</td>
									<td><input type="text" maxlength="5" name ="room" value="<?php echo $q_a['roomno']?>"></td>
								</tr>
								<tr>
									<td>DEPARTMENT</td>
									<td><input type="text" maxlength="50" name ="dept" value="<?php echo $q_a['dept']?>"></td>
								</tr>
								<tr>
									<td>EMAIL ID</td>
									<td><input type="text" maxlength="30" name ="email" value="<?php echo $q_a['mailid']?>"></td>
								</tr>
							</table>
							<center><input type="submit" value="Update Student Profile" name="editstudent_submit">
						</form>
                    </div>
              
                    <div class="clear"></div>

                    <!-- /links -->
                    </div>
                    <!-- /post -->
            </div>
            <!-- /mid content -->
          </div>
          <!-- /mid -->


          <!-- sidebar -->
          <div id="sidebar">
           <!-- sidebar 1st container -->
          <div id="sidebar-wrap1">
            <!-- sidebar 2nd container -->
            <div id="sidebar-wrap2">
              <ul id="sidelist">
                 
                 <li>
                  <!-- sidebar menu (categories) -->
                  <ul class="nav">
                    <li class="cat-item">
                      <a href="index.php" class="active"><span>Home</span></a>
                    </li>
                    <li class="cat-item">
                      <a href="changepassword.php" class="active"><span>Change Password</span></a>
                    </li>
					<li class="cat-item">
                      <a href="addadmin.php" class="active"><span>Add Admin</span></a>
                    </li>
					<li class="cat-item">
                      <a href="addstudent.php" class="active"><span>Add Student</span></a>
                    </li>
					<li class="cat-item">
                      <a href="addmess.php" class="active"><span>Add Mess</span></a>
                    </li>
					<li class="cat-item">
                      <a href="showstudentlist.php" class="active"><span>Student List</span></a>
                    </li>
					<li class="cat-item">
                      <a href="showadminlist.php" class="active"><span>Admin List</span></a>
                    </li>
					<li class="cat-item">
                      <a href="showmesslist.php" class="active"><span>Mess List</span></a>
                    </li>
					<li class="cat-item">
                      <a href="resetstudentpass.php" class="active"><span>Reset Passwords</span></a>
                    </li>
					<li class="cat-item">
                      <a href="studentfeedback.php" class="active"><span>Give Feedback to Student</span></a>
                    </li>
					<li class="cat-item">
                      <a href="messfeedback.php" class="active"><span>Give Feedback to Mess</span></a>
                    </li>
					<li class="cat-item">
                      <a href="notification.php" class="active"><span>notification (<?php echo $countnot; ?>)</span></a>
                    </li>
                  </ul>
                  <!-- /sidebar menu -->
                 </li>
              </ul>
             </div>
             <!-- /sidebar 2nd container -->
           </div>
           <!-- /sidebar 1st container -->
          </div>
          <!-- /sidebar -->

         </div>
         <!-- /side wrap -->
        </div>
        <!-- /mid column wrap -->
       </div>
       <!-- /main wrapper -->

       <!-- clear main & sidebar sections -->
       <div class="clearcontent"></div>
       <!-- /clear main & sidebar sections -->


       <!-- footer -->
       <div id="footer">
         <!-- please do not remove this. respect the authors :) -->
          <p>Copyright @ NIT Rourkela  | Powered by Pritish & Utsav</p>
       </div>
       <!-- /footer -->

       <!-- layout controls -->
       <div id="layoutcontrol">
         <a href="javascript:void(0);" class="setFont" title="Increase/Decrease text size"><span>SetTextSize</span></a>
         <a href="javascript:void(0);" class="setLiquid" title="Switch between full and fixed width"><span>SetPageWidth</span></a>
       </div>
       <!-- /layout controls -->
      </div>
      <!-- /page -->

     </div>
  </div>
  <!-- /page wrappers -->

 </body>
</html>



