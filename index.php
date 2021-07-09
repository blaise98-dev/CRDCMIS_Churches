<a href="javascript:printDiv('div1')">Print feedback</a><br>
<div id="div1">

<?php session_start();
require_once('dbconnection.php');

//Code for Registration 
if(isset($_POST['signup']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$phone=$_POST['phone'];
	$nid=$_POST['nid'];
	$parish=$_POST['parish'];
	$st_pro=$_POST['st_pro'];
	$st_di=$_POST['st_di'];
	$st_se=$_POST['st_se'];
	$st_cel=$_POST['st_cel'];
	$st_vil=$_POST['st_vil'];
	$go_date=$_POST['go_date'];
	$mass_no=$_POST['mass_no'];

	
	
$sql=mysqli_query($con,"select * from users where nid='$nid' and go_date='$go_date';");
$row=mysqli_num_rows($sql);

if($row>0)
{
	echo "<script>alert('This christian already booked a place. Please tell other to register if they want to attend mass');</script>";
} else{
	$check=mysqli_query($con,"select count(nid) from users where go_date='$go_date';");
	
	$fetch=mysqli_fetch_array($check);
$ro=$fetch['count(nid)'];
	if ($ro<=900){
		if ($mass_no==1) {
			
		
		$count=mysqli_query($con,"select count(mass_no) from users where go_date='$go_date' and mass_no=1;");
			$fetch=mysqli_fetch_array($count);
$rol=$fetch['count(mass_no)'];
			if ($rol<=300) {
				$msg=mysqli_query($con,"INSERT INTO `users` (`id`, `nid`, `fname`, `lname`, `phone`, `parish`, `st_pro`, `st_di`, `st_se`, `st_cel`, `st_vil`, `go_date`, `mass_no`) VALUES (NULL, '$nid', '$fname', '$lname', '$phone', '$parish', '$st_pro', '$st_di', '$st_se', '$st_cel', '$st_vil', '$go_date', '$mass_no');")or die(mysqli_error($con));
				
$query=mysqli_query($con,"select count(nid) from users where go_date='$go_date' and mass_no=1 and parish='$parish';")or die(mysqli_error($con));
			
$fetch=mysqli_fetch_array($query);
$id=$fetch['count(nid)'];
	if($msg)
{
	echo  "<h4>Dear ",$fname," ",$lname," <br> National Id:<h2>",$nid,"</h2><h3>You have successfully registered to pray on sunday ",$go_date," <br> <br> You will pray in First mass at ",$parish," parish 07:00 AM<br><br> Your sitting place number:</h3><h2>",$id,"</h2><br><br></h4><h3>Please keep this document somewhere because you will present it at parish when you come to pray!!!!!!</h3>";
}
else{
	echo "Failed to register";
}


			}
			else{
	echo"Sorry number of christians allowed to attend this mass is full you can choose between second ,third mass or next week";
}
		
}
else if ($mass_no==2) {
			
		
		$count=mysqli_query($con,"select count(mass_no) from users where go_date='$go_date' and mass_no=2");
			
			$fetch=mysqli_fetch_array($count);
$rol=$fetch['count(mass_no)'];
			if ($rol<=300) {
				$msg=mysqli_query($con,"INSERT INTO `users` (`id`, `nid`, `fname`, `lname`, `phone`, `parish`, `st_pro`, `st_di`, `st_se`, `st_cel`, `st_vil`, `go_date`, `mass_no`) VALUES (NULL, '$nid', '$fname', '$lname', '$phone', '$parish', '$st_pro', '$st_di', '$st_se', '$st_cel', '$st_vil', '$go_date', '$mass_no');")or die(mysqli_error($con));

	$query=mysqli_query($con,"select count(nid) from users where go_date='$go_date' and mass_no=2 and parish='$parish';")or die(mysqli_error($con));
			
$fetch=mysqli_fetch_array($query);
$id=$fetch['count(nid)'];
	if($msg)
{
	echo  "<b><h4>Dear ",$fname," ",$lname," <br> National Id:<h1>",$nid,"</h1> <br>You have successfully registered to pray on sunday ",$go_date," <br> You will pray in second mass at ",$parish," parish 10:00 AM<br>Your sitting place number:<b><h1>",$id,"</h1></b><br><br><h3>Please keep this document somewhere because you will present it at parish when you come to pray!!!!!!</h3> <b></h4>";
}

else{
	echo "Failed to register";
}
			}
			else{
	echo"Sorry number of christians allowed to attend this mass is full you can choose between First ,third mass or next week";
}
		
}
else {
			
		
		$count=mysqli_query($con,"select count(mass_no) from users where go_date='$go_date' and mass_no=3");
			$fetch=mysqli_fetch_array($count);
$rol=$fetch['count(mass_no)'];
			if ($rol<=300) {
				$msg=mysqli_query($con,"INSERT INTO `users` (`id`, `nid`, `fname`, `lname`, `phone`, `parish`, `st_pro`, `st_di`, `st_se`, `st_cel`, `st_vil`, `go_date`, `mass_no`) VALUES (NULL, '$nid', '$fname', '$lname', '$phone', '$parish', '$st_pro', '$st_di', '$st_se', '$st_cel', '$st_vil', '$go_date', '$mass_no');")or die(mysqli_error($con));

	$query=mysqli_query($con,"select count(nid) from users where go_date='$go_date' and mass_no=1 and parish='$parish';")or die(mysqli_error($con));
			
$fetch=mysqli_fetch_array($query);
$id=$fetch['count(nid)'];
	if($msg)
{
	echo  "<b><h4>Dear ",$fname," ",$lname," <br> National Id:<h1>",$nid," </h1><br>You have successfully registered to pray on sunday ",$go_date," <br> You will pray in third mass at ",$parish," parish 16:00 PM<br>Your sitting place number:<b><h1>",$id,"</h1></b><br><br><h3>Please keep this document somewhere because you will present it at parish when you come to pray!!!!!!</h3> <b></h4>";
}

else{
	echo "Failed to register"; 
}


			}
			else{
	echo"Sorry number of christians allowed to attend this mass is full you can choose between second ,third mass or next week";
}	
}	
}
else{
	echo"Sorry number of christians allowed to attend  mass on this sunday is full you can choose  next week";
}
}

}

// Code for login 
if(isset($_POST['login']))
{
$nid=$_POST['nid'];

$phone=$_POST['phone'];
$ret= mysqli_query($con,"SELECT * FROM users WHERE nid='$nid' and parish='$parish'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="welcome.php";
$_SESSION['login']=$_POST['phone'];
$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
//header("location:http://$host$uri/$extra");
exit();
}
}

/*Code for Forgot Password

if(isset($_POST['send']))
{
$femail=$_POST['femail'];

$row1=mysqli_query($con,"select email,password from users where email='$femail'");
$row2=mysqli_fetch_array($row1);
if($row2>0)
{
$email = $row2['email'];
$subject = "Information about your password";
$password=$row2['password'];
$message = "Your password is ".$password;
mail($email, $subject, $message, "From: $email");
echo  "<script>alert('Your Password has been sent Successfully');</script>";
}
else
{
echo "<script>alert('Email not register with us');</script>";	
}
}

*/?></div>
 <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
<!DOCTYPE html>
<html>
<head>
<title>Christian registration form</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegent Tab Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


 <script>
            printDivCSS = new String ('<link href="myprintstyle.css" rel="stylesheet" type="text/css">')
            function printDiv(divId) {
                window.frames["print_frame"].document.body.innerHTML=printDivCSS + document.getElementById(divId).innerHTML;
                window.frames["print_frame"].window.focus();
                window.frames["print_frame"].window.print();
            }
        </script>





<script src="js/jquery.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default',       
							width: 'auto', 
							fit: true 
						});
					});
				   </script>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="favicon_transparent.png" />
	
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;Raleway:300,400,500,600,700,800,900">
	
		<link rel="stylesheet" href="np/stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="assets/css/owl-carousel/owl.carousel.css" />
	
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />
	
	<link rel="stylesheet" type="text/css" href="assets/css/magnific-popup/magnific-popup.css" />
	
	<link rel="stylesheet" type="text/css" href="assets/css/animate.css" />
	
	<link rel="stylesheet" href="assets/css/ionicons.min.css">
	
	<link rel="stylesheet" href="assets/css/style.css">
	
	<link rel="stylesheet" href="assets/css/responsive.css">
	
	<link rel="stylesheet" href="#" data-style="styles">
	<link rel="stylesheet" href="assets/css/style-customizer.css" />
	
	<link rel="stylesheet" href="assets/css/custom.css" />	
