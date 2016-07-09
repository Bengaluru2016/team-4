<?php
        $username = $_GET['username'];
		$password = $_GET['password'];
		
		if($username == '' || $password == ''){
			echo 'please fill all values';
		}else{
			require_once('dbConnect.php');
			$sql = "SELECT * FROM regdata WHERE username='$username' OR password='$password'";
			
			$check = mysqli_fetch_array(mysqli_query($con,$sql));
			
			if(isset($check)){
				echo 'username already exist';
			}else{				
				$sql = "INSERT INTO regdata (username,password) VALUES('$username','$password')";
				if(mysqli_query($con,$sql)){
					echo 'successfully registered';
				}else{
					echo 'oops! Please try again!';
				}
			}
			mysqli_close($con);
		}