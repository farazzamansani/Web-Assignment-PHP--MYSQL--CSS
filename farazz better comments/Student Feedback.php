<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS Style/mystyle.css">

<title>Student Feedback</title>

</head>

<body>
<h1>Student Feedback</h1>
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
include("db_conn.php");
include("session.php");
if($_SESSION['access']==0)
{
	echo "sorry you are not authorised to view this page, please login or sign up!";
	?>
    <br>
   <a href="signup.php">Click here to Sign Up!</a>
   <br>
    <a href="login.php">Click here to Log In!</a>
   
    <?php
}
else
{
?>


<form action="" method="post">
 
 <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript">
//code for the two dropdown menus with the second appearing after the first has been entered
      function setup_state_change(){
         $('#state').change(update_cities);
      }
      function update_cities(){
         var state = $('#state').val();
         $.get('get_cities.php?state='+state,show_cities);
      }
      function show_cities(cities){
         $('#cities').html(cities);
      }
      $(document).ready(setup_state_change);
   
   </script>
   <br />
   <form id="select_state" name="select_state" method="" action="#">
      <table>
         <tr>
            <th>State: </th>
            <td>
               <select name="state" id="state">
                  <option value="" selected="selected">Please Select State</option>
                  <option value="ACT">ACT</option>
                  <option value="NSW">NSW</option>
                  <option value="NT">NT</option>                  
                  <option value="QLD">QLD</option>
                  <option value="TAS">TAS</option>
                  <option value="VIC">VIC</option>
                  <option value="WA">WA</option>
               </select>
            </td>
         </tr>
         <tr>
            <th>City: </th>
            <td id="cities">Please Select State First</td>
         </tr>
      </table>
   
<br />
  
<input type="radio" name="gender" value="male" checked> Male<br>
<input type="radio" name="gender" value="female"> Female<br> 
<br />
  
<input type="radio" name="satisfaction" value="satisfied" checked> Satisfied<br>
<input type="radio" name="satisfaction" value="notsatisfied"> Not Satisfied<br>

  
<input type="submit" name="submit" value="Submit">
<input type="reset" value="Reset">
</form>
<?php



if(isset($_POST['submit']))
{
	$first_name=$_POST['firstname'];
	$last_name=$_POST['lastname'];
	$gender=$_POST['gender'];
	$satisfaction=$_POST['satisfaction'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	
	//if all the required fields have not been entered tell the user and dont insert into database
	if((!$state || !$city || !$gender || !$satisfaction ))
    {
        echo "You have not entered all the required details."; 
		
	}
	else
	{
		echo "Form Submitted";
$list_query = "INSERT INTO feedback (gender,state,City,Satisfaction) VALUES ('$gender','$state','$city','$satisfaction')";
$result= $mysqli->query($list_query);
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
