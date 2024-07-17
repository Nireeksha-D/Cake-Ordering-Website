<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
       <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif; /* Specify your preferred font family */
    overflow: hidden;
}

.header {
    position: relative; /* Ensures positioning context for child elements */
    text-align: center; /* Centers the navigation horizontally */
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

.responsive-image {
    width: 100%;
    height: 100%;

    
}
.header .logo{
    font-family:'Times New Roman', Times, serif;
    font-size: 10px;
    font-weight: bolder;
    color:rgb(0, 0, 0);
    float: left;
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
.about-content {
    position: absolute;
    top: 30%;
    left: 40%;
    transform: translate(-50%, -50%);
    text-align: left;
    background-color: rgb(201, 178, 178);
    padding: 20px;
    color: rgb(0, 0, 0);
    border-radius: 10px; /* Add some rounded corners */
    max-width: 80%; /* Limit the width of the content */
    z-index: 1; /* Ensure the content appears above the background image */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); /* Add a subtle shadow for depth */
    
}


@keyframes slideIn {
    0% {
        transform: translateX(-100%);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}

.about-content.active {
    display: block; /* Show the content when it has the 'active' class */
    animation: slideIn 0.5s forwards; /* Apply the animation */
}

.about-content.slideIn {
    animation: slideIn 0.5s forwards; /* Apply the animation */
}

.banner-container{
    
}
        </style>
        
        <body>
            <header class="header">
               
                <img src="c1.png" alt="Your Image" class="responsive-image">
                
                <nav class="nav">
                    
                    <a href="c2.php">HOME</a>
                    <a href="menu.php">MENU</a>
                    <a href="about.php">ABOUT</a>
                    <a href="reviewlist.php">REVIEWS</a>
                    <a href="contact.php">CONTACT</a>
                    <a href="logout.php">LOGOUT</A>
                </nav>
                <nav class="nav1">
                    <a class="a1" href="">SWEET STACKS</a>
                </nav>
                
                
                
                
            </header>
            <script src="c2.js"></script>
        </body>
    </head>
</html>