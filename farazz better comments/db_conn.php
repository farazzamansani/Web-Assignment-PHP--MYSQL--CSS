<?php
//connect to mysql using my login info
$mysqli = new mysqli('localhost', 'farazz', '386070', 'farazz');

if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
?>