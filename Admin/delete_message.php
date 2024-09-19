
<?php
    // Include database connection
    include('../db.php');

    // Check if the message ID is provided in the URL
    if (isset($_GET['id'])) {
        // Sanitize the ID to prevent SQL injection
        $id = mysqli_real_escape_string($con, $_GET['id']);

        // Construct the delete query
        $delete_query = "DELETE FROM contacts WHERE id = '$id'";

        // Execute the delete query
        if (mysqli_query($con, $delete_query)) {
            // Redirect back to the messages page after deletion
            header("Location: index.php");
            exit(); // Ensure script execution stops after redirection
        } else {
            echo "Error deleting message: " . mysqli_error($con);
        }
    } else {
        echo "Message ID not provided.";
    }

    // Close the database connection
    mysqli_close($con);
?>
