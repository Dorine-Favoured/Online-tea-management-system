<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thumaita";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for admin response
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_response'])) {
    $issue_id = $_POST['issue_id'];
    $admin_response = $_POST['admin_response'];
    
    $update_sql = "UPDATE report SET admin_response = ?, status = 'Resolved' WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("si", $admin_response, $issue_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch all reports
$sql = "SELECT * FROM report ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Issues</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="adm.css">
</head>
<body class="body-home">
    <div class="black-fill"><br /> <br />
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-body-tertiary" id="homeNav">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="log.jfif" width="40" alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="admhome.php">Home</a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link" href="admres.php">Issues</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admrecord.php">Records</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="container mt-5">
        <h1 class="mb-4">Manage Reported Issues</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    
                    <th>idnumber</th>
                
                    <th>Issue Type</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Admin Response</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['idnumber']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['issue_type']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['priority']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                        echo "<td>" . (empty($row['admin_response']) ? 'Not yet responded' : htmlspecialchars($row['admin_response'])) . "</td>";
                        echo "<td>";
                        if (empty($row['admin_response'])) {
                            echo "<button type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#responseModal" . $row['id'] . "'>Respond</button>";
                        }
                        echo "</td>";
                        echo "</tr>";

                        
                        echo "<div class='modal fade' id='responseModal" . $row['id'] . "' tabindex='-1' aria-labelledby='responseModalLabel" . $row['id'] . "' aria-hidden='true'>";
                        echo "<div class='modal-dialog'>";
                        echo "<div class='modal-content'>";
                        echo "<div class='modal-header'>";
                        echo "<h5 class='modal-title' id='responseModalLabel" . $row['id'] . "'>Respond to Issue #" . $row['id'] . "</h5>";
                        echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                        echo "</div>";
                        //this one creates the hidden part to write the response to the issue, a bootstrap modal
                        echo "<div class='modal-body'>";
                        echo "<form method='POST'>";
                        echo "<input type='hidden' name='issue_id' value='" . $row['id'] . "'>";
                        echo "<div class='mb-3'>";
                        echo "<label for='admin_response' class='form-label'>Your Response:</label>";
                        echo "<textarea class='form-control' id='admin_response' name='admin_response' rows='3' required></textarea>";
                        echo "</div>";
                        echo "<button type='submit' name='submit_response' class='btn btn-primary'>Submit Response</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No issues found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>