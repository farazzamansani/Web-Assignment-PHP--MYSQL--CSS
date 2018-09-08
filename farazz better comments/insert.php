<?php
include("session.php");

$link = mysqli_connect("localhost", "farazz", "386070", "farazz");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 


$gender_gender = mysqli_real_escape_string($link, $_POST['gender']);
$state_aus = mysqli_real_escape_string($link, $_POST['state']);
$city_aus = mysqli_real_escape_string($link, $_POST['city']);
$satisfaction = mysqli_real_escape_string($link, $_POST['satisfaction']);

// attempt insert query execution
$sql = "INSERT INTO feedback (ID,gender,state,City,Satisfaction) VALUES ('$session_id','$gender_gender','$state_aus','$city_aus','satisfaction')";
if(mysqli_query($link, $sql)){
	//successfully inserted display what has been inserted to user
    echo "Your form has been successfully submitted<br>";
	echo "Your provided information:<br>";
	echo "First Name:";
	echo $first_name;
	echo "<br>";
	echo "Last Name:";
	echo $last_name;
	echo "<br>";
	echo "Email:";
	echo $email_address;
	echo "<br>";
	echo "Gender:";
	echo $gender_gender;
	echo "<br>";
	echo "State:";
	echo $state_aus;
	echo "<br>";
} else{
	//did not successfully insert, display error message so we know whats up
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>