<!DOCTYPE html>
<html lang="en">
<head>
    <title>Report Status</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="adm.css">
    <link rel="icon" href="log.jfif">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }
        .container {
            display: flex;
            width: 100%;
            margin: 0;
            max-width: none;
            padding: 0;
        }
        .sidebar {
            width: 250px;
            background-color: #4CAF50;
            color: white;
            padding: 20px;
        }
        .sidebar .logo {
            height: 50px;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }
        .sidebar ul li a:hover {
            background-color: #45a049;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .table-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo"></div>
            <ul class="menu">
                <li><a href="dashboard.php"><h2><span>Dashboard</span></h2></a></li>
                <li><a href="index.php"><span>Home</span></a></li>
                <li><a href="records.php"><span>Your Tea Records</span></a></li>
                <li><a href="season.php"><span>Requirements of a season</span></a></li>
                <li><a href="report.php"><span>Report an Issue</span></a></li>
                <li><a href="reportstatus.php"><span>Report Status</span></a></li>
                <li><a href="logout.php"><span>Log Out</span></a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Submitted Issues</h1>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Issue Type</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Admin Response</th>
                        </tr>
                    </thead>
                    <tbody>
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
                        
                       // Fetch the idnumber from the session
$idnumber = $_SESSION['idnumber'];

// Prepare SQL statement to fetch reports for the logged-in user
$sql = "SELECT issue_type, description, priority, status FROM report WHERE idnumber = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $idnumber);
$stmt->execute();
$result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['issue_type']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['priority']) . "</td>";
                                echo "<td>" . (empty($row['admin_response']) ? 'Pending' : htmlspecialchars($row['admin_response'])) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No issues found</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>