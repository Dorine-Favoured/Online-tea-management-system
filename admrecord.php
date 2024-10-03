<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thumaita";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idnumber = $_POST['idnumber'];
    $kilos = $_POST['kilos'];
    $date = $_POST['date'];

    // Check if the ID number exists in the registration table
    $check_sql = "SELECT * FROM registration WHERE idnumber = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $idnumber);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // ID number exists, proceed with inserting the record
        $insert_sql = "INSERT INTO records (idnumber, kilos, date) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sds", $idnumber, $kilos, $date);

        if ($insert_stmt->execute()) {
            $message = "<p class='alert alert-success'>Record added successfully</p>";
        } else {
            $message = "<p class='alert alert-danger'>Error: " . $insert_stmt->error . "</p>";
        }

        $insert_stmt->close();
    } else {
        $message = "<p class='alert alert-danger'>Error: Farmer with ID number $idnumber is not registered.</p>";
    }

    $check_stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="in.css">
    <link rel="icon" href="log.jfif">
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

            <div class="mt-4">
                <h2>Tea Sales Record Entry</h2>
                <?php echo $message; ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="mb-3">
                        <label for="idnumber" class="form-label">Farmer ID Number:</label>
                        <input type="text" class="form-control" id="idnumber" name="idnumber" required>
                    </div>

                    <div class="mb-3">
                        <label for="kilos" class="form-label">Kilos of Tea Sold:</label>
                        <input type="number" class="form-control" id="kilos" name="kilos" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date of Sale:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>