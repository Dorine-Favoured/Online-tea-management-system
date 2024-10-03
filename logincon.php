<?php
session_start(); // Start the session

// Collect the form data
$idnumber = $_POST['idnumber'];
$password = $_POST['password'];

// Database Connection
$con = new mysqli("localhost", "root", "", "thumaita");

if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
} else {
    $stmt = $con->prepare("SELECT * FROM registration WHERE idnumber = ?");
    $stmt->bind_param("s", $idnumber);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['password'] === $password) {
            // Login successful
            $_SESSION['idnumber'] = $idnumber; 
            $_SESSION['name'] = $data['name']; 
            
            header("Location: dashboard.php");
            exit(); // Exit to ensure no further code is executed
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid ID number or password.";
    }
    $stmt->close();
}
$con->close();
?>
