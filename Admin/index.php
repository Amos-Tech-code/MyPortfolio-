
<?php
  session_start();
  //database connection
  include('../db.php');

      // Check if the admin session is not set
    if (!isset($_SESSION['admin_username'])) {
      // Display the modal for authentication
      include('login_modal.php'); // Include your modal code from the provided modal HTML
      exit(); // Stop further execution until authentication
    }


   // Fetch total number of messages
   $count_query = "SELECT COUNT(*) as total_messages FROM contacts";
   $count_result = mysqli_query($con, $count_query);
   $total_messages = 0;

   if ($count_result) {
       $count_data = mysqli_fetch_assoc($count_result);
       $total_messages = $count_data['total_messages'];
   }

   // Fetch total number of subscribes
   $count_query = "SELECT COUNT(*) as total_sub FROM subscribed";
   $count_result_sub = mysqli_query($con, $count_query);
   $total_sub = 0;

   if ($count_result_sub) {
       $count_data_sub = mysqli_fetch_assoc($count_result_sub);
       $total_sub = $count_data_sub['total_sub'];
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
        <a class="w3-bar-item w3-button" href="index.php">Messages 
          <?php echo "<span class='w3-button mybtn2 w3-circle w3-hover-red w3-tiny'>$total_messages</span>"; ?></a>
        <a class="w3-bar-item w3-button" onclick="scrollToSection('subscribed')">Subcribed
        <?php echo "<span class='w3-button mybtn2 w3-circle w3-hover-red w3-tiny'>$total_sub</span>"; ?></a>
        <a class="w3-bar-item w3-button" href="mangement.php">Content Management</a>
        <a class="w3-bar-item w3-button" href="portfolio_items.php">Portfolio Items</a>
        <a class="w3-bar-item w3-button" href="analytics.php">Analytics and Insights</a>
        <a class="w3-bar-item w3-button" href="logout.php">Log Out</a>
    </div>
      
    <div class="w3-main" style="margin-left:200px">
      <div class="w3-theme">
        <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
        <div class="w3-container">
          <h2 id="myheader">Portfolio Manegement Panel</h2>
        </div>
      </div>
      
      <div class="w3-container">
        <div class="w3-card-4 w3-panel">
            <h3 class="w3-center w3-text-theme"><strong>Messages</strong></h3>
            <?php
          
            // Fetch messages from the database
            $sql = "SELECT * FROM contacts ORDER BY Time_in DESC"; // Order by time descending to show latest messages first
            $result = mysqli_query($con, $sql);

            // Check if there are messages
            if (mysqli_num_rows($result) > 0) {
                // Loop through each row of data
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['Name'];
                    $phone = $row['Phone_Number'];
                    $email = $row['Email'];
                    $message = $row['Message'];
                    $time = $row['Time_in'];

                    // Format the message as a chat entry
                    echo "<div class='chat-entry'>";
                    echo "<div><strong>$name ($email)</strong><strong><span class='time'>$time</span></strong></div>";
                    echo "<div class='w3-text-white'>$message</div>";
                     // Add reply button with a link to reply to email
                     echo "<a href='mailto:$email?subject=Reply From Portfolio Message&body=Your reply here' class='w3-button w3-round mybtn1'>Reply</a>";
                     echo "<a id='copyButton' class='w3-button w3-margin-left w3-round mybtn1' onclick=\"copyText('$phone')\">$phone Copy Phone Number</a>";

            
                     // Add delete button with confirmation dialog
                    echo "<a href='#' class='w3-button w3-round mybtn2 w3-right' onclick='confirmDelete($id)'>Delete</a>";
             
                    echo "</div>";
                }
            } else {
                echo "<div class='chat-entry'>No messages found.</div>";
            }

            // Close the database connection
           // mysqli_close($con);

          ?>

        </div>

        <div class="w3-card-4 w3-panel" id="subscribed">
            <h3 class="w3-center w3-text-theme"><strong>Subscribed</strong></h3>
            <?php

            
            // Fetch messages from the database
            $sql2 = "SELECT * FROM subscribed ORDER BY Time DESC"; // Order by time descending to show latest messages first
            $result2 = mysqli_query($con, $sql2);

            // Check if there are messages
            if (mysqli_num_rows($result2) > 0) {
                // Loop through each row of data
                while ($row = mysqli_fetch_assoc($result2)) {
                    $id = $row['id'];
                    $email = $row['Email'];
                    $time = $row['Time'];

                    // Format the subscribers as a chat entry
                    echo "<div class='chat-entry'>";
                    echo "<div><strong>$email</strong><strong><span class='time'>$time</span></strong></div>";
                     // Add reply button with a link to reply to email
                     echo "<a href='mailto:$email?subject=Reply From Portfolio Message&body=Your reply here' class='w3-button w3-round mybtn1'>Send Email 
                     <img src='../images/Email.png' alt='' style='width: 20px;'></a>";
                    echo "</div>";
                }
            } else {
                echo "<div class='chat-entry'>No Subscribers found.</div>";
            }

            // Close the database connection
            mysqli_close($con);

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

       //function to scroll to subcribed

       function scrollToSection(subscribed) {
                // Get the target element based on its ID
                var targetElement = document.getElementById(subscribed);
                if (targetElement) {
                    // Scroll to the target element smoothly
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            }

      </script>

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this message?")) {
                // Redirect to delete_message.php with the message ID
                window.location.href = 'delete_message.php?id=' + id;
            }
        }
    </script>
     <script>
        function copyText(text) {
            // Create a temporary textarea element
            var textarea = document.createElement('textarea');
            textarea.value = text;

            // Append the textarea to the body
            document.body.appendChild(textarea);

            // Select the text in the textarea
            textarea.select();
            textarea.setSelectionRange(0, 99999); // For mobile devices

            // Copy the selected text
            document.execCommand('copy');

            // Remove the textarea from the document
            document.body.removeChild(textarea);

            // Alert or show a message indicating successful copy
            alert('Phone number copied to clipboard: ' + text);
        }
    </script>

           

</body>
</html>