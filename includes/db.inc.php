<?php

$DB_HOST = '127.0.0.1';
$DB_NAME = 'mantrap_01';
$DB_USER = 'root';
$DB_PASS = 'root';

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 