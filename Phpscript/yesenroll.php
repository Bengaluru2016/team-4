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
		$natcontno=$_POST['contno'];
		
		
		
		if($suveryer_name == 'suveryer_name' || $survey_locality == 'survey_locality' || $student_name == 'student_name' || $dob == 'dob' || $age == 'age'|| $gender == 'gender'|| $no_of_siblings == 'no_of_siblings' || $Mother_tongue == 'Mother_tongue'||  $education_level == 'education_level' || $previous_occupation=='previous_occupation'){
			echo 'please fill all values';
		}else{
			require_once('dbConnect.php');
			$sql = "SELECT * FROM student WHERE student_name='$student_name'";
			
			$check = mysqli_fetch_array(mysqli_query($con,$sql));
			
			if(isset(!check)){
				echo 'username does not exist'
			}else{				
				$sql = "UPDATE `student` SET `enrolled`=[yes] WHERE name=$name";
				if(mysqli_query($con,$sql)){
					echo 'successfully registered';
				}else{
					echo 'oops! Please try again!';
				}
			}
			mysqli_close($con);
		}
?>
