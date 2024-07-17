<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Change this if you have set a password for your MySQL server
$dbname = "sample";
$port = 4306; // Change this if your MySQL server is running on a different port

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch cakes from the database
$sql_select = "SELECT * FROM cake";
$result = mysqli_query($conn, $sql_select);

// Check if there are any cakes
if (mysqli_num_rows($result) > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu</title>
        <style>
            body {
                font-family:'Times New Roman', Times, serif;
            }

            header {
                background-color: black;
                color: white;
                padding: 10px;
                text-align: center;
            }

            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
            }

            th, td {
                padding: 20px;
                text-align: CENTER;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #333;
                color: white;
                font-size:20px;
            }

            .edit-btn, .delete-btn {
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-family:'Times New Roman', Times, serif;
    }

    .edit-btn {
        background-color: #4CAF50;
        color: white;
        font-size:18px;
        border: 2px solid #4CAF50;
    }

    .delete-btn {
        background-color: #f44336;
        color: white;
        margin-left:20px;
        font-size:18px;
    }

    /* Different styling for delete button */
    .delete-btn {
        background-color: #f44336;
        color: white;
        margin-left: 20px;
        border: 2px solid #f44336; /* Adding a border */
    }

    /* Hover effect for delete button */
    .delete-btn:hover {
        background-color: white;
        color: #f44336;
    }
    .edit-btn:hover {
        background-color: white;
        color: #4CAF50;
    }
    a{
        font-size:20px;
        color:white;
        padding:20px;
    }
           
            a:hover{
                color:red;
            }
            h1{
                font-size:40px;
                
            }
        </style>
    </head>
    <body>
    <header>
        <h1>SWEET STACKS</h1>
        <a href="dashboard.php">ORDERS</a>
        <a href="form.php">NEW</a>
        <a href="logout.php">lOGOUT</a>
    </header>
    <table>
        <tr>
            <th>IMAGE</th>
            <th>DESCRIPTION</th>
            <th>PRICE</th>
            <th>ACTIONS</th>
        </tr>
        <?php
        // Loop through each cake
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><img src="<?php echo $row['image']; ?>" alt="Cake" width="100"></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <!-- Edit button with link to edit.php -->
                    <a href="edit.php?image=<?php echo $row['image']; ?>" class="edit-btn">EDIT</a>
                    <button class="delete-btn" onclick="deleteCake('<?php echo $row['image']; ?>')">DELETE</button>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <script>
        function deleteCake(image) {
            if (confirm('Are you sure you want to delete this cake?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        alert(xhr.responseText);
                        location.reload(); // Reload the page after deletion
                    }
                }
                xhr.send('delete_image=' + image);
            }
        }
    </script>
</body>
</html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu</title>
        <style>
            body {
                font-family:'Times New Roman', Times, serif;
            }

            header {
                background-color: Tomato;
                color: white;
                padding: 10px;
                text-align: center;
            }

            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
            }

            th, td {
                padding: 20px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #333;
                color: white;
            }

            .edit-btn, .delete-btn {
                padding: 5px 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .edit-btn {
                background-color: #4CAF50;
                color: white;
            }

            .delete-btn {
                background-color: #f44336;
                color: white;
                margin-left:20px;
            }
            a{
                font-size:20px;
                padding:10px;
                color:white;
            }
            a:hover{
                color:red;
            }
            h1{
                font-size:40px;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
        </style>
    </head>
    <body>
    <header>
        <h1>CAKE DELIGHT</h1>
        <a href="dashboard.php">ORDERS</a>
        <a href="form.php">NEW</a>
        <a href="#">LOGOUT</a>
    </header>
    <table>
        <tr>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </table>
</body>
</html>
<?php
}

// Close connection
mysqli_close($conn);
?>
