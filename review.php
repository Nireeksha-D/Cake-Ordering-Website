<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('c2.png');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background: rgba(255, 255, 255, 0.8);
            padding: 40px; /* Increased padding */
            border-radius: 10px;
            width: 400px; /* Added width for better layout */
        }

        input[type="text"],
        textarea {
            margin-bottom: 10px; /* Added margin between elements */
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc; /* Added border for better visibility */
            box-sizing: border-box; /* Ensures padding is included in width */
        }

        textarea {
            height: 100px; /* Adjust height for multiline input */
            resize: vertical; /* Allow vertical resizing */
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="button"] {
            background-color:red;
            color: white;
            cursor: pointer;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        input[type="button"]:hover {
            background-color: red;
        }
        h1,h2 {
            text-align:center;
        }
    </style>
</head>
<body>
    <header>
        
    </header>
    
    <form action="#" method="post">
        <h1>*** REVIEW US ***</h1>
        <textarea name="review_text" placeholder="Write your review here..." required></textarea><br>
        <input type="text" name="customer_name" placeholder="Your Name" required><br>
        <input type="submit" name="submit" value="SUBMIT"><br><br>
        <input type="button" onclick="window.location.href='reviewlist.php'" value="GO BACK">

    </form>
    
    <?php
    if (isset($_POST['submit'])) {
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

        // Get form data
        $review_text = $_POST['review_text'];
        $customer_name = $_POST['customer_name'];

        // Insert data into the database
        $sql_insert = "INSERT INTO reviews (review_text, customer_name) VALUES ('$review_text', '$customer_name')";
        if (mysqli_query($conn, $sql_insert)) {
            // Display success message
            echo "<script>alert('Thank you for your review!')</script>";
            
            // Redirect to the same page
            echo "<script>window.location.href = 'reviewlist.php';</script>";
            exit();
        } else {
            echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
    }
    ?>
</body>
</html>
