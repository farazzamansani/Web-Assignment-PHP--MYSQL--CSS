<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="CSS Style/mystyle.css">
<title>Admin</title>
<title>Admin</title>
</head>
<body>
<h1> Admin</h1>
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

<?php
//connect to database and session
include("db_conn.php");
include("session.php");
if($_SESSION['access']==0||$_SESSION['access']==2)
{
	echo "sorry you are not authorised to view this page, please login with an admin account!";
	?>   
   <br>
    <a href="login.php">Click here to Log In!</a>
   
    <?php
}
else
{

?>

<form action="" method="post">
    
    <p>
        <label for="Username">Username:</label>
        <input type="text" name="username" value="<?php echo $_SESSION["user"]; ?>" disabled>
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="text" name="pass1" id="password">
        <br>
        <br>
        
       
<input type="submit" name="submit" value="Submit">
</form>


<?php
if(isset($_POST['submit']))
{
	$list_query = "SELECT * FROM users ORDER BY Name ASC";
	$result= $mysqli->query($list_query);
	while ($row=$result->fetch_array(MYSQLI_ASSOC))
{
	
	$id=$row['ID'];
	$username=$row['Username'];
	$dbpass=$row['Password'];
	$name=$row['Name'];
	$dob=$row['DOB'];
	$email=$row['Email'];
	$access=$row['access'];
	
	
	if ($username==$_SESSION["user"])
	{
	$encrypt_password=MD5($_POST['pass1']);
	 $postpass=$encrypt_password;
		if ($dbpass==$postpass)
		{
	$list_query2 = "SELECT * FROM users ORDER BY Name ASC";
	$result2= $mysqli->query($list_query2);
	while ($row=$result2->fetch_array(MYSQLI_ASSOC))
	{
	$id=$row['ID'];
	$username=$row['Username'];
	$dbpass=$row['Password'];
	$name=$row['Name'];
	$dob=$row['DOB'];
	$email=$row['Email'];
	$access=$row['access'];
			
			?>
			<form action="" method="post">
            <label for="ID">ID:</label>
            <input type="text" name="id" value="<?php echo $id; ?>" >
            <br>
            <label for="Username">Username:</label>
            <input type="text" name="Username" value="<?php echo $username; ?>" disabled>
            <br>
             <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>" >
            <br>
             <label for="dob">DOB:</label>
            <input type="text" name="dob" value="<?php echo $dob; ?>" >
            <br>
             <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <br>
            <label for="Access">Access:</label>
            <select name="access">
            <?php if($access==1){?>
            
            <option value="Admin">Admin</option>
            <option value="General">General</option>
            <?php } ?>
            <?php if($access==2){?>
            
            <option value="General">General</option>
            <option value="Admin">Admin</option>
            <?php } ?>
</select>
            <br>
            
<input type="submit" name="Edit" value="Edit">
<input type="reset" value="Reset">
<br><br>
			</form>
			<?php
	}

		}
		else
		{
			echo "WRONG PASSWORD";
		}
	}
}
	
}

	if(isset($_POST['Edit']))
{
	echo "edited";
	$name=$_POST['name'];
	$email=$_POST['email'];
	$dob=$_POST['dob'];
	$access=$_POST['access'];
	if($access=="Admin")
	{
		$access=1;
	}
	else
	$access=2;
	$id=$_POST['id'];
	echo "Database has been updated!";
	$updatequery = "UPDATE users SET Name='$name', Email='$email', DOB='$dob', access='$access' WHERE ID='$id'";
	$mysqli->query($updatequery);
	$list_query = "SELECT * FROM users ORDER BY Name ASC";
	$result= $mysqli->query($list_query);
	while ($row=$result->fetch_array(MYSQLI_ASSOC))
{
	
	$id=$row['ID'];
	$username=$row['Username'];
	$dbpass=$row['Password'];
	$name=$row['Name'];
	$dob=$row['DOB'];
	$email=$row['Email'];
	$access=$row['access'];
	
	
	if ($username==$_SESSION["user"])
	{
		
		
	$list_query2 = "SELECT * FROM users ORDER BY Name ASC";
	$result2= $mysqli->query($list_query2);
	while ($row=$result2->fetch_array(MYSQLI_ASSOC))
	{
	$id=$row['ID'];
	$username=$row['Username'];
	$dbpass=$row['Password'];
	$name=$row['Name'];
	$dob=$row['DOB'];
	$email=$row['Email'];
	$access=$row['access'];
			
			?>
			<form action="" method="post">
            <label for="ID">ID:</label>
            <input type="text" name="id" value="<?php echo $id; ?>" >
            <br>
            <label for="Username">Username:</label>
            <input type="text" name="Username" value="<?php echo $username; ?>" disabled>
            <br>
             <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>" >
            <br>
             <label for="dob">DOB:</label>
            <input type="text" name="dob" value="<?php echo $dob; ?>" >
            <br>
             <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <br>
            <label for="Access">Access:</label>
            <select name="access">
            <?php if($access==1){?>
            
            <option value="Admin">Admin</option>
            <option value="General">General</option>
            <?php } ?>
            <?php if($access==2){?>
            
            <option value="General">General</option>
            <option value="Admin">Admin</option>
            <?php } ?>
</select>
            <br>
            
<input type="submit" name="Edit" value="Edit">
<input type="reset" value="Reset">
<br><br>
			</form>
			<?php
	}			
}	
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
<?php
if($_SESSION['access']==1||$_SESSION['access']==2)
{
	?>
<form action="" method="post">
<input type="submit" name="Logout" value="Logout">
</form>
<?php
}

if(isset($_POST['Logout'])){
	
	echo "loged out";
	session_unset(); 
	
}
}

	?>
</extra>
</html>