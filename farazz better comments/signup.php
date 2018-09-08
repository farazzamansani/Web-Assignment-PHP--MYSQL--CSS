<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="CSS Style/mystyle.css">
<title>Sign Up</title>
</head>
<body>
<h1> Sign Up</h1>
<!--navigation bar-->
<table align="center" width="1000" border="0">
    <tr></tr>
    <tr>
        <td width="129" height="111"><table align="center" width="547" border="0">
                <tr>
                    <td width="129" height="79"><a href="Home Page.php"><img src="Images/Homepage1.png" alt="button" width="128" height="64" border="0" align="left" /></a></td>
                    <td width="128"><a href="Student Feedback.php"><img src="Images/studentfeedback.png" alt="button" width="128" height="64" border="0" /></a></td>
                    <td width="587"><a href="Contact Us.php"><img src="Images/Contactus1.png" alt="button" width="128" height="64" border="0" /></a></td>
                
                <td width="587"><a href="admin.php"><img src="Images/administration.png" alt="button" width="128" height="64" border="0" /></a></td>      
                
                <td width="587"><a href="myarea.php"><img src="Images/myarea.png" alt="button" width="128" height="64" border="0" /></a></td>
                <td width="587"><a href="signup.php"><img src="Images/signup.png" alt="button" width="128" height="64" border="0" /></a></td>  
                <td width="587"><a href="login.php"><img src="Images/login.png" alt="button" width="128" height="64" border="0" /></a></td>
                </tr>
            </table>
            <a href="Home Page.html"></a></td>
    </tr>
</table>



<form action="" method="post">    
               <select name="year" id="year">
               <?php
			   $year=1100;
			   while ($year<2017)
			   {
			   ?>
                  <option value="<?php $year ?>"><?php echo $year ?></option>
                  <?php
			   $year=$year+1;
			   }
			   ?>
               <option value="2" selected="selected">Please Select year</option>
               </select>         
  
               <select name="month" id="month">
                  <option value="1"> January</option>
                  <option value="2"> February</option>
                  <option value="3"> March</option>
                  <option value="4"> April</option>
                  <option value="5"> May</option>
                  <option value="6"> June</option>
                  <option value="7"> July</option>
                  <option value="8"> August</option>
                  <option value="9"> September</option>
                  <option value="10"> October</option>
                  <option value="11"> November</option>
                  <option value="12"> December</option>
               <option value="13" selected="selected">Please Select a Month</option>
               </select>                  
  
               <select name="day" id="day">
               <?php
			   $day=1;
			    while($day<32)
			   {?>
                  <option value="<?php echo $day; ?>"> <?php echo $day ?></option>
                  <?php 
				  $day=$day+1;
				  } ?>
               <option value="0" selected="selected">Please Select a day</option>
               </select>                  
 <p>
    
        <label for="Username">Username:</label>
        <input type="text" name="username" id="username">
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="text" name="pass1" id="password">
        <br>
        <label for="retypepassword">Retype Password:</label>
      <input type="text" name="pass2" id="retypepassword">
    </p>
    <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" id="fullName">

        <br>
        <br>
        
        <label for="email">Email (optional):</label>
        <input type="text" name="email" id="email">
        
        <br>
        <br>
        
<input type="submit" name="submit" value="Submit">
<input type="reset" value="Reset">
</form>


<?php
include('db_conn.php');
include("session.php");
$errors=0;
if (isset($_POST['submit']))
{
	 $var1=($_POST['username']);
	 $var2=($_POST['pass1']);
	 $var3=($_POST['pass2']);
	 $name=($_POST['fullname']);
	 $email=($_POST['email']);
	 
	$tablequery="SELECT * FROM users";
$result=$mysqli->query($tablequery);

if ($var2!=$var3)
{
	echo "passwords do not match";
	$errors=1;
}

if (isset($_POST['day'])) 
{ 
   echo "button 1 has been pressed"; 
} 

while ($row=$result->fetch_array(MYSQLI_ASSOC))
{
	
	
	$id=$row['Username'];
	//echo "$id	";
	if ($id==$var1)
	{
			echo "username already in database";
		$errors=1;
	}


}
if($var2!=$var3)
{
	echo "passwords do not match";
		$errors=1;
}
if($var2==""){
    	echo " Please type the password"."<br/>";
		$errors=1;
    }
    elseif(strlen($var2)<8 ){
    	//if the password is under 6 and over 8 characters
    	echo " The password must be 8 characters or more"."<br/>";
		$errors=1;
    }
    elseif(!preg_match("#[0-9]+#", $var2)){
    	//if the password does not include any number
    	echo " Password must include at least one number!<br/>";
		$errors=1;
	}
	if((!$name ))
    {
        echo "You have not entered your name"; 
		$errors=1;
		
	}
	if(!$var1)
	{
		echo "you have not entered your username";
		$errors=1;
	}
//create stuff
if ($errors==0)
{
	$day=$$_POST['day'];
	
	$month=$_POST['month'];
	$year=$_POST['year'];
	
	/*$dob="{$year}-{$month}-{$day}"; 
	i cant extraxt day or year from my form so i just put in random values for year and day
	*/
$dob="1996-{$month}-21";
$encrypt_password=MD5($var2);
$var2=$encrypt_password;
$sql = "INSERT INTO users (Username, Password, Name, access,email,DOB) VALUES ('$var1', '$var2','$name', '2','$email','$dob')";
if(mysqli_query($mysqli, $sql)){
	echo "You have succesfully registered your account<br>";
	echo "User Name:";
	echo $var1;
	echo "<br>";
	echo "Pass1:";
	echo $var2;
	$_SESSION["acess"] =$row['access'];
	$_SESSION["user"] =$row['Username'];
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
}
//done creating


?>




</body>
<footer>
<br />
<p> Faraz Zamansani </p>
<p> 386070</p>
</footer>
<extra>

<form action="" method="post">
<input type="submit" name="Logout" value="Logout">
</form>
<?php
if(isset($_POST['Logout'])){
	
	echo "loged out";
	session_unset(); 
	
}
}
	?>
</extra>
</html>