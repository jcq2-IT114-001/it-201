<?php
include 'db_connect.php';

$sql = "SELECT * FROM Customer_Info";
$result = mysqli_query($con, $sql);

echo "<h2>Customer Personal Information</h2>";
echo "<table border='1'>
<tr>
<th>Customer ID</th>
<th>Street Address</th>
<th>City</th>
<th>State</th>
<th>Zip Code</th>
<th>Phone</th>
</tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['customer_id']}</td>
    <td>{$row['street_address']}</td>
    <td>{$row['city']}</td>
    <td>{$row['state']}</td>
    <td>{$row['zip_code']}</td>
    <td>{$row['phone']}</td>
    </tr>";
}

echo "</table>";

mysqli_close($con);
?
