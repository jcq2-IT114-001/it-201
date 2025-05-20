<?php
include 'db_connect.php';

$sql = "SELECT * FROM Rental_Perks";
$result = mysqli_query($con, $sql);

echo "<h2>Rental Perks</h2>";
echo "<table border='1'>
<tr>
<th>Perk ID</th>
<th>Customer ID</th>
<th>Insurance</th>
<th>Additional Features</th>
<th>Additional Driver</th>
</tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['perk_id']}</td>
    <td>{$row['customer_id']}</td>
    <td>{$row['insurance']}</td>
    <td>{$row['additional_features']}</td>
    <td>{$row['additional_driver']}</td>
    </tr>";
}

echo "</table>";

mysqli_close($con);
?>
