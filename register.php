<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Reset some default styles */
        body, h1, p, a {
            margin: 0;
            padding: 0;
        }

        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        /* Main container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Form section styling */
        .form-section {
            background-color: #fff;
            width: 100%;
            max-width: 400px;
            padding: 30px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        /* Heading styling */
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        /* Label and input styling */
        label {
            font-size: 16px;
            margin-bottom: 5px;
            color: #333;
            text-align: left;
            display: block;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Paragraph and link styling */
        p {
            margin-top: 10px;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Image section (optional) */
        .image-section {
            display: none;
        }
    </style>
    <script>
        function validateForm() {
            var x = document.getElementById("email").value;
            if (x == null || x == "" ) {
                alert("Email cannot be empty!");
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="form-section">
            <h1>Register</h1>
            <form action="" method="POST" onsubmit="return validateForm()">
                <label for="full_name">Full Name :</label>
                <input type="text" name="full_name" id="full_name" required><br><br>

                <label for="email">Email :</label>
                <input type="email" name="email" id="email" ><br><br>

                <label for="password">Password :</label>
                <input type="password" name="password" required><br><br>

                <label for="phone_number">Phone Number :</label>
                <input type="text" name="phone_number" id="phone_number"><br><br>

                <label for="address">Address :</label>
                <input type="text" name="address" id="address"><br><br>

                <input type="submit" name="submit" value="Register">
                <p>Already have an account? <a href="login.php">Login Now</a></p>
            </form>
        </div>
        <div class="image-section"></div>
    </div>

    <?php
    include "Connect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Receive data from the form
        $full_name = $_POST["full_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $phone_number = $_POST["phone_number"];
        $address = $_POST["address"];

        // Use prepared statements to avoid SQL injection
        $sql = "INSERT INTO Users (FullName, Email, Password, PhoneNumber, Address) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters to the SQL query
        mysqli_stmt_bind_param($stmt, "sssss", $full_name, $email, $password, $phone_number, $address);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Registration successful!');</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>

</html>
