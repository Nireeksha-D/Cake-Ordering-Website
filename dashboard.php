<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Dashboard</title>
    <style>
        body {
            font-family: Times of New Roman;
            margin: 0;
            padding: 0;

        }

        header {
            background-color: black;
            color: white;
            padding: 20px;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: black;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-align:center;
            margin-right: 20px;
            color: white;
            text-decoration: none;
        }

        a:hover {
            color: #f44336;
        }
        /* Add this CSS to style the delete button */
    a.delete-button {
    background-color: #f44336; /* Red background color */
    color: white; /* White text color */
    padding: 8px 12px; /* Padding around the button */
    border: none; /* Remove border */
    border-radius: 4px; /* Rounded corners */
    cursor: pointer; /* Show pointer cursor on hover */
    text-decoration: none; /* Remove underline */
}

a.delete-button:hover {
    background-color: #d32f2f; /* Darker red background color on hover */
}

      
    </style>
</head>
<body>
    <header>
        <h1>ORDERS DASHBOARD</h1>
        <a href="new.php" >MENU</a>
        <a href="logout.php" >LOGOUT</a>
    </header>

    <table>
        <tr>
            <th>Cake Image</th>
            <th>Cake Description</th>
            <th>Cake Price</th>
            <th>Customer Name</th>
            <th>Customer Address</th>
            <th>Customer Phone</th>
            <th>Payment Method</th>
            <th>Delete</th>
        </tr>
        
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sample";
        $port = 4306; // Change this if your MySQL server is running on a different port

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch orders from the database
        $sql_select_orders = "SELECT * FROM orders";
        $result_orders = mysqli_query($conn, $sql_select_orders);

        // Check if there are any orders
        if (mysqli_num_rows($result_orders) > 0) {
            // Output data of each row
            while($row = mysqli_fetch_assoc($result_orders)) {
                echo "<tr>";
                echo "<td><img src='" . $row["cake_image"] . "' width='100'></td>";
                echo "<td>" . $row["cake_description"] . "</td>";
                echo "<td>" . $row["cake_price"] . "</td>";
                echo "<td>" . $row["customer_name"] . "</td>";
                echo "<td>" . $row["customer_address"] . "</td>";
                echo "<td>" . $row["customer_phone"] . "</td>";
                echo "<td>" . $row["payment_method"] . "</td>";
                // Pass cake image and order ID to JavaScript function
                echo "<td><a href='#' class='delete-button' onclick=\"deleteCake('".$row['cake_image']."', '".$row['id']."')\">Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No orders found.</td></tr>";
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </table>
    <script>
        function deleteCake(image, id) {
            if (confirm('Are you sure you want to delete this order?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'deleteorder.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        alert(xhr.responseText);
                        location.reload(); // Reload the page after deletion
                    }
                }
                xhr.send('delete_image=' + image + '&order_id=' + id); // Send order ID along with image
            }
        }
    </script>
</body>
</html>
