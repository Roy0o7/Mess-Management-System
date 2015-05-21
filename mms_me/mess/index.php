<?php session_start();
		if(isset($_SESSION['usertype'])&& $_SESSION['usertype']=="mess")
			{
			$messid = $_SESSION['userid'];
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
			  <?php
					$connection = mysql_connect("localhost","root","");
					mysql_select_db("mms",$connection) or die("could not connect to database");
					$query = "select * from mess";
					$result = mysql_query($query);
					$mess_num = $_SESSION['userid'];
					
			?>
              
              <!-- /top tabs -->

            </div><!-- /header -->

            <!-- mid content -->
            <div id="mid-content">
					<?php $query = "SELECT * 
									FROM mess
									WHERE messid =  '{$mess_num}'";
					$result = mysql_query($query);
					$mess_names = mysql_fetch_array($result);
					?> 
                   <!-- post -->
                   <div class="post">
                    
                    <!-- post header -->
                    <div class="postheader">
                    <!-- title -->
					
                    <h1 class="posttitle">
                      <a href="#"><?php echo $mess_names['name']; ?></a>
                    </h1>
                    <!-- /title -->
                    
                    </div>
                    
                    <div class="postbody">
                      
					  <?php
							$query2 = "select * from `notification` where `receiver`='$messid' and `seenbyreceiver`=0";
					$result2 = mysql_query($query2);
					$countnot=$result2?mysql_num_rows($result2):0;
					?>
							
						
						<?php
							$query="select * from `monday` where messid='{$mess_names['messid']}'";
							$q_result=mysql_query($query);
							$food_array[0]=mysql_fetch_array($q_result);
							$query="select * from `tuesday` where messid='{$mess_names['messid']}'";
							$q_result=mysql_query($query);
							$food_array[1]=mysql_fetch_array($q_result);
							$query="select * from `wednesday` where messid='{$mess_names['messid']}'";
							$q_result=mysql_query($query);
							$food_array[2]=mysql_fetch_array($q_result);
							$query="select * from `thursday` where messid='{$mess_names['messid']}'";
							$q_result=mysql_query($query);
							$food_array[3]=mysql_fetch_array($q_result);
							$query="select * from `friday` where messid='{$mess_names['messid']}'";
							$q_result=mysql_query($query);
							$food_array[4]=mysql_fetch_array($q_result);
							$query="select * from `saturday` where messid='{$mess_names['messid']}'";
							$q_result=mysql_query($query);
							$food_array[5]=mysql_fetch_array($q_result);
							$query="select * from `sunday` where messid='{$mess_names['messid']}'";
							$q_result=mysql_query($query);
							$food_array[6]=mysql_fetch_array($q_result);
							
							
						
						?>
							
						<br /><br /><br />
						<u><h3>Offered Menu</h3></u><br />
						<table align="center" border="0" width="70%">
						<tr>
							<td><b>DAY</b></td>
							<td><b>BREAKFAST</b></td>
							<td><b>LUNCH</b></td>
							<td><b>SNACKS</b></td>
							<td><b>DINNER</b></td>
							<td><b>COST</b></td>
						</tr>
						<tr>
							<td><b>Monday</b></td>
							<td> <?php echo $food_array[0]['breakfast'];?></td>
							<td> <?php echo $food_array[0]['lunch'];?></td>
							<td> <?php echo $food_array[0]['snacks'];?></td>
							<td> <?php echo $food_array[0]['dinner'];?> </td>
							<td> <?php echo $food_array[0]['cost'];?></td>
						</tr>
						<tr>
							<td><b>Tuesday</b></td>
							<td> <?php echo $food_array[1]['breakfast'];?></td>
							<td> <?php echo $food_array[1]['lunch'];?></td>
							<td> <?php echo $food_array[1]['snacks'];?></td>
							<td> <?php echo $food_array[1]['dinner'];?> </td>
							<td> <?php echo $food_array[1]['cost'];?></td>
						</tr>
						<tr>
							<td><b>Wednesday</b></td>
							<td> <?php echo $food_array[2]['breakfast'];?></td>
							<td> <?php echo $food_array[2]['lunch'];?></td>
							<td> <?php echo $food_array[2]['snacks'];?></td>
							<td> <?php echo $food_array[2]['dinner'];?> </td>
							<td> <?php echo $food_array[2]['cost'];?></td>
						</tr>
						<tr>
							<td><b>Thursday</b></td>
							<td> <?php echo $food_array[3]['breakfast'];?></td>
							<td> <?php echo $food_array[3]['lunch'];?></td>
							<td> <?php echo $food_array[3]['snacks'];?></td>
							<td> <?php echo $food_array[3]['dinner'];?> </td>
							<td> <?php echo $food_array[3]['cost'];?></td>
						</tr>
						<tr>
							<td><b>Friday</b></td>
							<td> <?php echo $food_array[4]['breakfast'];?></td>
							<td> <?php echo $food_array[4]['lunch'];?></td>
							<td> <?php echo $food_array[4]['snacks'];?></td>
							<td> <?php echo $food_array[4]['dinner'];?> </td>
							<td> <?php echo $food_array[4]['cost'];?></td>
						</tr>
						<tr>
							<td><b>Saturday</b></td>
							<td> <?php echo $food_array[5]['breakfast'];?></td>
							<td> <?php echo $food_array[5]['lunch'];?></td>
							<td> <?php echo $food_array[5]['snacks'];?></td>
							<td> <?php echo $food_array[5]['dinner'];?> </td>
							<td> <?php echo $food_array[5]['cost'];?></td>
						</tr>
						<tr>
							<td><b>Sunday</b></td>
							<td> <?php echo $food_array[6]['breakfast'];?></td>
							<td> <?php echo $food_array[6]['lunch'];?></td>
							<td> <?php echo $food_array[6]['snacks'];?></td>
							<td> <?php echo $food_array[6]['dinner'];?> </td>
							<td> <?php echo $food_array[6]['cost'];?></td>
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
                      <a href="index.php?messid=<?php echo $mess_num ;?>" class="active"><span>Home</span></a><a href="#"></a>
                    </li>
                    <li class="cat-item">
                      <a href="messdetails.php?messid=<?php echo $mess_num ;?>" class="active"><span>Mess Details</span></a><a href="#"></a>
                    </li>
					<li class="cat-item">
                      <a href="changemenu.php?messid=<?php echo $mess_num ;?>" class="active"><span>Change Menu</span></a><a href="#"></a>
                    </li>
                    <li class="cat-item">
                      <a href="changepassword.php" class="active"><span>Change Password</span></a><a href="#"></a>
                    </li>
					<li class="cat-item">
                      <a href="adminfeedback.php" class="active"><span>Send Message to Admin</span></a>
                    </li>
					<li class="cat-item">
                      <a href="studentfeedback.php" class="active"><span>Send Message to Student</span></a>
                    </li>
					<li class="cat-item">
                      <a href="notification.php" class="active"><span>Notification (<?php echo $countnot; ?>)</span></a>
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



