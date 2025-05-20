<!DOCTYPE html>
<html>
<head>
    <title>Car Rental Database</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Light gray background color */
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            padding-top: 50px;
        }
        .container {
            text-align: center;
            padding: 20px;
        }
        button {
            background-color: #4CAF50; /* Green button */
            color: white;
            padding: 15px 32px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 10px;
        }
        button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
        button:focus {
            outline: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome to the Car Rental Database</h1>
        <button onclick="window.location.href='representative.php'">View Representatives</button>
        <button onclick="window.location.href='customer.php'">View Customers</button>
        <button onclick="window.location.href='customer_info.php'">View Customer Info</button>
        <button onclick="window.location.href='rental_car.php'">View Rental Cars</button>
        <button onclick="window.location.href='rental_dates.php'">View Rental Dates</button>
        <button onclick="window.location.href='rental_perks.php'">View Rental Perks</button>
    </div>

</body>
</html>
