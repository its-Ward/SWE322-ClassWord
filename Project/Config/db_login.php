<?php

// create connection
$conn = new mysqli("127.0.0.1:3307", "root", "", "hospital_db");
$conn->set_charset("utf8");

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
