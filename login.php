<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
  
        }

        .form-section {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h1 {
            color: #5d4037; /* Earthy brown color */
            margin-bottom: 20px;
        }

        label {
            color: #4CAF50; /* Green color */
            margin: 10px 0 5px;
            display: block;
            text-align: left;
        }

        input[type="email"],
        input[type="password"] {
            width: 330px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Green color */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        p {
            margin-top: 20px;
            color: #5d4037;
        }

        a {
            color: #4CAF50; /* Green color */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .image-section {
            display: none; /* You can add an image here if needed */
        }
    </style>
    <script>
        function validateForm() {
            var x = document.getElementById("email").value;
            if (x == null || x == "") {
                alert("Email cannot be empty!");
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="form-section">
            <h1>Login</h1>
            <form action="" method="POST" onsubmit="return validateForm()">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" placeholder="Email" ><br>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" placeholder="Password" required><br>
                <input type="submit" name="submit" value="Login">
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </div>
        <div class="image-section"></div>
    </div>

    <?php
    include "Connect.php";
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Truy vấn để lấy thông tin người dùng
        $sql = "SELECT * FROM Users WHERE Email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Kiểm tra người dùng
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            // So sánh mật khẩu trực tiếp
            if ($password === $user['Password']) {
                $_SESSION['user_id'] = $user['UserID']; // Lưu user_id vào session
                header("Location: home.php"); // Chuyển hướng đến trang chủ
                exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "Invalid email.";
        }
    }

    mysqli_close($conn);
    ?>
</body>

</html>