</head>
<body>
	    
	    <div class="bs-example navbar-fixed-top">
        <nav class="navbar navbar-expand-md navbar-light " style="background:#0c3e75;overflow-y: hidden;">
            <a href="index.php" class="navbar-brand">
                <!--<img src="assets/images/banner/log.jpg" class="logo" height="40" alt="Movement Clearance">-->

            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarCollapse"></div>
              
<a href="admin/index.php" target="_blank" style="float: right;color: white;">Login</a>
                        </nav>
   

	<div class="content" >
        	
<section id="iq-home" class="banner-03 iq-bg iq-bg-fixed iq-box-shadow " style=" background: url(images/pres.jpg);">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">				
				<h1 class="iq-font-white iq-tw-8 text-center"style="padding: 1em;margin-top: 4cm;font-size: 39px;line-height: 1.5;">
					<span >Murakaza neza kuri <b style="color:#061B35;font-size: 50px;">CRDCMIS</b>/Welcome to <b style="color:#061B35;font-size: 50px;">CRDCMIS</b> </span>
									</h1>
			</div>
		</div>
	</div>
</section>
		
<section class="">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="heading-title">
					<div>
						<h2 class="title iq-tw-6" style="margin-top:70px"></h2>
						<div class="divider"></div>
						<p>Mu kwirinda ikwirakwizwa rya COVID-19, usabwe kwirinda ingendo zitari ngombwa.<br/>niba ushaka kujya murusengero Uriyandika</p>
						<button class="open-form btn btn-success" data-lang="kin">Saba Umwanya mu rusengero</button>
                    </div>
					<h2 class="title iq-tw-6" style="margin-top:70px"></h2>
					<div class="divider"></div>
					<p>Please stay at home to avoid the spread of COVID-19</p>
					<button class="open-form btn btn-success" data-lang="en">Request Place to attend Prayer</button>
					
                </div>
                					 
			</div>
		</div>
	</div>
