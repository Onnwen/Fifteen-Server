<?php
	require_once("connection.php");

	$name = isset($_POST['name']) ? $_POST['name'] : null;
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$password = isset($_POST['password']) ? $_POST['password'] : null;

	if(is_null($name) || is_null($email) || is_null($password)){
		# Rispondiamo con 400, che vuol dire che la richiesta è sbagliata e quindi non posso rispondere
		http_response_code(400);
		exit();
	}

	$password = md5($password);

	$query = "INSERT INTO users(Name, Email, Password) VALUES ('". $name . "', '". $email . "', '". $password . "')";

	$result = mysqli_query($conn, $query);

	if($result){
		echo (1);
	}else{
		echo (0);
	}
?>