<?php
$con = mysqli_connect("sql1.njit.edu", "jcq2", "Davidranilla3#", "jcq2");

if (!$con) {
    exit;
}

if (!isset($_GET['name'])) {
    exit;
}

$n = $_GET['name'];

$sql = "SELECT content FROM chat WHERE name=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $n);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $c);
mysqli_stmt_fetch($stmt);

echo $c;

mysqli_stmt_close($stmt);
mysqli_close($con);
?>