</section>



<section id="request-form" class="about">

	
	<form name="registration" method="post" action="" enctype="multipart/form-data" onsubmit="return validateform()">
		<div class="row">
			<div class="col-sm-6 input-section from-data pl-4">
				<div class="form-group">
					<label class="col-sm-12 control-label">Indangamuntu/Passport</label>
					<div class="col-sm-10">
						<input class="form-control" id="focusedInput" type="text" name="nid" min="16" max="16" placeholder="National id" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-12 control-label">Izina Ry'idini/First Name</label>
					<div class="col-sm-10">
						<input class="form-control" id="focusedInput" type="text" name="fname" min="4" placeholder="Amazina" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-12 control-label">Amazina/LastNames</label>
					<div class="col-sm-10">
						<input class="form-control" id="focusedInput" type="text" name="lname" min="4" placeholder="Izina" required>
					</div> 
				</div>
				

				<div class="form-group">
					<label class="col-sm-12 control-label">Telephone/Phone</label>
					<div class="col-sm-10">
						<input class="form-control" id="focusedInput" type="text" name="phone" placeholder="07...." max="10" min="10" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-12 control-label">Paruwasi/Parish</label>
					<div class="col-sm-10">
						<input class="form-control" id="focusedInput" type="text" name="parish" placeholder="Paruwasi uzasengeramo" required>
					</div> 
				</div>
				
				
				<div class="form-group">
					<label class="col-sm-12 control-label">Intara/Province</label>
					<div class="col-sm-10">
						<select class="form-control province-input" name="st_pro" id="province-dropdown"required>
							<option value="" class="default-opt">Choose Province</option>												
						</select>
					</div>
				</div>
				<div class="form-group" >
					<label class="col-sm-12 control-label">Akarere/District</label>
					<div class="col-sm-10">
						<select class="form-control sector-input" name="st_di" id="district-dropdown"required>
							<option value="" class="default-opt">Choose District</option>
																											
						</select>
						
					</div>
				</div>
				<div class="form-group" >
					<label class="col-sm-12 control-label">Umurenge/Sector</label>
					<div class="col-sm-10">
						<select class="form-control sector-input" name="st_se" id="sector-dropdown"required>
							<option value="" class="default-opt">Choose Sector</option>
												
						</select>
							
					</div>
				</div>
				<div class="form-group" >
					<label class="col-sm-12 control-label">Akagari/Cell</label>

					<div class="col-sm-10">
						<select class="form-control cell-input" name="st_cel" id="cell-dropdown"required>
							<option value="" class="default-opt">Choose Cell</option>
																									
						</select>
							
					</div>
				</div>
				<div class="form-group" >
					<label class="col-sm-12 control-label">Umudugudu/Village</label>
					<div class="col-sm-10">
						<select class="form-control village-input" name="st_vil" id="village-dropdown"required>
							<option value="" class="default-opt">Choose Village</option>
															
															
																		
						</select>
							
					</div>
				</div>	
				<div class="form-group">
						<div class="col-sm-5">
							<label for="comment">Itariki ushaka Gusengeraho/Pray Date</label>
							<input class="form-control" id="focusedInput" type="date" name="go_date" required>
						</div>
												
					</div>
						<div class="form-group">
					<label class="col-sm-12 control-label">Uzajya mu misa ya kangahe?/Which mass will you pray?</label>
					<div class="col-sm-10">
						<select class="form-control province-input" name="mass_no"  required>
							<option value="" class="default-opt">mass</option>
															<option id="text" data-provname="Kigali"  value="1">1</option>
															<option id="text" data-provname="South"  value="2">2</option>
															<option id="text" data-provname="West"  value="3">3</option>
															
																		
						</select>
					</div>
				</div>	 
			</div>
			
		
			</div>
			<div class="sign-up" style="margin-left: 2cm;">
									<input type="reset" value="Reset">
									<input type="submit" name="signup"  value="Submit" >
									<div class="clear"> </div>
			<div class="col-md-3 xs-hidden"></div>		
		</div>
		</form>
		
	</section>
		</div>
		
