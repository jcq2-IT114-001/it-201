<?php
include 'db_connect.php';

$sql = "SELECT * FROM Representative";
$result = mysqli_query($con, $sql);

echo "<h2>Representatives</h2>";
echo "<table border='1'>
<tr>
<th>Representative ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Phone</th>
<th>Email</th>
</tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['rep_id']}</td>
    <td>{$row['first_name']}</td>
    <td>{$row['last_name']}</td>
    <td>{$row['phone']}</td>
    <td>{$row['email']}</td>
    </tr>";
}

echo "</table>";

mysqli_close($con);
?>
