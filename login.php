<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to validate user credentials
function validateCredentials($username, $password) {
    // Read login data from text file
    $loginData = file('login_data.txt', FILE_IGNORE_NEW_LINES);

    // Loop through each line in the file
    foreach ($loginData as $line) {
        list($storedUsername, $storedPassword) = explode('|', $line);
        // Check if username and password match
        if ($username == $storedUsername && $password == $storedPassword) {
            return true; // Credentials are valid
        }
    }
    return false; // Credentials are invalid
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user credentials
    if (validateCredentials($username, $password)) {
        // Redirect user to next page
        header("Location: index.html");
        exit();
    } else {
        // Handle invalid login
        echo "Invalid username or password";
    }
}
?>
