

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Report an Issue</title>
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
        }
        form {
            max-width: 600px;
            margin: 20px auto;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
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
                <li><a href="reportstatus.php"><span>Issue Status</span></a></li>
                <li><a href="logout.php"><span>Log Out</span></a></li>
            </ul>
        </div>
        <div class="content">
            <h1><center>Report an Issue</center></h1>
            <form action="reportconn.php" method="post">
                
                <label for="issue-type">Issue Type:</label>
                <select id="issue-type" name="issue-type" required>
                    <option value="">Select an issue type</option>
                    <option value="technical">Technical Problem</option>
                    <option value="billing">Complaint on our Personnel</option>
                    <option value="feedback">General Feedback</option>
                    <option value="other">Other</option>
                </select>
                
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="5" required></textarea>
                
                <label for="priority">Priority:</label>
                <select id="priority" name="priority" required>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
                
                <input type="submit" value="Submit Issue">
            </form>
            
            
        </div>
    </div>
</body>
</html>