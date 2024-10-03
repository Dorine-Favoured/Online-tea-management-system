<?php

$email = $_POST['email'];
$password = $_POST['password'];
echo $idnumber;
//Database Connection

//Database Connection
$con = new mysqli ("localhost","root","","thumaita");
if ($con->connect_error) {
	die("Failed to connect : ".$con->connect_error);
}else{
	$stmt=$con->prepare("select * from admin where email = ?"); 
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$stmt_result = $stmt->get_result();
	if ($stmt_result->num_rows > 0) {
		$data = $stmt_result->fetch_assoc();
		if($data ['password']=== $password) {
			echo "login successfully";
			header("location: admhome.php");
		}else{
			echo "invalid";
		}
		}	else{
			echo "invalid idnumber or password";
		}
	}
?>
<script>
if (response === "login successfully") {
    window.location.href = "admhome.php";
}
</script>