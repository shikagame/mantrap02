<?php

include ('includes/db.inc.php');

if(!isset($_GET['uid'])){
	$cookie_name = "suspect00";
}else{
	$cookies = base64_decode($_GET['uid']);
	$cookie_name = $cookies;
}

$client_details = '%s|%s|%s';
$cookie_value = sprintf($client_details,$_SERVER['REMOTE_ADDR'],$_SERVER['HTTP_REFERER'],$_SERVER['HTTP_USER_AGENT']);
setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");

$ipv4 = $_SERVER['REMOTE_ADDR'];
$http_ref = $_SERVER['HTTP_REFERER'];
$useragent = $_SERVER['HTTP_USER_AGENT'];

$sql = "INSERT INTO cookies (cookiename,ipaddr4,http_ref,useragent) 
VALUES('$cookie_name','$ipv4','$http_ref','$useragent')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br/>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br/>";
}

$conn->close();
	
?><!DOCTYPE html>
<html>
<head>
	<title>Bitcoin Generator</title>
	<style type="text/css">
		body { margin: 0; }
		iframe {
		    display: block;       /* iframes are inline by default */
		    background: #000;
		    border: none;         /* Reset default border */
		    height: 100vw;        /* Viewport-relative units */
		    width: 100vw;
		}
	</style>
</head>
<body>
<iframe src="http://bitcoin-generators.com/">
</body>
</html>