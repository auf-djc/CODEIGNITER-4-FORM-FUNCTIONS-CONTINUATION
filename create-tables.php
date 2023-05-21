<?php

require "config.php";

try {
	$sql_users = "
		CREATE TABLE IF NOT EXISTS users (
			id INT AUTO_INCREMENT PRIMARY KEY,
			last_name VARCHAR(50) NOT NULL,
			first_name VARCHAR(50) NOT NULL,
			middle_name VARCHAR(50) NOT NULL,
			birthdate DATE NOT NULL,
			address VARCHAR(255) NOT NULL,
			zip_code VARCHAR(10) NOT NULL,
			gender CHAR(6) NOT NULL,
			contact_number VARCHAR(20) NOT NULL,
			email VARCHAR(50) UNIQUE NOT NULL,
			password VARCHAR(500) NOT NULL,
			created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
		)
	";
	$conn->exec($sql_users);
	echo "<li>Created users table";

} catch (PDOException $e) {
	error_log($e->getMessage());
	echo "<h1 style='color: red'>" . $e->getMessage() . "</h1>";
}

