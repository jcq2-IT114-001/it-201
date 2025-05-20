<?php
$servername = "sql1.njit.edu";
$username = "jcq2";
$password = "***********";
$dbname = "jcq2";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
