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

// Fetch reviews from the database
$sql_select_reviews = "SELECT * FROM reviews";
$result_reviews = mysqli_query($conn, $sql_select_reviews);

// Check if there are any reviews
if (!$result_reviews) {
    die("Error fetching reviews: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review List</title>
   <style>
    body {
          
          font-family: Arial, sans-serif; /* Specify your preferred font family */
          overflow: hidden; /* Hide horizontal scrollbar */
          background-color:white;
          margin: 0;
            padding: 0;
            background-image: url('c2.png'); /* Replace 'cake_background.jpg' with your cake image */
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
      }

      .header {
          position: relative; /* Ensures positioning context for child elements */
          text-align: center; /* Centers the navigation horizontally */
          margin-bottom: 20px; /* Add space below the header */
      }

      .nav {
          position: fixed; /* Position the navigation absolutely */
          top: 0; /* Positions the navigation at the top of the header */
          left: 0; /* Aligns the navigation to the left within the header */
          width: 100%; /* Makes the navigation span the full width of the header */
          background-color: black; /* Adds a semi-transparent background */
          padding: 10px 0; /* Adds some padding for better appearance */
          box-sizing: border-box; /* Ensures padding is included in the width */
      }

      .nav a {
          display: inline-block; /* Displays navigation links as inline blocks */
          padding: 10px 20px; /* Adds padding around the links */
          text-decoration: none; /* Removes default underline */
          color: rgb(255, 255, 255); /* Sets link color */
          font-size: 20px;
          font-family: 'Times New Roman', Times, serif;
      }

      .nav a.active {
          font-weight: bold; /* Style for the active link */
          color: brown;
      }

      .nav a:hover{
          color: brown;
      }

      .nav1 {
          position: fixed; /* Position the navigation absolutely */
          top: 0px; /* Positions the navigation at the top of the header */
          right: 30px; /* Aligns the navigation to the left within the header */
          width: 20%; /* Makes the navigation span the full width of the header */
          padding: 10px 0; /* Adds some padding for better appearance */
          box-sizing: border-box; /* Ensures padding is included in the width */
          left: 40px;
      }

      .nav1 a {
          float: left;
          text-decoration: none; /* Removes default underline */
          color: rgb(0, 255, 0); /* Sets link color */
            font-size:35px;
          font-family: 'Times New Roman', Times, serif;
      }
      /* Add this CSS to style the review list */
.review-list {
    max-width: 750px; /* Limit the width of the review list */
    margin: 20px auto; /* Center the review list horizontally */
    padding: 20px; /* Add some padding */
    background: rgba(255, 255, 255, 0.8);
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
   top:20px;
   
}
h1{
    text-align:center;
}

.review {
    margin-bottom: 20px; /* Add space between reviews */
    border-bottom: 1px solid #ccc; /* Add a bottom border between reviews */
    padding-bottom: 20px; /* Add some padding at the bottom of each review */
    border:2px solid tomato;
    padding:10px;
}

.review:last-child {
    border-bottom: none; /* Remove bottom border for the last review */
}

.review p {
    margin: 5px 0; /* Add some margin for paragraphs within reviews */
}

/* Style the "ADD REVIEW" button */
.nav a.a1 {
    color: white; /* White text color */
    background-color: #007bff; /* Blue background color */
    border-radius: 5px; /* Rounded corners */
    padding: 10px 20px; /* Add padding */
}

.nav a.a1:hover {
    background-color: #0056b3; /* Darker blue on hover */
}


    </style>
</head>
<body>
    <header class="header">
        <nav class="nav">
            <a href="c2.php">HOME</a>
            <a href="menu.php">MENU</a>
            <a href="about.php">ABOUT</a>
            <a href="review.php" class="active">REVIEWS</a>
            <a href="contact.php">CONTACT</a>
            <a href="logout.php">LOGOUT</a>
            <a class="a1" href="review.php">ADD REVIEW</a>
        </nav>
        <nav class="nav1">
            <a class="a1" href="">SWEET STACKS</a>
        </nav>
        <nav class="nav2">
            
        </nav>
    </header>

    <div class="review-list">
        <h1>REVIEW LIST</h1>
        <?php
        while($row = mysqli_fetch_assoc($result_reviews)) {
            // Output review details
            ?>
            <div class="review">
                <p><?php echo $row['review_text']; ?></p>
                <p>By: <?php echo $row['customer_name']; ?></p>
                <p>Time: <?php echo $row['created_at']; ?></p>
            </div>
            <?php
        }
        ?>
    </div>

    <script src="script.js"></script> <!-- Assuming you have a separate JS file -->
</body>
</html>

<?php
// Close connection
mysqli_close($conn);
?>
