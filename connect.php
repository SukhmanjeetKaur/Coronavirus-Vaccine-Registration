<?php
	$name = $_POST['name'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$aadhar = $_POST['aadhar'];
	$blood= $_POST['blood'];
	$phone= $_POST['phone'];

	// Database connection
	$conn = new mysqli('localhost','root','','covidreg');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, age, gender, aadhar, blood, phone) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $name, $age, $gender, $aadhar, $blood, $phone);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully, we will shortly connect with you. Thank you";
		$stmt->close();
		$conn->close();
	}
?>