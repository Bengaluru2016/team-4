<?php
		$suveryer_name = $_POST['suveryer_name'];
		$survey_locality = $_POST['survey_locality'];
		$student_name = $_POST['student_name'];
		$dob = $_POST['dob'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$no_of_siblings = $_POST['no_of_siblings'];
		$Mother_tongue = $_POST['Mother_tongue'];
		$education_level = $_POST['education_level'];
		$previous_occupation = $_POST['previous_occupation'];
		$reason=$_POST['reason'];
		$fatname=$_POST['fatname'];
		$fatocc=$_POST['fatocc'];
		$fatinc=$_POST['fatinc'];
		$fatmobno=$_POST['fatmobno'];
		$motname=$_POST['motname'];
		$motocc=$_POST['motocc'];
		$motinc=$_POST['motmobno'];
		$natstate=$_POST['natstate'];
		$natdist=$_POST['natdist'];
		$nataddr=$_POST['nataddr'];
		$natcontno=$_POST['contno'];$folder = "images/";

move_uploaded_file($_FILES["filep"]["tmp_name"] , "$folder".$_FILES["filep"]["name"]);

		
		if($suveryer_name == '' || $survey_locality == '' || $student_name == '' || $dob == '' || $age == ''|| $gender ==''|| $no_of_siblings == '' || $Mother_tongue == ''||  $education_level == '' || $previous_occupation==''){
			echo 'please fill all values';
		}else{
			require_once('dbConnect.php');
			$sql = "SELECT * FROM student WHERE student_name='$student_name'";
			
			$check = mysqli_fetch_array(mysqli_query($con,$sql));
			
			if(isset($check)){
				echo 'username or email already exist';
			}else{				
				$sql = "INSERT INTO student ('suveryer_name','locality','name','imgpath','dob','age','gender','nos',mtongue','edulevel','occbefore','reason','fatname','fatocc','fatinc','fatmobno','motname','motocc','motinc','motmobno','natstate','natdist','nataddr','natcontno') VALUES('$suveryer_name','$survey_locality','$student_name','".$_FILES['filep']['name']."','$dob','$age','gender','$no_of_siblings','$Mother_tongue','$education_level','$previous_occupation','$reason','$fatname','$fatocc','$fatinc','$fatmobno','$motname','$motocc','$motinc','$natstate','$natdist','$nataddr','$natcontno')";
				if(mysqli_query($con,$sql)){
					echo 'successfully registered';
				}else{
					echo 'oops! Please try again!';
				}
			}
			mysqli_close($con);
		}
?>