<?php
	session_start();
	$conn = new mysqli("localhost", "pashand_hospital", "123456", "pashand_hospital");

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	if(isset($_POST['username']) && isset($_POST['password'])){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "SELECT `username`, `password` FROM `login` WHERE `username`='$username' AND `password` = '$password'";
		
		
		
		
		$result = $conn->query($sql);
		
		
		if ($row = $result->fetch_assoc()) {
			
			header('Location: home.html');
		}
		
		else {
			$msg = "Invalid/Bad Login Details";
			echo $msg. "<br>";	
			echo "<a href='login.html'><b>Login</b></a>";
		}
	}
	else {
		$msg = "Invalid/Incomplete Login Details";
		echo $msg. "<br>";	
		echo "<a href='login.html'><b>Login</b></a>";
	}
	
	$conn->close();
?>