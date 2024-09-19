
<?php
    session_start();
    //Database connection
    include ('db.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //Sanitizing
        $name = htmlspecialchars($_POST["name"]);
        $phone_number = htmlspecialchars($_POST["phone"]);
        $email = htmlspecialchars($_POST["email"]);
        $message = htmlspecialchars($_POST["message"]);

        //Prepare SQL Statement with placeholders
        $stmt = $con->prepare("INSERT INTO contacts (Name, Phone_Number, Email, Message) VALUES (?, ?, ?, ?)");
        
        //Bind parameters and execute the statement
        $stmt->bind_param("ssss", $name, $phone_number, $email, $message);

        if ($stmt->execute()) {
            // Set the modal message
            $modal_message = "Message sent successfully!";
        } else {
            $modal_message = "Error: " . $con->error;
        }
        
        //Close statement and connection
        $stmt->close();
        $con->close();

    }
    


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio</title>
        <link rel="icon" href="images/portfolio.png" type="image/png">

        <link rel="stylesheet" href="w3.css">
        <link rel="stylesheet" href="mystyle.css">
        <!-- Font Awesome CDN links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        
    </style>
    
</head>
<body>
    
   <div class="header1">
    <header class="w3-top">
        <div class="sidebtn">
            <button class="w3-bar-item w3-button w3-xxlarge w3-hover-theme" onclick="openSidebar()">&#9776;</button>
        </div>
        <nav class="w3-sidebar w3-bar-block w3-card" id="mySidebar">
            <div class="w3-container w3-theme">
                <span onclick="closeSidebar()" class="w3-button w3-display-topright w3-large">X</span>
                <br>
                <div class="w3-padding w3-center">
                    <img class="w3-circle" src="images/profile_pic2.jpg" alt="avatar" style="width:75%">
                </div>
            </div>
            <a class="w3-bar-item w3-button" href="index.php">Home</a>
            <a class="w3-bar-item w3-button" href="index.php#About_Me">About</a>
            <a class="w3-bar-item w3-button" href="portfolio.php">Portfolio</a>
            <a class="w3-bar-item w3-button" href="contact.php">Contact Me</a>
        </nav>       
        <div class="w3-bar">
            <div class="logo">
                <img src="images/portfolio.png" alt="Logo" class="w3-image w3-display-topleft" style="width: 100%;max-width: 70px;">
            </div>
            <div class="topnav">
                <div class="w3-display-topmiddle w3-margin-top">
                    <a class="w3-bar-item w3-button" href="index.php">Home</a>
                    <a class="w3-bar-item w3-button" href="index.php#About_Me">About</a>
                    <a class="w3-bar-item w3-button" href="portfolio.php">Portfolio</a>
                    <a class="w3-bar-item w3-button" href="contact.php">Contact Me</a>
                </div>
            </div>
            <button class="w3-button w3-round hire-me-btn w3-display-topright w3-margin-right w3-margin-top w3-disabled" onclick="window.location.href ='contact.php'">Hire Me</button> 
        </div>
        <div class="contact_img">
           <!--<img class="w3-image" src="images/photo_7.png" alt="" style="width: 100%; z-index: -100;">-->
        </div>
    </header>
   
   </div>

   <!--Contact Content-->
     <!--   <div>
            <div id="social_icons" class="w3-col s1 w3-mobile w3-display-left" style="width: 80px;">
     
                <div>
                    <img src="images/linkedin.png" alt="" style="width: 20px;">
                </div>
                <div>
                    <img src="images/instagram.png" alt="" style="width: 20px;">
                </div>
                <div>
                    <img src="images/twitter.png" alt="" style="width: 20px;">
                </div>
                <div>
                    <img src="images/facebook.png" alt="" style="width: 20px;">
                </div>
                <div>
                    <img src="images/Email.png" alt="" style="width: 20px;">
                </div>
                <div>
                   <img src="images/github.png" alt="" style="width: 20px;">
               </div>
            </div>
        </div>-->
        

        <div class="w3-cell-row-padding">
            <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
                <div class="w3-card-4 w3-padding">
                <div class="w3-center">
                    <img class="w3-image" src="images/photo_4.png" alt="" style="width: 30px;">
                </div>
                <div class="w3-center">
                    <p><strong>+254&nbsp;743&nbsp;217&nbsp;122</strong></p>
                    <p>Monday - Friday from 7am - 5pm</p>
                </div>
                </div>
            </div>
            <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
                <div class="w3-card-4 w3-padding">
                <div class="w3-center">
                    <img class="w3-image" src="images/photo_5.png" alt="" style="width: 40px;">
                </div>
                <div class="w3-center">
                    <p><strong>Kenya, Murang'a</strong></p>
                    <p>Murang'a Town, VM 91117</p>
                </div>
                </div>
            </div>
            <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
                <div class="w3-card-4 w3-padding">
                <div class="w3-center">
                    <img class="w3-image" src="images/photo_6.png" alt="" style="width: 50px;">
                </div>
                <div class="w3-center">
                    <p><strong>amosk5132@gmail.com</strong></p>
                    <p>Contact Me every time!</p>
                </div>
            </div>
            </div>
        </div>


        <div class="w3-row-padding">
            <div class="w3-panel w3-center w3-col w3-mobile" id="hireme" style="width: 70%">
                <div class="w3-card-2 w3-padding">
                    <div class="w3-container">
                        <h2 class="w3-text-theme "><strong>Get In Touch</strong></h2><br>
                    </div>
                    <form class="w3-container w3-padding" action="" method="POST">

                        <input type="text" name="name" placeholder="Enter your name" required class="w3-border w3-round"><br><br>
                                                <span id="mobile_no_error" style="color: red;"></span><br>
                        <input type="text" name="phone" id="mobile_no" placeholder="Enter your Phone Number" class="w3-border w3-round"><br><br>
                        <input type="email" name="email" placeholder="Enter email address" required class="w3-border w3-round"><br><br>
                        <textarea name="message" id="message" placeholder="Enter your message" required rows="4" cols="30" class="w3-border w3-round"></textarea><br>
                        <label for="message">0 of 1 max characters</label><br><br>
                        <input type="submit" value="Send Message" class="w3-button hire-me-btn w3-round">

                    </form>
                </div>
            </div>
            <div class="w3-panel w3-center w3-col w3-mobile" style="width: 25%;">
                <div class="w3-card-2 w3-padding">
                    <h2 class="w3-text-theme"><strong>Messsage Me</strong></h2>
                <div >
                    <p>Need to discuss a project or have any questions? Don't hesitate to reach out. I'm here to help and discuss any inquiries you may have.</p><br>
                </div>
                <div class="w3-bar w3-theme">
                    <div class="w3-text-white w3-large">Click the icons below</div>
                        <div class="w3-bar-item">
                            <a href="https://www.linkedin.com/" target="_blank">
                                <img src="images/linkedin.png" alt="LinkedIn" style="width: 20px;">
                            </a>
                        </div>
                        <div class="w3-bar-item">
                            <a href="https://www.instagram.com/" target="_blank">
                                <img src="images/instagram.png" alt="Instagram" style="width: 20px;">
                            </a>
                        </div>
                        <div class="w3-bar-item">
                            <a href="https://twitter.com/" target="_blank">
                                <img src="images/twitter.png" alt="Twitter" style="width: 20px;">
                            </a>
                        </div>
                        <div class="w3-bar-item">
                            <a href="https://www.facebook.com/" target="_blank">
                                <img src="images/facebook.png" alt="Facebook" style="width: 20px;">
                            </a>
                        </div>
                        <div class="w3-bar-item">
                            <a href="https://web.whatsapp.com/" target="_blank">
                                <img src="images/Whatsapp.png" alt="WhatsApp" style="width: 20px;">
                            </a>
                        </div>
                        <div class="w3-bar-item">
                            <a href="https://telegram.org/" target="_blank">
                                <img src="images/telegram.png" alt="Telegram" style="width: 20px;">
                            </a>
                        </div>
                        <div class="w3-bar-item">
                            <a href="mailto:yourname@example.com" target="_blank">
                                <img src="images/Email.png" alt="Email" style="width: 20px;">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>



   <!--Footer Content-->         
   <footer class="w3-container w3-theme w3-margin-top w3-padding">
            <div class="w3-row-padding">
                <div class="w3-bar">
                    <div class="w3-third">
                        <div class="w3-bar-item">
                            <img src="images/linkedin.png" alt="" style="width: 20px;">
                        </div>
                        <div class="w3-bar-item">
                            <img src="images/instagram.png" alt="" style="width: 20px;">
                        </div>
                        <div class="w3-bar-item">
                            <img src="images/twitter.png" alt="" style="width: 20px;">
                        </div>
                        <div class="w3-bar-item">
                            <img src="images/facebook.png" alt="" style="width: 20px;">
                        </div>
                        <div class="w3-bar-item">
                            <img src="images/Whatsapp.png" alt="" style="width: 20px;">
                        </div>
                        <div class="w3-bar-item">
                            <img src="images/telegram.png" alt="" style="width: 20px;">
                        </div>
                        <div class="w3-bar-item">
                            <img src="images/Email.png" alt="" style="width: 20px;">
                        </div>
                        <div class="w3-bar-item">
                            <img src="images/github.png" alt="" style="width: 20px;">
                        </div>
                    </div>

                <div class="w3-third">
                    <div class="w3-bar-item w3-center w3-mobile">
                        <img src="images/photo_3.png" alt="">
                        <p>Copyright &copy; 2024 Personal Portfolio</p>
                    </div>
                </div>
                <div class="w3-third">
                    <div class="w3-bar-item w3-right w3-mobile">
                        <p style="float: inline-end;">amosk5132@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
                  <!-- Modal -->
                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content w3-animate-zoom w3-card-4">
                        <header class="w3-container w3-theme"> 
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright w3-large">&times;</span>
                        <h2>Submission Status</h2>
                        </header>
                        <div class="w3-container w3-padding">
                        <p id="modalMessage"><?php echo !empty($modal_message) ? $modal_message : ''; ?></p>
                        </div>
                        <footer class="w3-container w3-theme">
                        <div class="w3-display-container">
                        <p>Thank you for visiting my portfolio!</p>
                        <p>Thank you for reaching out! Your message has been received, and I'll get back to you as soon as possible. In the meantime, let's keep in touch through email. Have a great day!</p>
                        </div>      
                        </footer>
                    </div>
                </div>
                <script>
                // Check if the modal message is not empty, then trigger the modal display
                <?php if (!empty($modal_message)) : ?>
                    document.getElementById('id01').style.display = 'block';
                <?php endif; ?>

                // Close the modal when the user clicks anywhere outside of it
                window.onclick = function(event) {
                    if (event.target == document.getElementById('id01')) {
                        document.getElementById('id01').style.display = 'none';
                    }
                }
            </script>

            <script>
            closeSidebar();
            function openSidebar() {
              document.getElementById("mySidebar").style.display = "block";
            }
            

            function closeSidebar() {
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
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var mobileNoInput = document.getElementById('mobile_no');
                    var mobileNoError = document.getElementById('mobile_no_error');

                    mobileNoInput.addEventListener('keyup', function() {
                        var mobileNo = this.value.trim();

                        if (mobileNo.startsWith('0')) {
                            // Check if the length is exactly 10 digits
                            if (mobileNo.length !== 10) {
                                mobileNoError.textContent = 'Mobile number should be exactly 10 digits if starting with 0!';
                                return; // Exit the function early
                            }
                        } else if (mobileNo.startsWith('254')) {
                            // Check if the length is exactly 12 digits
                            if (mobileNo.length !== 12) {
                                mobileNoError.textContent = 'Mobile number should be exactly 12 digits if starting with 254!';
                                return; // Exit the function early
                            }
                        } else {
                            mobileNoError.textContent = 'Mobile number should start with 0 or 254!';
                            return; // Exit the function early
                        }

                        // Clear the error message if input is valid
                        mobileNoError.textContent = '';

                        // Update the input value with the formatted mobile number
                        this.value = mobileNo;
                    });
                });
            </script>
            
    </body>
</html>
