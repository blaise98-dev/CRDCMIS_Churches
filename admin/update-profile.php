<?php
session_start();
include'dbconnection.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:manage-users.php');
  } else{

// for updating user info    
if(isset($_POST['save']))
{
  $nid=$_POST['nid'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
  $parish=$_POST['parish'];
	$phone=$_POST['phone'];
  $st_pro=$_POST['st_pro'];
  $st_di=$_POST['st_di'];
  $st_se=$_POST['st_se'];
  $st_cel=$_POST['st_cel'];
  $st_vil=$_POST['st_vil'];
  $go_date=$_POST['go_date'];
  $uid=intval($_GET['id']);
$query=mysqli_query($con,"UPDATE `users` SET `fname` = '$fname', `lname` = '$lname', `go_date` = '$go_date', `st_pro` = '$st_pro', `st_di` = '$st_di', `st_se` = '$st_se', `st_cel` = '$st_cel', `st_vil` = '$st_vil' WHERE `users`.`id` = '$uid'");
$_SESSION['id']="Profile Updated successfully";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Update Profile</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Christian</span>
                      </a>
                   
                  </li>
              
                 
              </ul>
          </div>
      </aside>
      <?php $ret=mysqli_query($con,"select * from users where id='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> <?php echo $row['fname'];?>'s Information</h3>
             	
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['id'];?><?php echo $_SESSION['id']=""; ?></p>
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['id'];?><?php echo $_SESSION['id']="";?></p>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">National_Id </label>
                              <div class="col-sm-10">
                                  <input type="number" class="form-control" name="nid" value="<?php echo $row['nid'];?>" >
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">First Name </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="fname" value="<?php echo $row['fname'];?>" >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Last Ename</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="lname" value="<?php echo $row['lname'];?>" >
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Parish</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="parish" value="<?php echo $row['parish'];?>" >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Telephone </label>
                              <div class="col-sm-10">
                                  <input type="number" class="form-control" name="phone" value="<?php echo $row['phone'];?>">
                              </div>
                          </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Province </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="st_pro" value="<?php echo $row['st_pro'];?>" >
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">District </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="st_di" value="<?php echo $row['st_di'];?>" >
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Sector </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="st_se" value="<?php echo $row['st_se'];?>" >
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Cell </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="st_cel" value="<?php echo $row['st_cel'];?>" >
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Village </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="st_vil" value="<?php echo $row['st_vil'];?>" >
                              </div>
                          </div>
                          </div>
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Pray Date </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="go_date" value="<?php echo $row['go_date'];?>" readonly >
                              </div>
                          </div>
                          <div style="margin-left:100px;">
                          <input type="submit" name="save" value="save" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
        <?php } ?>
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>