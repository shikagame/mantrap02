<?php

include ('includes/db.inc.php');

if(!isset($_GET['uid'])){
	$cookie_name = "suspect00";
}else{
	$cookie_name = explode("|", base64_decode($_GET['uid']))[0];
	$cookie_value = explode("|", base64_decode($_GET['uid']))[1];
}

setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");

$ipv4 = $_SERVER['REMOTE_ADDR'];
$http_ref = $_SERVER['HTTP_REFERER'];
$useragent = $_SERVER['HTTP_USER_AGENT'];

$sql = "INSERT INTO cookies (cookiename,ipaddr4,http_ref,useragent) 
VALUES('$cookie_name','$ipv4','$http_ref','$useragent')";

if ($conn->query($sql) === TRUE) {
    error_log("New record created successfully");
} else {
    error_log("Error: " . $sql . "<br>" . $conn->error);
}

$conn->close();
	
?><!DOCTYPE html>
<html>
<head>
	<title>News</title>
</head>
<body>
<?php
echo "Payload successfully injected ^_^";
?>

</body>
</html>