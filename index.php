<!DOCTYPE html>
<html>
<head>
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
                    <img src="log.jfif" width="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-right mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Login
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="login.php">Farmer</a></li>
                                <li><a class="dropdown-item" href="adminloginin.php">Clerk</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="welcome-text d-flex justify-content-center align-items-center flex-column">
            <img src="log.jfif">
            <h4>Welcome to Thumaita Tea Information Center</h4>
            <p>Where we cultivate more than just tea, We cultivate experience</p>
        </section>    
        <section id="about" class="welcome-text d-flex justify-content-center align-items-center flex-column">
            <div class="card mb-3 card-1">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="log.jfif" class="img-fluid rounded-start" >
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><center>About</center></h5>
                            <p class="card-text">The information center provides valuable information. Whether you're a seasoned tea enthusiast or just beginning your journey into the world of tea farming, our comprehensive online platform has everything you need to nurture your passion for tea.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>    
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