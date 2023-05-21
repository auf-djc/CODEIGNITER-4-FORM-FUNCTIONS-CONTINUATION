<?php
require "config.php";
use App\User;
$users = User::list();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <style>
        body {
            font-family: Courier;
            background-image: url("https://disdukcapil.bone.go.id/wp-content/uploads/2019/12/09c02cf90d47f15c74cc4c0ba5ec7db3.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        h1 {
            text-align: center;
            font-size: 36px;
            color: #333;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        label {
            display: block;
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        input[type="password"] {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #555;
            background-color: #f5f5f5;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .radio-group {
            display: flex;
            flex-direction: row;
            margin-bottom: 20px;
        }

        .radio-group label {
            display: block;
            flex: 1;
            padding: 10px;
            font-size: 16px;
            color: #555;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 5px 5px 0 0;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease-in-out;
        }

        .radio-group input[type="radio"] {
            display: none;
        }

        .radio-group input[type="radio"]:checked + label {
            background-color: #5095cd;
            color: #fff;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 18px;
            color: #fff;
            background-color: #5095cd;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #444;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            color: #fff;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            border-spacing: 0;
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            font-weight: bold;
            background-color: #333;
            color: #fff;
            border-top: 2px solid #333;
        }
    </style>

<script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const radioButtons = document.querySelectorAll('input[type="radio"]');
            radioButtons.forEach(function(button) {
                button.addEventListener('change', function() {
                    radioButtons.forEach(function(btn) {
                        if (btn.checked) {
                            btn.parentElement.style.backgroundColor = '#5095cd';
                            btn.parentElement.style.color = '#fff';
                        } else {
                            btn.parentElement.style.backgroundColor = '#f5f5f5';
                            btn.parentElement.style.color = '#555';
                        }
                    });
                });
            });
        });
    </script>



</head>
<body>
<h1>David Joshua Canlas</h1>

<form action="save-registration.php" method="POST">
    <h1>User Form</h1>

    <div>
        <label>Last Name</label>
        <input type="text" name="last_name" placeholder="Last Name" required/>
    </div>

    <div>
        <label>First Name</label>
        <input type="text" name="first_name" placeholder="First Name" required/>
    </div>

    <div>
        <label>Middle Name</label>
        <input type="text" name="middle_name" placeholder="Middle Name" required/>
    </div>

    <div>
        <label>Date of Birth</label>
        <input type="date" name="birthdate" required/>
    </div>

    <div>
        <label>Address</label>
        <input type="text" name="address" placeholder="Address"required/>
    </div>

    <div>
        <label>Zip Code</label>
        <input type="text" name="zip_code" placeholder="Zip Code" required/>
    </div>

    <div>
        <label>Gender</label>
        <div class="radio-group">
            <label>
                <input type="radio" name="gender" required value="Male">
                Male
            </label>
            <label>
                <input type="radio" name="gender" required value="Female">
                Female
            </label>
        </div>
    </div>

    <div>
        <label>Contact Number</label>
        <input type="text" name="contact_number" placeholder="Contact Number" required/>
    </div>

    <div>
        <label>Email Address</label>
        <input type="email" name="email" placeholder="email@address.com" required/>
    </div>

    <div>
        <label>Password</label>
        <input type="password" id="password" name="password" minlength="8" placeholder="at least 8 alphanumeric characters"required/>
    </div>

    <br>
    <div>
        <button type="submit" style="background-color: #5095cd;">Register User</button>
    </div>
</form>

<h2>Saved Users</h2>
<table border="1" cellpadding="5">
    <thead>
    <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Date of Birth</th>
        <th>Address</th>
        <th>Zip Code</th>
        <th>Gender</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user->getLastName() ?></td>
            <td><?= $user->getFirstName() ?></td>
            <td><?= $user->getMiddleName() ?></td>
            <td><?= $user->getBirthdate() ?></td>
            <td><?= $user->getAddress() ?></td>
            <td><?= $user->getZipCode() ?></td>
            <td><?= $user->getGender() ?></td>
            <td><?= $user->getContactNumber() ?></td>
            <td><?= $user->getEmail() ?></td>
            <td><?= $user->getPassword() ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
