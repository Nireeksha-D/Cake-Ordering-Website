<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Placed</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color:#F7DC6F ;
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
            padding: 40px; /* Increased padding */
            border-radius: 10px;
            width: 400px; /* Added width for better layout */
            text-align: center; /* Center the content */
        }

        img {
            max-width: 100%; /* Ensure the GIF fits within its container */
            margin-bottom: 20px; /* Add some space below the GIF */
        }
        h1,p{
            font-size:20px;
        }
        a{
            background-color: #4CAF50;
        color: white;
        font-size:25px;
        border: 2px solid #4CAF50;
    }
    
    </style>
</head>
<body>
    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">
            <img src="order.gif" alt="Order Placed GIF">
            <h1>ORDER PLACED SUCCESSFULLY</h1>
            <p>Thank you for your order.</p>
            <a href="menu.php">GO TO MENU
        </form>
    </div>
</body>
</html>
