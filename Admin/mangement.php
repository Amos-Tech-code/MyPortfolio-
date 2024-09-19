
<?php
    session_start();
    // Check if the admin session is not set
    if (!isset($_SESSION['admin_username'])) {
      // Display the modal for authentication
      include('login_modal.php'); // Include your modal code from the provided modal HTML
      exit(); // Stop further execution until authentication
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio</title>
        <link rel="icon" href="../images/portfolio.png" type="image/png">

        <link rel="stylesheet" href="../w3.css">
        <link rel="stylesheet" href="admin_style.css">
        <!-- Font Awesome CDN links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        
    </style>
    
</head>
<body>

    <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
        <div><h5 class="w3-center"><strong>DashBoard</strong></h5></div>
        <div class="w3-container w3-theme">
            <span id="closebtn" onclick="w3_close()" class="w3-button w3-display-topright w3-large">X</span>
            <br>
            <div class="w3-padding w3-center">
                <img class="w3-circle" src="../images/profile_pic2.jpg" alt="avatar" style="width:75%">
            </div>
        </div>
        <a class="w3-bar-item w3-button" href="index.php">Messages</a>
        <a class="w3-bar-item w3-button" href="index.php#subscribed">Subcribed</a>
        <a class="w3-bar-item w3-button" href="mangement.php">Content Management</a>
        <a class="w3-bar-item w3-button" href="portfolio_items.php">Portfolio Items</a>
        <a class="w3-bar-item w3-button" href="analytics.php">Analytics and Insights</a>
        <a class="w3-bar-item w3-button" href="logout.php">Log Out</a>
    </div>
      
    <div class="w3-main" style="margin-left:200px">
      <div class="w3-theme">
        <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
        <div class="w3-container">
          <h2>Portfolio Manegement Panel</h2>
        </div>
      </div>
      
      <div class="w3-container">
        <div class="w3-card-4 w3-panel">
            <h3 class="w3-center w3-text-theme"><strong>Content Management</strong></h3>

        </div>
      </div>
         
    </div>
      
      <script>
      function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
      }
      
      function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
      }

       //to open a section on index page
       if (window.location.hash) {
                // Get the hash value from the URL (e.g., #About_Me)
                var hash = window.location.hash.substr(1); // Remove the # symbol

                // Scroll to the target element if it exists
                var targetElement = document.getElementById(hash);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            }
      </script>
           

</body>
</html>