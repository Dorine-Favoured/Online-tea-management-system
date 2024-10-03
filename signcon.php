<?php
$name = $_POST['name'];
$idnumber = $_POST['idnumber'];
$email = $_POST['email'];
$password = $_POST['password'];

// Database Connection
$con = new mysqli("localhost", "root", "", "thumaita");
if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
} else {
    $stmt = $con->prepare("INSERT INTO registration(name, idnumber, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $idnumber, $email, $password);
    
    if ($stmt->execute()) {
        // Registration successful
        $stmt->close();
        $con->close();
        
        // Redirect to login.php
        header("Location: login.php");
        exit(); // Ensure that no other code is executed after the redirect
    } else {
        // Registration failed
        echo "Registration failed: " . $stmt->error;
        $stmt->close();
        $con->close();
    }
}
?>