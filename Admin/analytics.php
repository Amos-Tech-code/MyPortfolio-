
<?php
// Start or resume the session
session_start();

// Check if the admin session is not set
if (!isset($_SESSION['admin_username'])) {
  // Display the modal for authentication
  include('login_modal.php'); // Include your modal code from the provided modal HTML
  exit(); // Stop further execution until authentication
}
/*
// Include the Google API PHP client library
require __DIR__ . '/vendor/autoload.php';

// Your Google API credentials
$clientID = '229666343948-ldl2ci3v96j50c8kp89sqlmkc4e7l9rq.apps.googleusercontent.com';
$clientSecret = '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';
$redirectURI = 'https://portfolio-amos.free.nf';

// Set up the Google_Client object
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectURI);
$client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);

// Check if the access token is already set in the session
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  // Set the access token to the client
  $client->setAccessToken($_SESSION['access_token']);

  // Create Google_Service_Analytics object
  $service = new Google_Service_Analytics($client);

  // Get the view ID for your Google Analytics view (profile)
  $viewID = 'YOUR_VIEW_ID';

  // Query to get the total pageviews for today
  $responseToday = $service->data_ga->get(
    'ga:' . $viewID,
    'today',
    'today',
    'ga:pageviews'
  );

  // Query to get the total pageviews for 30 days ago
  $response30DaysAgo = $service->data_ga->get(
    'ga:' . $viewID,
    '30daysAgo',
    '29daysAgo', // Query for one day before 30 days ago to get a full 30-day period
    'ga:pageviews'
  );

  // Extract the total pageviews for today and 30 days ago from the responses
  $totalPageviewsToday = $responseToday->totalsForAllResults['ga:pageviews'];
  $totalPageviews30DaysAgo = $response30DaysAgo->totalsForAllResults['ga:pageviews'];
} else {
  // Display a message indicating failed access
  $failedAccessMessage = "Failed to access Google Analytics data. Please authenticate to proceed.";

  // Generate authentication URL
  $authUrl = $client->createAuthUrl();
}*/
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
        <a class="w3-bar-item w3-button" href="index.php#subscribed">Subscribed</a>
        <a class="w3-bar-item w3-button" href="mangement.php">Content Management</a>
        <a class="w3-bar-item w3-button" href="portfolio_items.php">Portfolio Items</a>
        <a class="w3-bar-item w3-button" href="analytics.php">Analytics and Insights</a>
        <a class="w3-bar-item w3-button" href="logout.php">Log Out</a>
    </div>
      
    <div class="w3-main" style="margin-left:200px">
        <div class="w3-theme">
            <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
            <div class="w3-container">
                <h2>Portfolio Management Panel</h2>
            </div>
        </div>
      
        <div class="w3-container">
            <div class="w3-card-4 w3-panel">
                <h3 class="w3-center w3-text-theme"><strong>Analytics and Insights</strong></h3>
                <div><p>Failed to access Google Analytics data. Please authenticate to proceed.</p></div>
                <?php
               /* if (isset($failedAccessMessage)) {
                    // Display the failed access message with instructions to authenticate
                    echo "<p>$failedAccessMessage</p>";
                    // Optionally, provide a link or button to initiate authentication
                    echo "<a href='$authUrl'>Authenticate</a>";
                } else {
                    // Display total pageviews for today and 30 days ago
                    echo "<h4>Total Pageviews Today: $totalPageviewsToday</h4>";
                    echo "<h4>Total Pageviews 30 Days Ago: $totalPageviews30DaysAgo</h4>";
                }*/
                ?>
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
