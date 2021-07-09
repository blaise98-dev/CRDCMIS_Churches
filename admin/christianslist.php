	<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } 
?>
  <html>
    <head>
        <title>Print Test Page</title>
        <script>
            printDivCSS = new String ('<link href="myprintstyle.css" rel="stylesheet" type="text/css">')
            function printDiv(divId) {
                window.frames["print_frame"].document.body.innerHTML=printDivCSS + document.getElementById(divId).innerHTML;
                window.frames["print_frame"].window.focus();
                window.frames["print_frame"].window.print();
            }
        </script>
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
                      <a href="christianslist.php" >
                          <i class="fa fa-users"></i>
                          <span>Christians List</span>
                      </a>
                   
                  </li>

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Christians</span>
                      </a>
                   
                  </li>
              
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
            
        
        <div id="div1">
        <a href="javascript:printDiv('div1')" style="float: right;">Print</a><br>
<div class="row">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                         
                    <?php $ret=mysqli_query($con,"SELECT users.*
FROM users
where parish='".$_SESSION['login']."';");
    if($row=mysqli_fetch_array($ret))
    
    {?>
                            <h4></i> List of registered Christian of <b>
                               
                              <?php echo $_SESSION['login'];?>&nbsp;</b>parish during covid-19</h4>
                              <?php } ?>
                             
                            <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th>National_id</th>
                                  <th class="hidden-phone">First Name</th>
                                  <th> Last Name</th>
                                  <th>Telephone</th>
                                  <th>Parish</th>
                                  <th>District</th>
                                  <th>Sector</th>
                                  <th>Cell</th>
                                  <th>Village</th>
                                  <th>Date of pray</th>
                                  <th>Mass prayed</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"SELECT users.*
FROM users
where parish='".$_SESSION['login']."' order by go_date desc;");
                $cnt=1;
                while($row=mysqli_fetch_array($ret))
                {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                              <td><?php echo $row['nid'];?></td>
                                  <td><?php echo $row['fname'];?></td>
                                  <td><?php echo $row['lname'];?></td>
                                  <td><?php echo $row['phone'];?></td>
                                  <td><?php echo $row['parish'];?></td>
                                  <td><?php echo $row['st_di'];?></td>
                                  <td><?php echo $row['st_se'];?></td>
                                  <td><?php echo $row['st_cel'];?></td>
                                  <td><?php echo $row['st_vil'];?></td>
                                  <td><?php echo $row['go_date'];?></td>
                                  <td><?php echo $row['mass_no'];?></td>
                                
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
            </div>
    </section>
      </section>
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
              </div>
               <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
            </div>
          </body>
          </html>