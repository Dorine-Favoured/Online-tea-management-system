
<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thumaita";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$issue_type = $_POST['issue-type'];
$description = $_POST['description'];
$priority = $_POST['priority'];

session_start();
$idnumber = $_SESSION['idnumber'];

// Prepare SQL statement to insert data into the report table
$sql = "INSERT INTO report (issue_type, description, priority, idnumber) 
        VALUES (?, ?, ?, ?)";



$stmt = $conn->prepare($sql);

// Bind parameters to the prepared statement
$stmt->bind_param("ssss", $issue_type, $description, $priority, $idnumber);

// Execute the statement
if ($stmt->execute()) {
    echo "New report submitted successfully";
    header("location: reportstatus.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
<script>
    if (response == "New report submitted successfully") {window.location.href = reportstatus}
</script>