
<?php
   
    include('../db.php');

     $usernameErr = $passwordErr = '';

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Fetch username and password from the form
            $username = $_POST['username'];
            $password = $_POST['password'];
            $redirectURL = isset($_POST['redirect_url']) ? $_POST['redirect_url'] : 'index.php'; // Default redirect URL

            // Fetch data from the admin table for the provided username
            $query = "SELECT * FROM admin WHERE UserName='$username' LIMIT 1";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                // Username exists, now check password
                $adminData = mysqli_fetch_assoc($result);
                $storedPassword = $adminData['Password'];

                // Verify the password
                if ($password === $storedPassword) {
                    // Password is correct, set session variables and redirect
                    $_SESSION['admin_username'] = $adminData['UserName'];
                    // You can set more session variables as needed

                    // Redirect to the stored URL or default URL
                    header("Location: " . $redirectURL);
                    exit(); // Ensure script stops executing after redirection
                } else {
                    $passwordErr = "Invalid password!";
                }
            } else {
                $usernameErr = "Invalid username!";
            }
        }


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio Login</title>
        <link rel="icon" href="../images/portfolio.png" type="image/png">

        <link rel="stylesheet" href="../w3.css">
</head>
<body>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center"><br>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
            <h3 class="w3-text-theme">Login</h3>
            <img src="../images/img_avatar3.png" alt="Avatar" style="width:100px" class="w3-circle">
        </div>

        <form class="w3-container" action="" method="POST">
                <?php if ($usernameErr): ?>
                        <p class='w3-text-red'><strong><?php echo $usernameErr; ?></strong></p>
                    <?php endif; ?>
                    <?php if ($passwordErr): ?>
                        <p class='w3-text-red'><strong><?php echo $passwordErr; ?></strong></p>
                    <?php endif; ?>
            <div class="w3-section">
                <!-- Add this hidden input field inside your form -->
                <input type="hidden" name="redirect_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

                <label><b>Username</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
                <label><b>Password</b></label>
                <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
                <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
            </div>
        </form>

        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
            <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
        </div>
    </div>
</div>
            <script>
            // Function to display the modal
            function displayModal() {
                document.getElementById('id01').style.display = 'block';
            }

            // Call the function to display the modal when needed
            displayModal(); // This should be called when you want the modal to appear
            </script>
</body>
</html>
