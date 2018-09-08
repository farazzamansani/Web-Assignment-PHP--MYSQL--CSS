<html>
<head>
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="CSS Style/mystyle.css">
</head>
<body>
<center>

<h2>Log In</h2>
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

Please Login to system
</center>

<form method="post" action="">
    
    <p>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username">
    </p>
    <p>
      <label for="password">Password</label>
      <input type="text" name="password" id="password">
    </p>
    
  <input type="submit" value="Submit" name="submit" id="submit">
  <input type="button" value="Sign Up" onClick="window.location.href='signup.php'" />
</form>
<?php
include('session.php');
include('db_conn.php'); //db connection

$found=2;
if (isset($_POST['submit']))
{
	 $var1=($_POST['username']);
	 $var2=($_POST['password']);
	 $encrypt_password=MD5($var2);
	 $var2=$encrypt_password;
	$tablequery="SELECT * FROM users";
$result=$mysqli->query($tablequery);

if ($found==2)
{
while ($row=$result->fetch_array(MYSQLI_ASSOC))
{
	
	
	$id=$row['Username'];
	//echo "$id	";
	$user=$row['Password'];
	//echo "$user	";

	if ($id==$var1)
	{
		if ($user==$var2)
		{
			$found=1;
			$_SESSION["access"] =$row['access'];
			$_SESSION["user"] =$row['Username'];
			$_SESSION["id"] =$row['ID'];
			

		}
	}

}

}
if ($found==1)
{
	//welcomes the user after they have logged in
	echo "welcome " . $_SESSION["user"] ;
	?>
    <a href="myarea.php">Go to My area?</a>
    <?php
	if ($_SESSION["access"] ==1)
	{
	?>
    <a href="myarea.php">Go to Admin?</a>
    
    <?php
	
	}
	?>
	<form action="" method="post">
<input type="submit" name="Logout" value="Logout">
</form>
<?php
	if(isset($_POST['Logout'])){
	
	echo "loged out";
	session_unset(); 
	
    }
}
if ($found==2)
{
	echo "Invalid Username/Password";
}
}
?>

</body>
<footer>
<br />
<p> Faraz Zamansani </p>
<p> 386070</p>
</footer>
<extra>



</extra>
</html>
