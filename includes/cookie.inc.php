<?php

$cookie_name = "suspect01";
$cookie_value = "Person00 root";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day