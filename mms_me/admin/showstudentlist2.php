<?php session_start();
		if(isset($_SESSION['usertype'])&& $_SESSION['usertype']=="admin")
			{
			$empcode = $_SESSION['userid'];
			$query2 = "select * from `notification` where `receiver`='admin' and `seenbyreceiver`=0";
					$result2 = mysql_query($query2);
					$countnot=$result2?mysql_num_rows($result2):0;
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
					<li><a href="showstudentlist.php" >Show all</a></li>
					<li><a href="#" class="active">Show by Mess</a></li>
					<li><a href="searchbyroll.php">Search By Roll</a></li>
					<li><a href="searchbyhall.php">Search By Hall</a></li>
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
					
                    
                    <form id="select_mess" action="showstudentlist2.php" method="get">
					<p>Select Mess : 
					<select name="mess" STYLE="width: 300px">
						<?php
						$connection = mysql_connect("localhost","root","");
						mysql_select_db("mms",$connection) or die("could not connect to database");
						$query = "select * from mess";
						$result = mysql_query($query);
						if(isset($_REQUEST['select_submit']))
						{	
							$s=$_REQUEST['mess'];
						}
						while($mess = mysql_fetch_array($result))
						{
							
							echo "<option value=\"{$mess['messid']}\" ";
							if(isset($_REQUEST['select_submit'])&&$s==$mess['messid'])
							{
								echo "selected = \"selected\"";
							}
							echo ">{$mess['name']}</option>";
						}
						?>
						</p>
						<input type="submit" name ="select_submit" value="Show students registered">
						</form>  
                    
                    <!-- /title -->
                    
                    </div>
                    
                    <div class="postbody">
					<?php
						
						if(isset($_REQUEST['select_submit']))
						{	
							$query = "select * from student where messid=\"{$_REQUEST['mess']}\"";
							$mess_select = mysql_query($query);
							echo '
							<table>
							<tr>
							 <td STYLE="width: 300px"><b>Roll No</b></td>
							 <td STYLE="width: 300px"><b>Name</b></td>
							 <td STYLE="width: 300px"><b>Hall</b></td>
							 <td STYLE="width: 300px"><b>Deparment</b></td>
							</tr> ';
							while($result = mysql_fetch_array($mess_select))
							{
									echo "<tr><td>".$result['rollno']."</td><td>".$result['name']."</td><td>".$result['hallno']."</td><td>".$result['dept']."</td></tr>";
							} echo "</table>";
						
						}
					?>
		
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



