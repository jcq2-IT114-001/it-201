<?php
include 'db_connect.php';

$sql = "SELECT * FROM Rental_Dates";
$result = mysqli_query($con, $sql);

echo "<h2>Rental Dates</h2>";
echo "<table border='1'>
<tr>
<th>Rental ID</th>
<th>Customer ID</th>
<th>Start Date</th>
<th>End Date</th>
</tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['rental_id']}</td>
    <td>{$row['customer_id']}</td>
    <td>{$row['start_date']}</td>
    <td>{$row['end_date']}</td>
    </tr>";
}

echo "</table>";

mysqli_close($con);
?>
