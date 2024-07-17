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

// Fetch cakes from the database
$sql_select = "SELECT * FROM cake";
$result = mysqli_query($conn, $sql_select);

// Check if there are any results
if (!$result) {
    die("Error fetching cakes: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
   
    <style>
       body {
          
            font-family: Arial, sans-serif; /* Specify your preferred font family */
            overflow: hidden; /* Hide horizontal scrollbar */
            background-color:white;
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
            font-size: 35px;
            font-family: 'Times New Roman', Times, serif;
        }
        
        .cake-container {
            display: flex; /* Use flexbox to arrange cakes in rows */
            flex-wrap: wrap; /* Allow cakes to wrap to the next row */
            justify-content: space-around; /* Evenly distribute cakes horizontally */
            padding: 20px; /* Add some padding around the container */
            box-sizing: border-box; /* Include padding in the width */
            margin: 0; /* Remove default margin */
        }

        .cake {
            width: calc(25% - 20px); /* Set the width to occupy one-fourth of the container minus the margin */
            margin: 10px; /* Add some margin around each cake */
            text-align: center; /* Center the content horizontally */
            box-sizing: border-box; /* Include padding and border in the width */
        }

        .cake img {
            max-width: 100%; /* Ensure images don't overflow */
            height: auto; /* Maintain aspect ratio */
            max-height: 200px; /* Set a maximum height for the images */
        }

        .cake div {
            font-size: 18px; /* Adjust font size for description and price */
        }

        .cake button {
            color: white;
            font-size: 16px; /* Adjust font size for the order button */
            background-color: green;
            border: none;
            padding: 10px 20px; /* Add padding to the button */
            cursor: pointer;
        }

        .scrolling-section {
            overflow-y: auto; /* Enable vertical scrolling */
            height: calc(100vh - 150px); /* Set height to fill remaining viewport space, minus header and span height */
            padding: 20px; /* Add some padding */
            box-sizing: 100%; /* Include padding in the height calculation */
        }

        .moving-span {
            position: absolute;
            font-size: 30px;
            top: 50%;
            left: 0;
            animation: moveSpan 10s linear infinite; /* Animation to move the span */
        }

        @keyframes moveSpan {
            0% { left: -100%; }
            100% { left: 100%; }
        }
    </style>
</head>
<body>
    <header class="header">
        <nav class="nav">
            <a href="c2.php">HOME</a>
            <a href="menu.php" class="active">MENU</a>
            <a href="about.php">ABOUT</a>
            <a href="reviewlist.php">REVIEWS</a>
            <a href="contact.php">CONTACT</a>
            <a href="logout.php">LOGOUT</a>
        </nav>
        <nav class="nav1">
            <a class="a1" href="">SWEET STACKS</a>
        </nav>
    </header>
    <section class="banner-container">
        <div class="banner">
            <!--<span class="moving-span">Enjoy Your Cake</span>-->
        </div>
    </section>

    <div class="scrolling-section">
        <div class="cake-container">
            <?php
            $counter = 0; // Counter to keep track of the number of cakes per row
            while($row = mysqli_fetch_assoc($result)) {
                // Output cake details in a div
                ?>
                <div class="cake">
                    <img src="<?php echo $row['image']; ?>" alt="Cake">
                    <div class="description"><?php echo $row['description']; ?></div>
                    <div class="price"><?php echo $row['price']; ?></div>
                    <button class="order-btn" onclick="window.location.href='order.php?cake_id=<?php echo $row['image']; ?>'">ORDER</button>
                </div>
                <?php
                $counter++;
                // Start a new row after every 4 cakes
                if ($counter % 4 == 0) {
                    echo '<div class="clearfix"></div>';
                }
            }
            ?>
        </div>
    </div>

    <script src="c1.js"></script>
</body>
</html>
<?php
// Close connection
mysqli_close($conn);
?>
