<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Season</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="adm.css">
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
        #seasonsec table {
            border-collapse: collapse;
            width: 100%;
        }
        #seasonsec th, #seasonsec td {
            border: 1px solid black;
            padding: 8px;
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
        <div class="container">
            <div id="seasonsec">
                <h2>Every Season's Requirements</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Season</th>
                            <th>Activities</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Long Rains (March-May)</td>
                            <td>
                                <ul>
                                    <li>Main harvesting period</li>
                                    <li>Increased leaf production</li>
                                    <li>Soil conservation measures</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Cool Season (June-August)</td>
                            <td>
                                <ul>
                                    <li>Continued harvesting, but at a slower rate</li>
                                    <li>Pruning of tea bushes</li>
                                    <li>Fertilizer application</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Short Rains (October-December)</td>
                            <td>
                                <ul>
                                    <li>Second peak harvesting period</li>
                                    <li>Planting of new tea bushes</li>
                                    <li>Pest and disease management</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Dry Season (January-February)</td>
                            <td>
                                <ul>
                                    <li>Reduced harvesting</li>
                                    <li>Irrigation where possible</li>
                                    <li>Maintenance of processing facilities</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <section id="contact" class="welcome-text d-flex justify-content-center align-items-center flex-column">
                <div class="contacts">
                    <h6>CONTACTS</h6>
                    <p>Phone: 0101010101</p>
                    <p>Email: info@thumaita.co.ke</p>
                    <h7><center>Copyright &copy; 2024 Thumaita Tea. All rights Reserved.</center></h7>
                </div>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>