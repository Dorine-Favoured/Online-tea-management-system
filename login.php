<!DOCTYPE html>
<html>
<head>
  <title>Thumaita Login</title>
  <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="in.css">
  <link rel="icon" href="log.jfif">
</head>
<body class="body-home">
  <div class="black-fill"><br /> <br />
  <div class="container">

<form action="logincon.php" method="post">
      <div class="text-center">
        <img src="log.jfif" width="100">
      </div>
      <h3><center><b>LOGIN</b></center></h3>
      
      
  <label for ="idnumber" class="form-label">Id Number</label>
    <input type="text" class="form-control" name="idnumber" required>
    

    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" required>
  <br /><br />
  
  <button type="submit" class="btn btn-primary">Log In</button>
</form>
<a href="signup.php">Create an account</a>


<div class="contacts">
  <h7>Copyright & Copy; 2024 Thumaita Tea. All rights Reserved.</h7>
</div>



  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>