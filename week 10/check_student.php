<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'db_connect.php';

$studentData = [];
$studentFound = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentID = trim($_POST['student_id']);

    if (!empty($studentID)) {
        $sql = "
            SELECT s.first_name, s.last_name, s.email, c.course_name, c.course_code
            FROM students s
            INNER JOIN enrollments e ON s.student_id = e.student_id
            INNER JOIN courses c ON e.course_id = c.course_id
            WHERE s.student_id = ?
        ";

        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $studentID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0) {
                mysqli_stmt_bind_result($stmt, $first_name, $last_name, $email, $course_name, $course_code);
                $studentFound = true;
                while (mysqli_stmt_fetch($stmt)) {
                    $studentData[] = [
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'course_name' => $course_name,
                        'course_code' => $course_code
                    ];
                }
            } else {
                echo "<script>alert('Student ID not found.');</script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Prepare failed: " . mysqli_error($con);
        }
    } else {
        echo "<script>alert('Please enter a Student ID.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Check Student</title>
</head>
<body>
    <form method="post">
        <label>Student ID:</label>
        <input type="text" name="student_id" required>
        <button type="submit">Submit</button>
    </form>

    <?php if ($studentFound): ?>
        <h2>Student Information</h2>
        <table border="1">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Course Name</th>
                <th>Course Code</th>
            </tr>
            <?php foreach ($studentData as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['first_name']) ?></td>
                    <td><?= htmlspecialchars($row['last_name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['course_name']) ?></td>
                    <td><?= htmlspecialchars($row['course_code']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <a href="check_student.php">Back</a>
    <?php endif; ?>
</body>
</html>
