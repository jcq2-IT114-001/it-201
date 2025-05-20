<?php 
session_start(); 
require_once 'db_connect.php'; 

if (!isset($_SESSION['student_id'])) { 
    header("Location: check_student.php"); 
    exit(); 
} 

$studentID = $_SESSION['student_id']; 

$q = " 
    SELECT s.student_id, s.first_name, s.last_name, s.email, c.course_name, c.course_code 
    FROM students s 
    INNER JOIN enrollments e ON s.student_id = e.student_id 
    INNER JOIN courses c ON e.course_id = c.course_id 
    WHERE s.student_id = ? 
"; 

$stmt = $con->prepare($q); 
$stmt->bind_param("s", $studentID); 
$stmt->execute(); 
$stmt->store_result(); 
$stmt->bind_result($id, $first, $last, $email, $course_name, $course_code); 

if ($stmt->num_rows > 0) {
    $firstRow = true;
    $courseRows = "";

    while ($stmt->fetch()) {
        if ($firstRow) {
            echo "<h1>Student Dashboard</h1>";
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>Student ID</th><th>Name</th><th>Email</th></tr>";
            echo "<tr><td>$id</td><td>$first $last</td><td>$email</td></tr>";
            echo "</table><br>";
            $firstRow = false;

            echo "<h2>Enrolled Courses</h2>";
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>Course Code</th><th>Course Name</th></tr>";
        }

        echo "<tr><td>$course_code</td><td>$course_name</td></tr>";
    }
    echo "</table>";
} else {
    echo "No data found for this student.";
}
?>

<br>
<!-- Home / Back button -->
<a href="check_student.php"><button>Back to Home</button></a>