</section>
<!-- End about Section -->
	</div>
	<div>
	</div>

	<!-- Footer -->
	<div class="footer">
		<footer class="iq-footer-03 white-bg iq-ptb-20">
		<div class="container">
		<div class="row">
		<div class="col-sm-12 text-center">
			<div class="footer-copyright iq-pt-10">Copyright @ <span id="copyright"><script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span><a href="#" class="text-green"> Adaptive Engineering Group Ltd.</a> All Rights Reserved</div>
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
		
			
		
			
	<script src="np/code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="np/cdn.jsdelivr.net/npm/popper.js%401.16.0/dist/umd/popper.min.js"></script>
	<script src="np/stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/custom700d.js?cache=29"></script>
    <script src="js/locations.js"></script>
		<!-- <script type="text/javascript" src="../assets/js/owl-carousel/owl.carousel.min.js"></script>
	
	<script type="text/javascript" src="../assets/js/counter/jquery.countTo.js"></script>
	
	<script type="text/javascript" src="../assets/js/jquery.appear.js"></script>
	
	<script type="text/javascript" src="../assets/js/magnific-popup/jquery.magnific-popup.min.js"></script>
	
	<script type="text/javascript" src="../assets/js/retina.min.js"></script>
	
	<script type="text/javascript" src="../assets/js/wow.min.js"></script>
	
	<script type="text/javascript" src="../assets/js/skrollr.min.js"></script>
	
	<script type="text/javascript" src="../assets/js/jquery.countdown.min.js"></script>
	
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="../assets/js/style-customizer.js"></script>
	
	<script type="text/javascript" src="../assets/js/custom.js"></script> -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
		<script>
        
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
	
		gtag('config', 'UA-122258968-2');
	</script>
<script>  
function validateform(){  
var nid=document.registration.nid.value;  
var phone=document.registration.phone.value;
var date=document.registration.go_date.value;
if (nid.length!=16){  
  alert("national id is incorrect!"); 

  return false;  
}
if (nid<1194570000000000){  
  alert("Sorry you are too old, Christians under 65 years are only allowed to pray Sunday masses during COVID-19!!!"); 

  return false;  
}
if (nid>1200580000000000){  
  alert("Sorry you are too young,only Christians above 16 years are allowed to pray Sunday masses during COVID-19!!!"); 

  return false;  
}
if(phone.length!=10){  
  alert("Phone number must be ten integers.");  
  return false;  
  }

}  
</script>

</body>
</html>