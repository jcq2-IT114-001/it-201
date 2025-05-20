<?php
include 'db_connect.php';

$sql = "SELECT * FROM Customer";
$result = mysqli_query($con, $sql);

echo "<h2>Customers</h2>";
echo "<table border='1'>
<tr>
<th>Customer ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Representative ID</th>
</tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['customer_id']}</td>
    <td>{$row['first_name']}</td>
    <td>{$row['last_name']}</td>
    <td>{$row['rep_id']}</td>
    </tr>";
}

echo "</table>";

mysqli_close($con);
?>
