<?php

require "config.php";

use App\User;

// Save the user information, and automatically login the user

try {
	$last_name = $_POST['last_name'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$birthdate = $_POST['birthdate'];
	$address = $_POST['address'];
	$zip_code = $_POST['zip_code'];
	$gender = $_POST['gender'];
	$contact_number = $_POST['contact_number'];
	$email = $_POST['email'];
	$password = $_POST['password'];



	$result = User::register($last_name, $first_name, $middle_name, $birthdate, $address, $zip_code, $gender, $contact_number, $email, $password);

	if ($result) {

		// Set the logged in session variable and redirect user to index page

		//$_SESSION['is_logged_in'] = true;
		//$_SESSION['user'] = [
		//	'id' => $result,
		//	'fullname' => $first_name . ' ' . $last_name,
		//	'email' => $email
		//];
		header('Location: register.php');
	}

} catch (PDOException $e) {
	error_log($e->getMessage());
	echo "<h1 style='color: red'>" . $e->getMessage() . "</h1>";
}

