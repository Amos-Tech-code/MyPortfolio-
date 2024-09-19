
<?php
session_start();
// Database connection parameters
include('db.php');

// Define variable to store message
$modal_message = '';

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input to prevent SQL injection
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    // Check if email already exists
    $checkStmt = $con->prepare("SELECT Email FROM subscribed WHERE Email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        $modal_message = "Email already subscribed!";
    } else {
        // Prepare and execute SQL statement to insert email
        $insertStmt = $con->prepare("INSERT INTO subscribed (Email) VALUES (?)");
        $insertStmt->bind_param("s", $email);

        if ($insertStmt->execute()) {
            $modal_message = "Email submitted successfully!";
        } else {
            $modal_message = "Error submitting email. Please try again.";
        }
        
        // Close statement for inserting
        $insertStmt->close();
    }

    // Close statement for checking
    $checkStmt->close();
}

// Close database connection
$con->close();
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
            <button class="w3-button w3-round hire-me-btn w3-display-topright w3-margin-right w3-margin-top" onclick="window.location.href ='contact.php#hireme'">Hire Me</button> 
        </div>
    </header>
   </div>

      <div class="section_1">
        <div class="w3-row-padding">
        
            <div class="w3-col s7 w3-mobile w3-margin-left w3-center">
             <p class="w3-xxlarge w3-text-theme"><strong>I'm a Software Engineer</strong><br> Amos N. Kamau</p>
             <p><b>Welcome to my portfolio,</b></p>
             <p>I’m passionate about crafting innovative software solutions that make a difference.
                With a deep understanding of programming languages and technologies, I strive to create efficient and user-friendly applications.
             </p>
             <br>
             <button class="w3-button w3-round"style="background-color: #eb5b51; color: white;" onclick="window.location.href='index.php#About_Me'">Learn More</button> 
             <br>
            </div>
            <div class="w3-col s4 w3-mobile">
             <img class="w3-image" src="images/profile_pic1.png" alt="Profile picture" style="width: 500px;">
            </div>
             
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
                <img src="images/Whatsapp.png" alt="" style="width: 20px;">
            </div>
            <div>
                <img src="images/telegram.png" alt="" style="width: 20px;">
            </div>
             <div>
                 <img src="images/Email.png" alt="" style="width: 20px;">
             </div>
             <div>
                <img src="images/github.png" alt="" style="width: 20px;">
            </div>
         </div>
            </div>
      </div>

       <div id="About_Me">
        <div class="w3-container w3-center">
            <h2 class="w3-text-theme"><strong>About Me</strong></h2><br>
            <p><b>Developing with a Passion while exploring the world.</b></p>
           </div>
    
           <div class="w3-cell-row">
                <div class="w3-container w3-cell w3-col s4 w3-mobile">
               <p><strong>Welcome to my corner of the digital world!</strong></p>
               <p>I am a passionate developer, driven by curiosity and a love for coding. 
                With every project, I aim to blend creativity with functionality, crafting solutions that not only work seamlessly but also inspire.</p>
    
                </div>
                <div class="w3-container w3-cell w3-col s4 w3-mobile">
                    <p>Exploring the vast realms of technology fuels my enthusiasm. It’s not just about writing lines of code; it’s about creating experiences, solving problems, and embracing the ever-evolving landscape of software development.</p>
                    <p>Let’s build the future together.</p>
    
                </div>
                <div class="w3-container w3-cell w3-col s4 w3-mobile">
                    <img src="images/laptop_image.png" alt="">
                </div>
                <div class="w3-center">
                    <button class="w3-button w3-round" onclick="window.location.href = 'contact.php'" style="background-color: #eb5b51; color: white;">Contact Me</button> 
                </div>
           </div>
    
           <div class="svgshape">
            <div class="w3-center">
                <h3 class="w3-text-theme"><strong>What Services I'm Providing</strong></h3>
                <p><b>Professional software solutions and ideas to streamline your workflow and elevate your digital presence.</b></p>
            </div>
            <div class="w3-row-padding">
                <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
                    <div class="w3-card-4 w3-padding">
                    <div class="w3-container">
                        <p class="large"><strong>UI/UX Design</strong></p>
                        <p><strong>Skills(Figma, Skecth, Adobe)</strong></p>
                        <p>Effective UI/UX design is paramount to ensuring user satisfaction and engagement. It involves creating intuitive interfaces and seamless experiences that prioritize usability and functionality. This meticulous approach enhances user interaction and overall satisfaction.</p>
                        <br>
                        <p class="w3-center"><i class="fas fa-arrow-circle-right fa-2x"></i></p>
                    </div>
                    </div>
                </div>
                <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
                    <div class="w3-card-4 w3-padding">
                    <div class="w3-container">
                        <p class="large"><strong>Android App Development(UI)</strong></p>
                        <p><strong>Skills(Kotlin, Jetpack Compose)</strong></p>
                        <p>By blending cutting-edge technology with user-centric design principles, I create apps that captivate and engage users while meeting business objectives. Passion for excellence drives delivering high-performance, scalable apps tailored to your unique needs.</p>
                        <br>
                        <p class="w3-center"><i class="fas fa-arrow-circle-right fa-2x"></i></p>
                    </div>
                    </div>
                </div>
                <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
                    <div class="w3-card-4 w3-padding">    
                    <div class="w3-container">
                        <p class="large"><strong>Web Development</strong></p>
                        <p><strong>Skills(HTML, CSS, W3.css, Javascript, PHP, Mysql)</strong></p>
                        <p>My approach blends creativity and technical expertise to build responsive, dynamic websites that leave a lasting impression. From elegant designs to robust functionalities, I tailor solutions to align with brand identity and business goals. </p>
                        <br>
                        <p class="w3-center"><i class="fas fa-arrow-circle-right fa-2x"></i></p>
                    </div>
                    </div>
                </div>
            </div>
    
           </div>
           <div>
            <img class="w3-image" src="images/photo_2.png" alt="" style="max-height:400px; width: 100%;">
           </div>
       </div>

       <div class="w3-center">
        <h2 class="w3-text-theme"><strong>Work Experience</strong></h2>
        <p>Delivering innovative solutions with precision and expertise.</p>
       </div>
       <div class="w3-row-padding">
            <div class="w3-panel w3-center w3-col w3-mobile" style="width: 48%">
                <div class="w3-card-4 w3-padding">
                <h4><strong>UI/UX Designer</strong></h4>
                <p><strong>2023-2024</strong></p>
                <p>Crafted intuitive interfaces ensuring user-centric designs, optimizing experiences for diverse digital platforms and audiences.</p>
                <div class="w3-light-grey w3-round-xlarge">
                    <div class="w3-container w3-theme w3-round-xlarge w3-tiny" style="width: 30%;">UI/UX 30%</div>

                </div>
                <hr>
                </div>
            </div>
           
            <div class="w3-panel w3-center w3-col w3-mobile" style="width: 48%">
                <div class="w3-card-4 w3-padding">
                <h4><strong>Database Management</strong></h4>
                <p><strong>2023-2024</strong></p>
                <p>Designed and managed robust databases, ensuring data integrity and optimal performance for efficient system operations.</p>
                <div class="w3-light-grey w3-round-xlarge">
                    <div class="w3-container w3-theme w3-round-xlarge w3-tiny" style="width: 40%;">Database Mgt 40%</div>

                </div>
                <hr>
                </div>
            </div>
       </div>
       <div class="w3-row-padding">
        <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
            <div class="w3-card-4 w3-padding">
            <h4><strong>Web Developer</strong></h4>
            <p><strong>2023-2024</strong></p>
            <p>Created responsive and dynamic web solutions, integrating modern technologies for seamless user experiences and efficient functionality.</p>
            <div class="w3-light-grey w3-round-xlarge">
                <div class="w3-container w3-theme w3-round-xlarge w3-tiny" style="width: 65%;">Web Developer 65%</div>

            </div>
            <hr>
            </div>
        </div>
        <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
            <div class="w3-card-4 w3-padding">
            <h4><strong>Graphic Designer</strong></h4>
            <p><strong>2023-2024</strong></p>
            <p>Crafted visually engaging designs, blending creativity and strategy to deliver impactful visual solutions across various platforms.</p>
            <div class="w3-light-grey w3-round-xlarge">
                <div class="w3-container w3-theme w3-round-xlarge w3-tiny" style="width: 60%;">Graphic Designer 60%</div>

            </div>
            <hr>
            </div>
        </div>
        <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
            <div class="w3-card-4 w3-padding">
            <h4><strong>Android App Developer</strong></h4>
            <p><strong>2023-2024</strong></p>
            <p>Designed and developed intuitive mobile applications, focusing on user experience and functionality to meet objectives effectively.</p>
            <div class="w3-light-grey w3-round-xlarge">
                <div class="w3-container w3-theme w3-round-xlarge w3-tiny" style="width: 40%;">Mobile App 40%</div>

            </div>
            <hr>
            </div>
        </div>
   </div>


   <!--My Portfolio-->
   <div>
        <div class="w3-center">
            <h2 class="w3-text-theme"><strong>My Portfolio</strong></h2>
            <p>Explore my portfolio showcasing diverse skills and creative projects.</p>
        </div>
        
        <div class="w3-content w3-display-container">
            <div class="mySlides w3-animate-zoom">
                <img class="w3-image" src="images/portfolio_1.jpg" alt="" style="width: 100%; max-height: 300px;">
                <p class="w3-theme w3-center">SOKO E-commerce-Website (Web Development)</p>
            </div>
            <div class="mySlides w3-animate-zoom">
                <img class="w3-image" src="images/portfolio_5.jpg" alt="" style="width: 100%; max-height: 300px;">
                <p class="w3-theme w3-center">UI/UX Design</p>
            </div>
            <div class="mySlides w3-animate-zoom">
                <img class="w3-image" src="images/portfolio_8.jpg" alt="" style="width: 100%; max-height: 300px;">
                <p class="w3-theme w3-center">Graphic Design</p>
            </div>
            <div class="mySlides w3-animate-zoom">
                <img class="w3-image" src="images/portfolio_9.jpg" alt="" style="width: 100%; max-height: 300px;">
                <p class="w3-theme w3-center">Mpesa Bank Android Application</p>
            </div>
            <div class="mySlides w3-animate-zoom">
                <img class="w3-image" src="images/portfolio_6.jpg" alt="" style="width: 100%; max-height: 300px;">
                <p class="w3-theme w3-center">Calculator Application</p>
            </div>

            <button class="w3-button w3-theme w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="w3-button w3-theme w3-display-right" onclick="plusDivs(1)">&#10095;</button>
        </div>
   </div>

   <!--What My Clients Says-->
   <div>
    <div class="w3-center">
        <h2 class="w3-text-theme"><strong>What My Clients Says</strong></h2>
    </div>
    <div class="w3-row-padding">
        <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
            <div class="w3-card-4 w3-padding">
            <div class="w3-container ">
                <h1 class="w3-text-red w3-xxlarge w3-center">"</h1>
                <img class="w3-image" src="images/profile_pic1.png" alt=""><br>
                <p class="w3-center">Professionalism at its best! Your creativity, dedication, and reliability made my project a success.</p>
                <div>
                    <br>
                    <p class="w3-center">Amos N</p>
                </div>
            </div>
            </div>
        </div>

        <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
            <div class="w3-card-4 w3-padding">
                <div class="w3-container">
                <h1 class="w3-text-red w3-xxlarge w3-center">"</h1>
                <img class="w3-image" src="images/img_avatar3.png" alt="" style="max-width: 200px;"><br>
                <p class="w3-center">Highly recommend! Your expertise and support throughout were invaluable to my business growth.</p>
                <div>
                    <p class="w3-center">Jane Smith</p>
                </div>
            </div>
            </div>
        </div>

        <div class="w3-panel w3-center w3-col w3-mobile" style="width: 33%">
            <div class="w3-card-4 w3-padding">
                <div class="w3-container">
                <h1 class="w3-text-red w3-xxlarge w3-center">"</h1>
                <img class="w3-image" src="images/img_avatar3.png" alt="" style="max-width: 200px;"><br>
                <p class="w3-center">Exceptional service! Your attention and creativity to detail and timely delivery exceeded my expectations.</p>
                <div>
                    <p class="w3-center">Michael Johnson</p>
                </div>
            </div>
            </div>
        </div>
    </div>
   </div>

   <!--Get in Touch-->
   <div class="w3-panel w3-center w3-card-2 w3-margin" style="padding: 70px 20px 70px 20px;">
    <h2 class="w3-text-theme"><strong>Stay In Touch</strong></h2><br>
   <p>To keep in touch, enter your email address below.</p><br>
    
   <form class="w3-container" action="" method="POST">

        <input type="email" name="email" placeholder="Enter Email address" required class="w3-border w3-round" style="max-width: 400px;">
        <input type="submit" value="Subscribe" class="w3-button w3-round hire-me-btn">

    </form>
  
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
            <a class="w3-button w3-round hire-me-btn w3-display-middle" href="contact.php">Contact Me</a> 
            </div>           
            </footer>
        </div>
    </div>
           <script>
            function displayModal() {
                var modal = document.getElementById('id01');
                var modalMessage = '<?php echo $modal_message; ?>';
                if (modalMessage !== '') {
                    modal.style.display = 'block';
                }
            }

            // Call the displayModal function when the page loads
            window.onload = function () {
                displayModal();
            };
            </script>

           
            <script>
            closeSidebar();
            function openSidebar() {
              document.getElementById("mySidebar").style.display = "block";
            }
            

            function closeSidebar() {
              document.getElementById("mySidebar").style.display = "none";
            }
            //function to scroll to about

            function scrollToSection(About_Me) {
                // Get the target element based on its ID
                var targetElement = document.getElementById(About_Me);
                if (targetElement) {
                    // Scroll to the target element smoothly
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            }
            </script>
         <!--Manual slideshow-->
            <script>
                var slideIndex = 1;
                showDivs(slideIndex);
                
                function plusDivs(n) {
                showDivs(slideIndex += n);
                }
                
                function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                if (n > x.length) {slideIndex = 1}
                if (n < 1) {slideIndex = x.length}
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                }
                x[slideIndex-1].style.display = "block";  
                }
                </script>

            <!--Automatic slideshow-->
            <script>
                var myIndex = 0;
                carousel();
                
                function carousel() {
                  var i;
                  var x = document.getElementsByClassName("mySlides");
                  for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                  }
                  myIndex++;
                  if (myIndex > x.length) {myIndex = 1}    
                  x[myIndex-1].style.display = "block";  
                  setTimeout(carousel, 5000); // Change image every 5 seconds
                }
                </script>

                <script>
                     //to open a section on contact page
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