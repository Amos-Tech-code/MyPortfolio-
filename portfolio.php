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
            <button class="w3-button w3-round hire-me-btn w3-display-topright w3-margin-right w3-margin-top" onclick="window.location.href ='contact.php#hireme'">Hire Me</button> 
        </div>
    </header>
   </div>
        <!--Portfolio Content-->
        <div class="section_1">
            <div style="padding: 20px 100px 20px 100px;">
                <h2 class="w3-center w3-text-theme"><strong>Portfolio</strong></h2>
            </div>
        </div>
        <div>
            <div class="w3-center">
                <h2><strong>Services I have been providing</strong></h2>
                <h2>Latest Work.</h2><br>
            </div>
        </div>

    <div class="w3-row-padding">

        <div class="w3-panel w3-col w3-mobile" style="width: 49%">
            <div class="w3-card-4 w3-padding">
            <img class="w3-image" src="images/portfolio_1.jpg" alt="" style="width: 500px;">
            <div class="w3-container w3-center">
                <p class="w3-theme">SOKO E-commerce-Website (Web Development)</p>
              </div>
            </div>
        </div>

        <div class="w3-panel w3-col w3-mobile" style="width: 49%">
        <div class=" w3-padding">
            <div class="w3-row-padding">
                <div class="w3-col s12 l12 m12 w3-card-2">
                    <img class="w3-image" src="images/portfolio_2.jpg" alt="" style="width: 400px; max-height: 150px;">
                    <p class="w3-theme w3-center">Hotel Booking Website (Web Development)</p>

                </div>
                <div class="w3-col s12 m12 l12 w3-card-2 w3-panel" >
                    <img class="w3-image" src="images/portfolio_3.jpg" alt="" style="width: 400px; max-height: 150px;">
                    <p class="w3-theme w3-center">To-do-list Website (Web Development)</p>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="w3-row-padding">
        <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
            <div class="w3-card-4 w3-padding">
            <div class="w3-container">
                <img src="images/portfolio_7.jpg" alt="" style="width: 300px; max-height: 150px;">
                <p class="w3-theme w3-center">To Do List Android Application</p>

            </div>
            </div>
        </div>
        <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
            <div class="w3-card-4 w3-padding">
            <div class="w3-container">
                <img src="images/portfolio_5.jpg" alt="" style="width: 300px; max-height: 150px;">
                <p class="w3-theme w3-center">UI/UX Design</p>

            </div>
            </div>
        </div>
        <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
            <div class="w3-card-4 w3-padding">    
            <div class="w3-container">
                <img src="images/portfolio_8.jpg" alt="" style="width: 300px; max-height: 150px;">
                <p class="w3-theme w3-center">Graphic Design</p>

            </div>
            </div>
        </div>
    </div>

    <div class="w3-row-padding">
        
        <div class="w3-panel w3-center w3-col w3-mobile" style="width: 49%">
            <div class="w3-card-4 w3-padding">
            <div class="w3-container">
                <img class="w3-image" src="images/portfolio_9.jpg" alt="" style="width: 400px; max-height: 150px;">
                <p class="w3-theme w3-center">Mpesa Bank Android Application</p>

            </div>
            </div>
        </div>
        <div class="w3-panel w3-center w3-col w3-mobile" style="width: 49%">
            <div class="w3-card-4 w3-padding">    
            <div class="w3-container">
                <img class="w3-image" src="images/portfolio_6.jpg" alt="" style="width: 400px; max-height: 150px;">
                <p class="w3-theme w3-center">Calculator Application</p>

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
            
    </body>
</html>