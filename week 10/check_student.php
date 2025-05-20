<?php 
session_start(); 
require_once 'db_connect.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $studentID = trim($_POST['student_id']); 

    if (!empty($studentID)) { 
        $stmt = $con->prepare("SELECT student_id FROM students WHERE student_id = ?"); 
        $stmt->bind_param("s", $studentID); 
        $stmt->execute(); 
        $stmt->store_result(); 

        if ($stmt->num_rows > 0) { 
            $_SESSION['student_id'] = $studentID; 
            header("Location: student_dashboard.php"); 
            exit(); 
        } else { 
            echo "<script>alert('Student ID not found.');</script>"; 
        } 
    } else { 
        echo "<script>alert('Please enter a Student ID.');</script>"; 
    } 
} 
?> 

<!-- HTML Form for Student ID --> 
<form method="post"> 
    <label>Student ID:</label> 
    <input type="text" name="student_id" required> 
    <button type="submit">Submit</button> 
</form>
