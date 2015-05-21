
<?php session_start();
		if(isset($_SESSION['usertype'])&& $_SESSION['usertype']=="mess")
			{
			$messid = $_SESSION['userid'];
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
					
					$query2 = "select * from `notification` where `receiver`='$messid' and `seenbyreceiver`=0";
					$result2 = mysql_query($query2);
					$countnot=$result2?mysql_num_rows($result2):0;
			?>
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
                      
                    </h1>
                    <!-- /title -->
                    
                    </div>
                    
                    <div class="postbody">
					<?php if(isset($_REQUEST['success'])) echo "Your message was sent successfully";?>
                      <form id="adminfeedback" action="sendmessage.php" method="post">
					  Enter Message <br /> <textarea name="message" rows="10" cols="50" ></textarea>
					  <input type="hidden" name="sender" value="<?php echo $messid;?>">
					  <input type="hidden" name="receiver" value="admin">
					  <input type="submit" name="send_submit" value="Send Message">
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


