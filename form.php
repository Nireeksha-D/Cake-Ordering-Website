<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Cake</title>
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

        input[type="file"],
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

        h1,h2 {
            text-align:center;
        }
        input[type="button"] {
            background-color:red;
            color: white;
            cursor: pointer;
            width: 100%;
            margin-top:10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        
    </header>
    
    <form action="#" method="post" enctype="multipart/form-data">
        <h1>SWEET STACKS</h1>
        <h2>ADD NEW CAKE DETAILS</h2>
        <input type="file" name="cake_image" accept="image/*" required><br>
        <textarea name="cake_description" placeholder="Cake Description" required></textarea><br>
        <input type="text" name="cake_price" placeholder="Cake Price" required><br>
        <input type="submit" name="submit" value="Add Cake">
        <input type="button" onclick="window.location.href='new.php'" value="GO BACK">
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
    $image_name = $_FILES['cake_image']['name']; // Get the name of the uploaded file
    $image_tmp = $_FILES['cake_image']['tmp_name']; // Get the temporary location of the uploaded file
    $description = $_POST['cake_description'];
    $price = $_POST['cake_price'];

    // Move the uploaded file to the desired location
    $target_dir = ""; // Directory where the file will be stored
    $target_file = $target_dir . basename($image_name); // Path of the file on the server

    // Check if the image already exists
    $sql_check = "SELECT * FROM cake WHERE image='$target_file'";
    $result = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        // Cake already exists, display alert message and refresh the page
        echo "<script>alert('Cake already exists. Please try again.')</script>";
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        // Move the uploaded file and insert data into the database
        if (move_uploaded_file($image_tmp, $target_file)) { // Move the file
            $sql_insert = "INSERT INTO cake (image, description, price) VALUES ('$target_file', '$description','$price')";
            if (mysqli_query($conn, $sql_insert)) {
                // Display success message
                echo "<script>alert('Cake details added successfully!')</script>";
                // Redirect to the same page
                echo "<script>window.location.href = 'new.php';</script>";
                exit();
            } else {
                echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error uploading file.";
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

</body>
</html>
