<?php
session_start(); // Access session variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thumaita";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// These are the variables needed
$message = '';
$farmer_name = '';
$records = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idnumber = $_POST['idnumber'];
    
    // Check if the idnumber entered matches the session idnumber
    if ($idnumber !== $_SESSION['idnumber']) {
        $message = "The ID number you entered does not match your logged-in ID number.";
    } else {
        // Fetch farmer's name
        $name_sql = "SELECT name FROM registration WHERE idnumber = ?";
        $name_stmt = $conn->prepare($name_sql);
        $name_stmt->bind_param("s", $idnumber);
        $name_stmt->execute();
        $name_result = $name_stmt->get_result();
        
        if ($name_result->num_rows > 0) {
            $farmer_name = $name_result->fetch_assoc()['name'];

            // Fetch records
            $records_sql = "SELECT date, kilos FROM records WHERE idnumber = ? ORDER BY date DESC";
            $records_stmt = $conn->prepare($records_sql);
            $records_stmt->bind_param("s", $idnumber);
            $records_stmt->execute();
            $records_result = $records_stmt->get_result();
            
            while ($row = $records_result->fetch_assoc()) {
                $records[] = $row;
            }

            $records_stmt->close();
        } else {
            $message = "No farmer found with this ID number.";
        }

        $name_stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Tea Sales Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="in.css">
    <link rel="icon" href="log.jfif">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background-color: #4CAF50;
            color: white;
            padding: 20px;
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
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li>
                <a href="dashboard.php"><h2><span>Dashboard</span></h2></a>
            </li>
            <li>
                <a href="index.php"><span>Home</span></a>
            </li>
            <li>
                <a href="records.php"><span>Your Tea Records</span></a>
            </li>
            <li>
                <a href="season.php"><span>Requirements of a season</span></a>
            </li>
            <li>
                <a href="report.php"><span>Report an Issue</span></a>
            </li>
            <li>
                <a href="reportstatus.php"><span>Issue Status</span></a>
            </li>
            <li>
                <a href="logout.php"><span>Log Out</span></a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="container mt-5">
            <h1 class="mb-4">Farmer Tea Sales Records</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mb-4">
                <div class="mb-3">
                    <label for="idnumber" class="form-label">Enter Farmer ID Number:</label>
                    <input type="text" class="form-control" id="idnumber" name="idnumber" required>
                </div>
                <button type="submit" class="btn btn-primary">View Records</button>
            </form>

            <?php if ($message): ?>
                <div class="alert alert-warning"><?php echo $message; ?></div>
            <?php endif; ?>

            <?php if ($farmer_name): ?>
                <h2>Records for <?php echo htmlspecialchars($farmer_name); ?></h2>
                <?php if (count($records) > 0): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Kilos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records as $record): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($record['date']); ?></td>
                                    <td><?php echo htmlspecialchars($record['kilos']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No records found for this farmer.</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
