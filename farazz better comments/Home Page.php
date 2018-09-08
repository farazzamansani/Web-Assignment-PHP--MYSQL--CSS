<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS Style/mystyle.css">
<title>Home Page</title>
<?php
//connect to database and session
include("db_conn.php");
include("session.php");
?>
</head>

<body>
<h1>Home Page</h1>
<!-- Navigation bar-->
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
//grab all the users from database
	$list_query = "SELECT * FROM users ORDER BY Name ASC";
	$result= $mysqli->query($list_query);
	?>
    
<ul>
    <?php
/*
grab all the data from user in database 
if user has admin access display them 
then move to next database entry
*/
   	while($row= $result->fetch_array(MYSQLI_ASSOC)){
   	$id=$row['ID'];
   	$name=$row['Name'];
	$access=$row['access'];
	$username=$row['Username'];
	$email=$row['Email'];
	$dob=$row['DOB'];
	if($access==1)           {
?>
<li>
       Name:"<?php echo $name; ?>" 
       Access: <?php echo $access ?>
        <ul>
                <li>Email <?php echo $email; ?></li>  
                <li>DOB <?php echo $dob; ?></li> 
                  
       </ul>
</li>
<br />
        
       
<?php }} ?>
</ul>



<!--site description-->

<p>Welcome to Evans class for cool kids! <br> This is a very special class ran by head lecturer Evan Goold.</p>
<p>There are 3 levels of access on this site, Level 0 (general acccess) this is the access level for anyone not logged in, Level 1 is admin access only the lecturers have this access, and Level 2 is student access.<br /><br />
For marking purposes you can log in with Username:carenk (no caps) password:12345678 for admin access<br />
Username:Bob(capital B) password:12345678 for student level access (or sign up with a new account)<br />
For general access you can click the log out button at the bottom of any page.
<table align="center" width="1336" border="0">
    <tr>
        <td width="1330" height="530"><table align="center" width="300" border="0">
                <tr>
                    <td width="300" height="450"><img id="evan" img src="Images/photo1.jpg" alt="button" width="300" height="450" border="0" align="left" /></a></td>
                    <td width="300"><img id="jonno" img src="Images/supportlecturer1.jpg" alt="button" width="319" height="450" border="0" /></a></td>
                    <td width="300"><img id="kevin" img src="Images/supportlecturer2.jpg" alt="button" width="300" height="450" border="0" /></a></td>
                </tr>
            </table>
            <a href="Home Page.html">
            <evandescrip>Evan Goold is the head lecturer for this unit, he enjoys long walks in longford and teaching young minds who are eager to learn.</evandescrip>
            <jonnodescrip>Jonathan Calcraft is a support lecturer for this unit, he mainly assists students with one on one learning.</jonnodescrip>
        <kevindescrip>Kevin Exton runs the tutorials for this unit. "I look forward to seeing you all there!"-Kevin</kevindescrip></td>
    </tr>
</table>

<!--display current date and time (this was for first assignment not sure if this one needs or nnot-->
<p>Current Date and Time</p>
<p id="date"></p>
<p id="time"></p>
<script>
var d = new Date();
document.getElementById("date").innerHTML = d.toDateString();
document.getElementById("time").innerHTML = d.toTimeString();


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
//script for showing the teachers descriptions (needed for assignment 1 (and 2?))
$("evandescrip").hide();
$("jonnodescrip").hide();
$("kevindescrip").hide();
$(document).ready(function(){
    $("#evan").click(function(){
        $("evandescrip").toggle();
		$("jonnodescrip").hide();
		$("kevindescrip").hide();
		
    });
	$("#jonno").click(function(){
        $("jonnodescrip").toggle();
		$("evandescrip").hide();
		$("kevindescrip").hide();
    });
	$("#kevin").click(function(){
        $("kevindescrip").toggle();
		$("jonnodescrip").hide();
		$("evandescrip").hide();
    });
});
$(document).ready(function(){
    $("li").click(function(){
        $(this).children().toggle();
    });
});
</script>

</body>
<footer>
<br />
<!--my student information-->
<p> Faraz Zamansani </p>
<p> 386070</p>
</footer>
<extra>
<!-- extra section containing logout button-->
<form action="" method="post">
<input type="submit" name="Logout" value="Logout">
</form>
<?php
if(isset($_POST['Logout'])){
//if user clicks logout button unset session which contains login
	echo "loged out";
	session_unset(); 
}
	?>
</extra>
</html>
