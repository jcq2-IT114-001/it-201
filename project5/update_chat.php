<?php
$con = mysqli_connect("sql1.njit.edu", "jcq2", "*********", "jcq2");

if (!$con) {
    echo "DB error";
    exit;
}

if (!isset($_POST['name']) || !isset($_POST['password']) || !isset($_POST['content'])) {
    echo "Missing data";
    exit;
}

$n = $_POST['name'];
$p = $_POST['password'];
$c = $_POST['content'];

$sql = "UPDATE chat SET content=? WHERE name=? AND password=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "sss", $c, $n, $p);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Updated";
} else {
    echo "Failed";
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>
