<?php
    $host = "sql207.infinityfree.com";
    $username = "if0_36404256";
    $password = "D7D7CcJqNLHtgK";
    $database_name = "if0_36404256_my_portfolio";

    //Create connection
    $con = new mysqli($host, $username, $password, $database_name);

    //Checking connection
    if($con->connect_error) { 
        die("Connection Failed: " . $con->connect_error);
    }
    
    