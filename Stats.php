<?php include('db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details Graph</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        canvas {
            max-width: 45%; /* Adjust the width as needed */
            max-height: 80vh; /* Adjust the height as needed */
            padding: 20px;
        }
    </style>
</head>
<body>

<?php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// graph one for total price of orders

// Query to fetch data from the order_details table
$sql = "SELECT order_date, total_price FROM order_details";
$result = $conn->query($sql);

// Fetch data and format it for the chart
$labels = [];
$data = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = $row['order_date'];
    $data[] = $row['total_price'];
}




// graph two for quantity of each order item

// Query to fetch data from the order_details table
$sqlItemQuantity = "
    SELECT i.item_name, od.quantity
    FROM order_details od
    JOIN items i ON od.item_id = i.item_id
";

$resultItemQuantity = $conn->query($sqlItemQuantity);

// Fetch data and format it for the chart
$labelsItemQuantity = [];
$dataItemQuantity = [];

while ($rowItemQuantity = $resultItemQuantity->fetch_assoc()) {
    $labelsItemQuantity[] = $rowItemQuantity['item_name'];
    $dataItemQuantity[] = $rowItemQuantity['quantity'];
}



// graph three for total spending of each user
$sqlUserSpending = " SELECT u.first_name, SUM(od.total_price) AS total_spent
    FROM users u
    LEFT JOIN order_details od ON u.user_id = od.user_id
    GROUP BY u.user_id
";

$resultUserSpending = $conn->query($sqlUserSpending);

$labelsUserSpending = [];
$dataUserSpending = [];

while ($rowUserSpending = $resultUserSpending->fetch_assoc()) {
    $labelsUserSpending[] = $rowUserSpending['first_name'];
    $dataUserSpending[] = $rowUserSpending['total_spent'];
}

$conn->close();
?>

<!-- Create a canvas element for the chart -->
<canvas id="orderChart" width="200" height="100"></canvas>
<canvas id="itemQuantityChart" width="200" height="100"></canvas>
<canvas id="userSpendingChart" width="200" height="100"></canvas>

<script>

var ctx = document.getElementById('orderChart').getContext('2d');
var orderChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Total Price',
            data: <?php echo json_encode($data); ?>,
            backgroundColor: [
                'rgba(75, 192, 192, 0.4)',
                'rgba(255, 99, 132, 0.4)', // Red
                'rgba(255, 205, 86, 0.4)', // Yellow
                'rgba(54, 162, 235, 0.4)', // Blue
                'rgba(255, 159, 64, 0.4)', // Orange
                'rgba(153, 102, 255, 0.4)', // Purple
                'rgba(255, 0, 0, 0.4)',     // Bright Red
                'rgba(0, 255, 0, 0.4)',     // Bright Green
                'rgba(0, 0, 255, 0.4)'      // Bright Blue
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 0, 0, 1)',
                'rgba(0, 255, 0, 1)',
                'rgba(0, 0, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});






var ctxItemQuantity = document.getElementById('itemQuantityChart').getContext('2d');
var itemQuantityChart = new Chart(ctxItemQuantity, {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($labelsItemQuantity); ?>,
        datasets: [{
            label: 'Quantity',
            data: <?php echo json_encode($dataItemQuantity); ?>,
            backgroundColor: [
                'rgba(75, 192, 192, 0.4)',
                'rgba(255, 99, 132, 0.4)', // Red
                'rgba(255, 205, 86, 0.4)', // Yellow
                'rgba(54, 162, 235, 0.4)', // Blue
                'rgba(255, 159, 64, 0.4)', // Orange
                'rgba(153, 102, 255, 0.4)', // Purple
                'rgba(255, 0, 0, 0.4)',     // Bright Red
                'rgba(0, 255, 0, 0.4)',     // Bright Green
                'rgba(0, 0, 255, 0.4)'      // Bright Blue
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 0, 0, 1)',
                'rgba(0, 255, 0, 1)',
                'rgba(0, 0, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


var ctxUserSpending = document.getElementById('userSpendingChart').getContext('2d');
var userSpendingChart = new Chart(ctxUserSpending, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($labelsUserSpending); ?>,
        datasets: [{
            label: 'Total Spending',
            data: <?php echo json_encode($dataUserSpending); ?>,
            backgroundColor: [
                'rgba(75, 192, 192, 0.4)',
                'rgba(255, 99, 132, 0.4)', // Red
                'rgba(255, 205, 86, 0.4)', // Yellow
                'rgba(54, 162, 235, 0.4)', // Blue
                'rgba(255, 159, 64, 0.4)', // Orange
                'rgba(153, 102, 255, 0.4)', // Purple
                'rgba(255, 0, 0, 0.4)',     // Bright Red
                'rgba(0, 255, 0, 0.4)',     // Bright Green
                'rgba(0, 0, 255, 0.4)'      // Bright Blue
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 0, 0, 1)',
                'rgba(0, 255, 0, 1)',
                'rgba(0, 0, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


</script>

</body>
</html>
