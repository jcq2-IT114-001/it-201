<?php
include 'db_connect.php';

$sql = "SELECT * FROM Rental_Car";
$result = mysqli_query($con, $sql);

echo "<h2>Rental Cars</h2>";
echo "<table border='1'>
<tr>
<th>Car ID</th>
<th>Customer ID</th>
<th>Car Type</th>
<th>Make and Model</th>
</tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['car_id']}</td>
    <td>{$row['customer_id']}</td>
    <td>{$row['car_type']}</td>
    <td>{$row['make_model']}</td>
    </tr>";
}

echo "</table>";

mysqli_close($con);
?>
