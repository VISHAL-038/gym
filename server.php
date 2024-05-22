<?php
$insert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'gym';
    
    // Create a connection
    $con = new mysqli($server, $username, $password, $db);
    
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $name = $_POST["name"];
    $number = $_POST["number"];

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO `contact` (`name`, `number`) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $number);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Successfully inserted";
        $insert = true;
    } else {
        echo "ERROR: $stmt->error";
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
}
?>
