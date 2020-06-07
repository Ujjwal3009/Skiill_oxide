<?php
/*
email_address
*/
$skill = "skilloxide@gmail.com";

/*
page supporting msg_box
*/
$Msg_Subject = "Skill Oxide - Webinar on Interview Preparation";
/*
This next bit loads the form field data into variables.
If you add a form field, you will need to add it here.
*/


$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$college=$_POST['college'];
$course=$_POST['course'];
$year=$_POST["yearVal"];



$msg_admin =
"New Registration for webinar".
"Name: " . $name . "\r\n" .
"Mobile: " . $mobile . "\r\n" .
"Email: " . $email . "\r\n" .
"College: " . $college. "\r\n" . 
"Course: " . $course . "\r\n" .
"Year: " . $year; 

$msg_user=
"Dear ".$name.","."\r\n".
"\r"."Greetings from Skill Oxide"."\r\n\n".
"\r"."Thank you for showing interest in the webinar. The details are as follows:"."\r\n".
"\r"."Topic: Ground Zero Preparation for Interview"."\r\n".
"\r"."Time: April 15th, 2020 (05:00 PM IST)"."\r\n".
"\r"."Joining link: https://us04web.zoom.us/j/76920085787"."\r\n".
"\r"."Or join via android/desktop app and use Meeting ID: 76920085787"."\r\n\n".
"\r"."With Warm Regards,"."\r\n".
"\r"."Team Skill Oxide"."\r\n".
"\r"."support@skilloxide.com"."\r\n";


// If the form fields are empty, redirect to the error page.
if (empty($name) || empty($mobile) || empty($email) || empty($college) || empty($course)) {
	echo json_encode('Please Fill all the fields');
}

/*
If email injection is detected, redirect to the error page.
If you add a form field, you should add it here.

elseif (isMsginjected($name) || isMsginjected($mobile) || isMsginjected($email) || isMsginjected($college)  || isMsginjected($course) || isMsginjected($year) ) {
	echo 'Oops Something Went wrong!!!';
}
*/
// If we passed all previous tests, send the email then redirect to the thank you page.
else {
	$state = TRUE;

	//Database start
	$servertitle = "localhost";
	$usertitle = "u618996845_root_1";
	$password = "skilloxide";

	try {

		$conn = new mysqli($servertitle, $usertitle, $password);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Create database
		$sql = "CREATE DATABASE IF NOT EXISTS u618996845_skilloxide ";
		if ($conn->query($sql) === True){
			$conn = new mysqli($servertitle, $usertitle, $password, "u618996845_skilloxide");
			if ($conn){
				$sqlTable = "CREATE TABLE IF NOT EXISTS webinar_interview (
						name VARCHAR(30) NOT NULL,
						mobile VARCHAR(10) NOT NULL,
						email VARCHAR(60) NOT NULL,
						college VARCHAR(30) NOT NULL,
						course VARCHAR(30) NOT NULL,
						year VARCHAR(10) NOT NULL
						)";
					if ($conn->query($sqlTable) === True){
						
						$sqlInsert = "INSERT INTO webinar_interview VALUES ("."'".$name."',".
						"'".$mobile."',".
						"'".$email."',".
						"'".$college."',".
						"'".$course."',".
						"'".$year."'
						)";

						if ($conn->query($sqlInsert) === TRUE){
						}
						else{
							echo "".$conn->error;
							$state = FALSE;
						}
					}
					
					else{
						echo "Error creating Table".$conn->error;
						$state = FALSE;
					}
				}
			else{
				echo "error";
				$state = FALSE;
			}
		} 
		
		else {
			echo "Error creating database: " . $conn->error;
			$state = FALSE;
		}

		$conn->close();

	}
	catch(Exception $e){
		echo "Connection failed: ".str($e);
	}
	finally{
		//Sent mail
		if ($state == TRUE){
			mail($skill,$Msg_Subject,$msg_admin);
			mail($email,$Msg_Subject,$msg_user);
		    echo json_encode('success');
		}
		else{
			echo json_encode('Something Went wrong');
		}
	
	}
}
?>