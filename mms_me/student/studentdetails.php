<?php session_start();
		if(isset($_SESSION['usertype'])&& $_SESSION['usertype']=="student")
			{
			$rollno = $_SESSION['userid'];
			}
			else
			{header('Location: ../index.php');}
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
 <head profile="http://gmpg.org/xfn/11">
    <title>Mess Management Systen | NIT Rourkela</title>

    
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

    <style type="text/css" media="all">
      @import "../style.css";
    </style>
    <!--[if lte IE 6]>
    <script type="text/javascript">
    /* <![CDATA[ */
       blankimgpath = '../images/blank.gif';
     /* ]]> */
    </script>

    <style type="text/css" media="screen">
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
			  <?php
					$connection = mysql_connect("localhost","root","");
					mysql_select_db("mms",$connection) or die("could not connect to database");
					
					
			?>
              
              <!-- /top tabs -->

            </div><!-- /header -->

            <!-- mid content -->
            <div id="mid-content">
					<?php $query = "SELECT * 
									FROM student
									WHERE rollno =  '{$rollno}'";
					$result = mysql_query($query);
					$stud_names = mysql_fetch_array($result);
					?> 
                   <!-- post -->
                   <div class="post">
                    
                    <!-- post header -->
                    <div class="postheader">
                    <!-- title -->
					
                    <h1 class="posttitle">
                      <a href="#"><?php echo $stud_names['name']; ?></a>
                    </h1>
                    <!-- /title -->
                    
                    </div>
                    <?php $query = "SELECT * 
									FROM mess
									WHERE messid =  '{$stud_names['messid']}'";
					$result = mysql_query($query);
					$mess_names = mysql_fetch_array($result);
					$query2 = "select * from `notification` where `receiver`='$rollno' and `seenbyreceiver`=0";
					$result2 = mysql_query($query2);
					$countnot=$result2?mysql_num_rows($result2):0;
					?> 
                    
                    <div class="postbody">
                      <U><h3>Student Details</h3></U><br />
						<p><b>Name</b> : <?php echo $stud_names['name']; ?></p><p><b>Roll Number</b> : <?php echo $stud_names['rollno']; ?></p>
						
						<p><b>Hall Number</b> : <?php echo $stud_names['hallno']; ?></p><p><b>Room Number</b> : <?php echo $stud_names['roomno']; ?></p>
						
						<p><b>Phone No.</b> : <?php echo $stud_names['phoneno']; ?></p><p><b>Email Id</b> : <?php echo $stud_names['mailid']; ?></p>
						
						<p><b>Selected Mess</b> : <?php echo $mess_names['name']; ?></p>
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
                      <a href="index.php?rollno=<?php echo $rollno ;?>" class="active"><span>Home</span></a>
                    </li>
                    <li class="cat-item">
                      <a href="studentdetails.php?rollno=<?php echo $rollno ;?>" class="active"><span>Student Details</span></a>
                    </li>
                    <li class="cat-item">
                      <a href="changepassword.php" class="active"><span>Change Password</span></a>
                    </li>
					<li class="cat-item">
                      <a href="showbill.php" class="active"><span>Billing Amount</span></a>
                    </li>
					<li class="cat-item">
                      <a href="adminfeedback.php" class="active"><span>Give Feedback to Admin</span></a>
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
          <p>Copyright @ NIT Rourkela  | Powered by Pritish & Om</p>
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


