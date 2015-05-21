
<?php session_start();
		if(isset($_SESSION['usertype'])&& $_SESSION['usertype']=="student")
			{
			$rollno = $_SESSION['userid'];
		if(isset($_REQUEST['cmid']))	
			$cmid = $_REQUEST['cmid'];
			}
			else
			{header('Location: ../index.php');}
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
 <head profile="http://gmpg.org/xfn/11">
    <title>Mess Management Systen | NIT Rourkela</title>

    
    <link rel="alternate" type="application/atom+xml" title="Atom Feed" href="http://yoursite.com/atom" />
    <link rel="pingback" href="http://yoursite.com" />
    <link rel="shortcut icon" href="favicon.ico" />

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
					$mess_num = 'AK0002';
					$query2 = "select * from `notification` where `receiver`=$rollno and `seenbyreceiver`=0";
					$result2 = mysql_query($query2);
					$countnot=mysql_num_rows($result2);
			?>
              <div id="tabs">
                <ul>
					<?php if(isset($_REQUEST['mess_num']))
							$mess_num = $_REQUEST['mess_num'];
							
							
							?>
					<?php 
					
					while($mess_names = mysql_fetch_array($result)){
							$s1 = "<li><a href=\"index.php?rollno={$rollno}&mess_num={$mess_names['messid']}\"";
							if($mess_names['messid']==$mess_num)
							$s2 = "class=\"active\">";
							else
							$s2 = "";
							$s3 = "<span><span>{$mess_names['name']}</span></span></a></li>";
						  echo $s1.$s2.$s3;
						  
						  }
					?>
					
					
					
                </ul>
              </div>
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
                      <U><h3>Mess Details</h3></U><br />
					  <?php $query = "select * from student where rollno = '{$rollno}'";
							$query2 = "update student set messid = '{$mess_num}'";
							$result = mysql_query($query);
							
							$stud_names = mysql_fetch_array($result);
							
							
							if($stud_names['messid']==$mess_num)
								$s = "<div style=\"margin-left:400px;\"><img src=\"../images/button2.png\"/></div>";
							else
								$s = "<a href=\"index.php?rollno={$rollno}&mess_num={$mess_names['messid']}&cmid=2\";><div style=\"margin-left:400px;\"><img src=\"../images/button1.png\"/></div></a>";
								
								echo $s;
								
								if(isset($cmid))
								if($cmid==2){
								mysql_query($query2);
								
								}
							?>
							
						<p><b>MessId</b> : <?php echo $mess_names['messid']; ?></p><p><b>Owner</b> : <?php echo $mess_names['owner']; ?></p>
						
						<p><b>Phone No.</b> : <?php echo $mess_names['phoneno']; ?></p><p><b>Email Id</b> : <?php echo $mess_names['emailid']; ?></p>
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
							
						<br /><br /><br /><hr><br /><br />
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
					<?php $query2 = "select * from `notification` where `receiver`={$_SESSION['userid']} and `seenbyreceiver`=0";
					$result2 = mysql_query($query2);
					$countnot=mysql_num_rows($result2);
					?>
					<li class="cat-item">
                      <a href="notifications.php" class="active"><span>NOTIFICATIONS - <?php echo $countnot;?></span></a>
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


