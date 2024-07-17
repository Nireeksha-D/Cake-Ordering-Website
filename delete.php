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

// Delete cake if delete request is sent
if(isset($_POST['delete_image'])) {
    $delete_image = $_POST['delete_image'];
    $sql_delete = "DELETE FROM cake WHERE image = '$delete_image'";
    if (mysqli_query($conn, $sql_delete)) {
        echo "Cake deleted successfully";
    } else {
        echo "Error deleting cake: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
