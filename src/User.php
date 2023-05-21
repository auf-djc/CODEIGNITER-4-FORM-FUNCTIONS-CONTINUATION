<?php

namespace App;

use PDO;

class User
{
	protected $id;
	protected $last_name;
	protected $first_name;
	protected $middle_name;
	protected $birthdate;
	protected $address;
	protected $zip_code;
	protected $gender;
	protected $contact_number;
	protected $email;
	protected $password;
	protected $created_at;

	public function getId()
	{
		return $this->id;
	}

	public function getLastName()
	{
		return $this->last_name;
	}	

	public function getFirstName()
	{
		return $this->first_name;
	}

	public function getMiddleName()
	{
		return $this->middle_name;
	}

	public function getBirthdate()
	{
		return $this->birthdate;
	}

	public function getAddress()
	{
		return $this->address;
	}

	public function getZipCode()
	{
		return $this->zip_code;
	}	

	public function getGender()
	{
		return $this->gender;
	}

	public function getContactNumber()
	{
		return $this->contact_number;
	}
	
	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}



	public static function list()
	{
		global $conn;

		try {
			$sql = "SELECT * FROM users";
			$statement = $conn->query($sql);
			
			$users = [];
			while ($row = $statement->fetchObject('App\User')) {
				array_push($users, $row);
			}

			return $users;
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return null;
	}



	public static function getById($id)
	{
		global $conn;

		try {
			$sql = "
				SELECT * FROM users
				WHERE id=:id
				LIMIT 1
			";
			$statement = $conn->prepare($sql);
			$statement->execute([
				'id' => $id
			]);
			$result = $statement->fetchObject('App\User');
			return $result;
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return null;
	}
	

public static function register($last_name, $first_name, $middle_name, $birthdate, $address, $zip_code, $gender, $contact_number, $email, $password)
{
    global $conn;

    try {

        $sql = "
            INSERT INTO users (last_name, first_name, middle_name, birthdate, address, zip_code, gender, contact_number, email, password)
            VALUES ('$last_name', '$first_name', '$middle_name', '$birthdate', '$address', '$zip_code', '$gender', '$contact_number', '$email', '$password')
        ";
        $conn->exec($sql);
        // echo "<li>Executed SQL query " . $sql;
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        error_log($e->getMessage());
    }

    return false;
}


	public static function registerMany($users)
	{
		global $conn;

		try {
			foreach ($users as $user) {
				// Hash the password before inserting it into DB
				$hashed_password = self::hashPassword($user['password']);

				$sql = "
					INSERT INTO users
					SET
						last_name=\"{$user['last_name']}\",
						first_name=\"{$user['first_name']}\",
						middle_name=\"{$user['first_name']}\",
						birthdate=\"{$user['birthdate']}\",
						address=\"{$user['address']}\",
						zip_code=\"{$user['first_name']}\",  
						gender=\"{$user['gender']}\",
						contact_number=\"{$user['contact_number']}\",
						email=\"{$user['email']}\",
						password=\"{$user['password']}\"
				";
				$conn->exec($sql);
				// echo "<li>Executed SQL query " . $sql;
			}
			return true;
		} catch (PDOException $e) {
			error_log($e->getMessage());
		}

		return false;
	}
}