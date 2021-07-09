


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Blaise prog">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive">

    <title>Admin | registration</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>
	  <div id="login-page">
	  	<div class="container">
      
	  	
		      <form class="form-login" action="" method="post">
		        <h2 class="form-login-heading">Register now</h2>
                 <div class = "panel-body">
						<div class = "form-group">
							<label for = "firstname">Firstname: </label>
							<input class = "form-control" name = "firstname" type = "text" required = "required">
						</div>
						<div class = "form-group">
							<label for = "lastname">Lastname: </label>
							<input class = "form-control" name = "lastname" type = "text" required = "required">
						</div>
						<div class = "form-group">
							<label for = "role">Role: </label>
							<input class = "form-control" name = "role" type = "text" required = "required">
						</div>
						<div class = "form-group">
							<label for = "username">Username: </label>
							<input class = "form-control" name = "username" type = "text" required = "required"placeholder="Paroisse">
						</div>
						<div class = "form-group">	
							<label for = "password">Password: </label>
							<input class = "form-control" name = "password" maxlength = "16" type = "password" required = "required">
						</div>
						<div class = "form-group">	
							<label for = "rep_password">Confirm Password: </label>
							<input class = "form-control" name = "rep_password" maxlength = "16" type = "password" required = "required">
						</div>
						
						
							<button  class = "btn btn-primary" name = "save_admin" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
							<br />
					</div>
					<?php require 'add_admin.php' ?>
		      </form>	  	
	  	
	  	</div>
	  </div>
    <!--footer-->
    <div class="footer">
    <footer class="iq-footer-03 white-bg iq-ptb-20">
    <div class="container">
    <div class="row">
    <div class="col-sm-12 text-center">
      <div class="footer-copyright iq-pt-10">Copyright &copy; <span id="copyright"><script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span><a href="developer_register_admin.php" class="text-green"> Adaptive Engineering Group Ltd.</a> All Rights Reserved</div>
    </div>
    <div class="col-sm-6">
      <!-- <ul class="info-share">
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-google"></i></a></li>
        <li><a href="#"><i class="fa fa-github"></i></a></li>
      </ul>  -->
    </div>
    </div>
    </div>
    </footer>
  
  </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
