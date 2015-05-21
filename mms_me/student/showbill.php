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
					$query2 = "select * from `notification` where `receiver`='$rollno' and `seenbyreceiver`=0";
					$result2 = mysql_query($query2);
					$countnot=$result2?mysql_num_rows($result2):0;
					
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
					?> 
                    
                    <div class="postbody">
                      <h3>Pending payment</h3>
					  <table>
					  <tr>
						<td><b>DAY</b></td>
						<td><b>COST</b></td>
					  </tr>
					  <tr>
						<td>Monday</td>
						<td>Rs. <?php $query = "SELECT * FROM monday WHERE messid =  '{$stud_names['messid']}'";
							$result = mysql_query($query);
							$mo_f = mysql_fetch_array($result);
							echo $mo_f['cost'];?></td>
					  </tr>
					  <tr>
						<td>Tuesday</td>
						<td>Rs. <?php $query = "SELECT * FROM tuesday WHERE messid =  '{$stud_names['messid']}'";
						$result = mysql_query($query);$tu_f = mysql_fetch_array($result);echo $tu_f['cost'];?></td>
					  </tr>
					  <tr>
						<td>Wednesday</td>
						<td>Rs. <?php $query = "SELECT * FROM wednesday WHERE messid =  '{$stud_names['messid']}'";
						$result = mysql_query($query);$we_f = mysql_fetch_array($result);echo $we_f['cost'];?></td>
					  </tr>
					  <tr>
						<td>Thursday</td>
						<td>Rs. <?php $query = "SELECT * FROM thursday WHERE messid =  '{$stud_names['messid']}'";
						$result = mysql_query($query);$th_f = mysql_fetch_array($result);echo $th_f['cost'];?></td>
					  </tr>
					  <tr>
						<td>Friday</td>
						<td>Rs. <?php $query = "SELECT * FROM friday WHERE messid =  '{$stud_names['messid']}'";
						$result = mysql_query($query);$fr_f = mysql_fetch_array($result);echo $fr_f['cost'];?></td>
					  </tr>
					  <tr>
						<td>Saturday</td>
						<td>Rs. <?php $query = "SELECT * FROM saturday WHERE messid =  '{$stud_names['messid']}'";
						$result = mysql_query($query);$sa_f = mysql_fetch_array($result);echo $sa_f['cost'];?></td>
					  </tr>
					  <tr>
						<td>Sunday</td>
						<td>Rs. <?php $query = "SELECT * FROM sunday WHERE messid =  '{$stud_names['messid']}'";
						$result = mysql_query($query);$su_f = mysql_fetch_array($result);echo $su_f['cost'];?></td>
					  </tr>
					  <tr>
						<td>TOTAL AMOUNT</td>
						<td>Rs. <?php echo $mo_f['cost']+$tu_f['cost']+$we_f['cost']+$th_f['cost']+$fr_f['cost']+$sa_f['cost']+$su_f['cost'];?></td>
					  </tr>
					  </table>
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


