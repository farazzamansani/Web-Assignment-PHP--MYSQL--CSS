<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS Style/mystyle.css">
<title>Contact Us</title>
</head>

<body>
<h1>Contact Us</h1>
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

<ul>
<li>ACT <br /> Phone: 09986767 <br /> Email: ACT@education.Faraz.edu.au</li><br />
<li>NSW <br />Phone: 09986767 <br /> Email: NSW@education.Faraz.edu.au</li><br />
<li>NT <br />Phone: 09986768 <br /> Email: NT@education.Faraz.edu.au</li><br />
<li>QLD <br />Phone: 09986769 <br /> Email: QLD@education.Faraz.edu.au</li><br />
<li>SA <br />Phone: 09986770 <br /> Email: SA@education.Faraz.edu.au</li><br />
<li>TAS <br />Phone: 09986771 <br /> Email: TAS@education.Faraz.edu.au</li><br />
<li>VIC <br />Phone: 09986772 <br /> Email: VIC@education.Faraz.edu.au</li><br />
<li>WA <br />Phone: 09986773 <br /> Email: WA@education.Faraz.edu.au</li><br />
</ul>

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
//connect to database
include("session.php");
if(isset($_POST['Logout'])){
	
	echo "loged out";
	session_unset(); 
	
}
	?>
</extra>
</html>
