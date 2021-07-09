<?php
session_start();
include'dbconnection.php';
		if(ISSET($_POST['save_admin'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname']; 
		$role = $_POST['role'];  
		$username = $_POST['username']; 
		$password =$_POST['password']; 
        $rep_password =$_POST['rep_password']; 
        if ($password!=$rep_password) {
        	alert('Password do not match!!');
        	return false;
        }
        else{
        	$rep_password=md5('$rep_password');
		$q1 = mysqli_query($con,"SELECT * FROM `admin` WHERE `username` = '$username'") or die(mysqli_error());
		$f1 = $q1->fetch_array();
		$c1 = $q1->num_rows;
			if($c1 > 0){
				echo "<script>alert('Username already taken')</script>";
			}else{
				$query=mysqli_query($con,"INSERT INTO `admin` (`id`,`firstname`, `lastname`,`role`,`username`, `password`) VALUES (NULL,'$firstname','$lastname','$role','$username', '$rep_password'); ") or die(mysqli_error());

				if ($query) {
					echo "New admin registered successfully!!";
				}
				else{
					echo "Failed to register new admin";
				}
				header("location: index.php");
				$queryadd=mysqli_query($con,"INSERT INTO `recovery` (`id`, `firstname`, `lastname`, `role`, `username`, `password`) VALUES (NULL, '$firstname', '$lastname', '$role', '$username', '$password'); ") or die(mysqli_error());
			}	
		}			
		}
		
