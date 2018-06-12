<?php

	include 'includes/db.inc.php';
	
?><html>
<title>ManTrap r2</title>
<body>
<?php

$sql = "SELECT * FROM cookies";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        foreach ($_COOKIE as $key=>$val) {
        	if ($key == $row['cookiename']){
        		$relational_db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        		if ($relational_db->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

				$cookieid = $row['cookieid'];
				$cookiename = $key;
				$ipv4 = $_SERVER['REMOTE_ADDR'];
				$http_ref = $_SERVER['HTTP_REFERER'];
				$useragent = $_SERVER['HTTP_USER_AGENT'];

				$injSql = "INSERT INTO cookiematch (cookieid,cookiename,ipaddr4,http_ref,useragent) ";
				$injSql .= "VALUES($cookieid,'$cookiename','$ipv4','$http_ref','$useragent')";

				if ($relational_db->query($injSql) === TRUE) {
				    error_log("New record created successfully");
				} else {
				    error_log("Error: " . $injSql . "<br>" . $relational_db->error);
				}

				$relational_db->close();

				echo "<h1>$val</h1>";
        	}
        }
    }
}

$conn->close();
?>
</body>
</html>