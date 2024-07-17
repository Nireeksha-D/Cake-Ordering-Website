<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('c2.png'); /* Replace 'cake_background.jpg' with your cake image */
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
            background: rgba(255, 255, 255, 0.8); /* Semi-transparent white background for form */
            padding: 60px;
            border-radius: 10px;
        }

        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            width:108%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h1{
            text-align:center;
        }
    </style>
</head>
<body>
    
    <form action="login.php" method="post">
    <h1>LOGIN</h1>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" name="submit" value="Login">
    </form>

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

// Handle form submission
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the provided email and password match the specific values
    if ($email === 'cake@gmail.com' && $password === 'cake123') {
        // Redirect to c2.php
        header("Location: dashboard.php");
        exit();
    } else {
        // Check if user already exists in the database
        $sql_check = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql_check);

        if (mysqli_num_rows($result) > 0) {
            // User already exists, display alert message and refresh the page
            echo "<script>alert('Email already exists. Please try again.')</script>";
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            // User doesn't exist, insert new record
            $sql_insert = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
            if (mysqli_query($conn, $sql_insert)) {
                // Redirect to menu.php
                header("Location: c2.php");
                exit();
            } else {
                echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
            }
        }
    }
}

// Close connection
mysqli_close($conn);
?>
 <script>
        // JavaScript to clear input fields on page reload
        window.onload = function() {
            document.forms['loginForm'].reset(); // Assuming your form has the ID 'loginForm'
        }
    </script>
</body>
</html>
