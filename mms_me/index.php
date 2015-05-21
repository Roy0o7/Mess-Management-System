<?php
if(isset($_POST['submit']))
{
	$u=$_POST['userid'];
	$p=$_POST['pass'];
	//$u=toupper($u);
	// add a toupper function here
	include("connect.php");
	$sql_connect=mysql_connect($host,$user,$pass) or die("cannot connect to database.please try after sometime");
	mysql_select_db($db,$sql_connect) or die("cannot find database");
	switch($_POST['usertype'])
	{
		case "student":
					$select_user_query="SELECT * FROM `student` WHERE `rollno`='$u' AND `password`='$p'";
					$select_user=mysql_query($select_user_query);
					if(mysql_num_rows($select_user)==1)
					{
						session_start();
						$_SESSION['usertype']="student";
						$_SESSION['userid']=$u;
						header('Location: student/index.php?rollno='.$u);
					}
					else
					{
						$error_login=1;
					}
					
					break;
		case "admin":
					$select_user_query="SELECT * FROM `admin` WHERE `empcode`='$u' AND `password`='$p'";
					$select_user=mysql_query($select_user_query);
					if(mysql_num_rows($select_user)==1)
					{
						session_start();
						$_SESSION['usertype']="admin";
						$_SESSION['userid']=$u;
						header('Location: admin/index.php?empcode='.$u);
					}
					else
					{
						$error_login=1;
					}
					break;
		case "mess":
					$select_user_query="SELECT * FROM `mess` WHERE `messid`='$u' AND `password`='$p'";
					$select_user=mysql_query($select_user_query);
					if(mysql_num_rows($select_user)==1)
					{
						session_start();
						$_SESSION['usertype']="mess";
						$_SESSION['userid']=$u;
						header('Location: mess/index.php?messid='.$u);
					}
					else
					{
						$error_login=1;
					}
					break;
	}
}

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
 <head profile="http://gmpg.org/xfn/11">
    <title>Mess Management Systen | NIT Rourkela</title>

    
    
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <style type="text/css" media="all">
      @import "style.css";
    </style>
	
    <link href="themes/8/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/8/js-image-slider.js" type="text/javascript"></script>
    
    <link href="generic.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        imageSlider.thumbnailPreview(function (thumbIndex) { return "<img src='images/thumb" + (thumbIndex + 1) + ".jpg' style='width:70px;height:44px;' />"; });
    </script>
	
    <!--[if lte IE 6]>
    <script type="text/javascript">
    /* <![CDATA[ */
       blankimgpath = 'images/blank.gif';
     /* ]]> */
    </script>

    <style type="text/css" media="screen">
      @import "ie6.css";
      body{ behavior:url("ie6hoverfix.htc"); }
      img{ behavior: url("ie6pngfix.htc"); }
    </style>
    <![endif]-->

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/fusion.js" type="text/javascript"></script>

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

              <div id="topnav"><p><a href="logout.php">WELCOME</a><a href="forum.php">OFFICIAL FORUM</a></p></div>
			  
              <a id="logo" href="#"><img src="images/logo.png" alt="Mess Management System" /></a><br /><br /><br /><br />
			  <font color="#ffffff"><h4>National Institute Of Technology Rourkela</h4></font>
			  <div style="margin-left:1000px;"><a id="logo" href="http://nitrkl.ac.in/" target="blank"><img src="images/nitrlogo.png" alt="Mess Management System" /></a></div>

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
					
					<br /><br /><br /><br />
    <div id="sliderFrame">
        <div id="slider">
            
            <img src="images/1.jpg" />
            <img src="images/2.jpg" />
            <img src="images/3.jpg" />
            <img src="images/4.jpg" />
        </div>
        <div style="display: none;">
            <div id="cap1">
                Welcome to <a href="http://www.menucool.com/">Menucool.com</a>.
            </div>
            <div id="cap2">
                <em>HTML</em> caption. Link to <a href="http://www.google.com/">Google</a>.
            </div>
        </div>
    </div>

    
					
					
                    <!-- title -->
					
                    <h1 class="posttitle">
                      
                    </h1>
                    <!-- /title -->
                    
                    </div>
                    
                    <div class="postbody">							
									
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
                 
                 <li class="box">
                  <h2 class="title">Login</h2>
                  <ul>
                   <li>
                    <div id="loginblock">
                       <form id="login" action="index.php" method="post">
					  <?php if(isset($error_login)) echo "<p>INCORRECT USERID OR PASSWORD</p><BR />"?>
                        <p>UserId:<br />
                          <input type="text" maxlength="10" name="userid" value="" class="login" tabindex="41" />
                        </p>
                        <p>Password:<br />
                          <input type="password" maxlength="20" name="pass" value=""  class="login" tabindex="41" />
                        </p>
						<p>Designation: <br />
			  <select name="usertype">
			  <option value="student">Student</option>
			  <option value="admin">Administrator</option>
			  <option value="mess">Mess Owner</option>
						</p>
                        <p><input type="hidden" name="processlogin" value="1" /> <input type="hidden" name="return" value="" /> <!--<input class="checkbox" type="checkbox" name="persistent" tabindex="42" /> <small>Remember me</small>-->
                        </p>
                        <p>
                          <?php
				if(isset($_SESSION['usertype']))
				{
					echo "You are already logged in as ".$_SESSION['userid'].".<br />";
					echo "Either <a href=\"logout.php\">LOGOUT</a> to login again or <a href=\"\"> Go Back</a>";
				}
				else
				{				
					echo "<input type=\"submit\" name=\"submit\" value=\"Login\">";
				}
				?>
                        </p>
                      </form>
                    </div>
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


