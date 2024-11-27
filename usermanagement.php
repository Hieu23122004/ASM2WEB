<?php
session_start();
include "Connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
</head>

<style>
  /* General Styling */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
    line-height: 1.6;
}

/* Header */
.header {
    background-color: #2c3e50;
    color: white;
    padding: 15px 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.navbar ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}

.navbar ul li {
    display: inline;
}

.navbar ul li a {
    text-decoration: none;
    color: white;
    font-weight: 600;
    padding: 8px 16px;
    transition: background 0.3s, color 0.3s;
}

.navbar ul li a:hover {
    background: white;
    color: #2c3e50;
    border-radius: 4px;
}

/* Search Section */
.search-section {
    text-align: center;
    padding: 20px 0;
    background-color: #ecf0f1;
    border-bottom: 2px solid #bdc3c7;
}

.search-form {
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.search-input {
    padding: 10px;
    width: 70%;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
}

.search-btn {
    padding: 10px 20px;
    background-color: #27ae60;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s;
}

.search-btn:hover {
    background-color: #219150;
}

/* Banner */
.banner {
    text-align: center;
    margin: 30px 0;
}

.banner-img {
    width: 90%;
    max-width: 1200px;
    height: 500px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Product List Section */
.product-list h2 {
    font-size: 24px;
    color: #2c3e50;
    margin-bottom: 20px;
}

.product-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    padding: 20px;
}

.product {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
}

.product:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.product img {
    width: 100%;
    height: auto;
    max-height: 200px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 10px;
}

.product h3 {
    color: #2c3e50;
    font-size: 20px;
    margin: 10px 0;
}

.product p {
    font-size: 14px;
    color: #7f8c8d;
}

.product .btn {
    display: inline-block;
    padding: 8px 16px;
    background-color: #27ae60;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: bold;
    transition: background 0.3s;
}

.product .btn:hover {
    background-color: #219150;
}

.product input[type="number"] {
    width: 60px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-top: 10px;
}

/* Footer */
footer {
    background-color: #2c3e50;
    color: white;
    text-align: center;
    padding: 20px;
    margin-top: 30px;
    font-size: 14px;
    border-top: 2px solid #bdc3c7;
}
h2{
    text-align: center;
}

/* Căn giữa section */
.product-list {
    width: 80%; /* Đặt chiều rộng cho phần tử */
    margin: 0 auto; /* Căn giữa phần tử trong trang */
    padding: 20px;
    text-align: center;
}

/* Căn giữa bảng */
.product-list table {
    width: 100%; /* Đặt chiều rộng bảng là 100% của phần tử cha */
    margin: 20px 0; /* Thêm khoảng cách trên và dưới bảng */
    border-collapse: collapse; /* Đảm bảo các đường viền không chồng lên nhau */
    background-color: #f9f9f9; /* Màu nền bảng */
}

/* Định dạng cho các ô trong bảng */
.product-list th, .product-list td {
    padding: 10px;
    border: 1px solid #ddd; /* Đường viền nhẹ */
    text-align: center;
}

/* Định dạng cho ô tiêu đề */
.product-list th {
    background-color: #4CAF50; /* Màu nền cho tiêu đề */
    color: white; /* Màu chữ trắng */
}

/* Định dạng cho hàng khi hover */
.product-list tr:hover {
    background-color: #f1f1f1; /* Màu nền khi hover qua hàng */
}

/* Định dạng cho các ô trong bảng */
.product-list td {
    background-color: #ffffff; /* Màu nền cho ô dữ liệu */
}

/* Định dạng cho form thêm sản phẩm */
.user-form {
    width: 60%; /* Chiều rộng của form */
    margin: 20px auto; /* Căn giữa form */
    padding: 20px;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
}

/* Định dạng cho các trường nhập liệu trong form */
.user-form label {
    display: block;
    margin: 10px 0 5px;
}

.user-form input {
    width: 100%; /* Chiều rộng 100% cho các trường nhập liệu */
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.user-form button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.user-form button:hover {
    background-color: #45a049;
}


</style>

<body>

    <!-- Thanh Menu -->
    <header class="header">
        <nav class="navbar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="productdetail.php">Product Detail</a></li>
                <li><a href="usermanagement.php">User Management</a></li>
                <li><a href="cart.php">My Cart</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="login.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <section class="search-section">
        <form action="search.php" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search products..." class="search-input">
            <button type="submit" class="search-btn">Search</button>
        </form>
    </section>

    <!-- Khung Ảnh To -->



    <!-- Section Sản phẩm -->
    <section class="product-list">
        <h2>"Land Sale: A Long-Term Investment Opportunity"</h2>

        <table border="1">
            <thead>
                <tr>
                    <th>UserID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Handle user management actions: Add, Edit, Delete
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
                    $FullName = $_POST['FullName'];
                    $Email = $_POST['Email'];
                    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
                    $PhoneNumber = $_POST['PhoneNumber'];
                    $Address = $_POST['Address'];

                    $sql = "INSERT INTO Users (FullName, Email, Password, PhoneNumber, Address) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "sssss", $FullName, $Email, $Password, $PhoneNumber, $Address);

                    if (mysqli_stmt_execute($stmt)) {
                        echo "<p>User added successfully!</p>";
                    } else {
                        echo "<p>Error adding user: " . mysqli_error($conn) . "</p>";
                    }
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_user'])) {
                    $UserID = $_POST['UserID'];
                    $FullName = $_POST['FullName'];
                    $Email = $_POST['Email'];
                    $PhoneNumber = $_POST['PhoneNumber'];
                    $Address = $_POST['Address'];

                    $sql = "UPDATE Users SET FullName = ?, Email = ?, PhoneNumber = ?, Address = ? WHERE UserID = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "ssssi", $FullName, $Email, $PhoneNumber, $Address, $UserID);

                    if (mysqli_stmt_execute($stmt)) {
                        echo "<p>User updated successfully!</p>";
                    } else {
                        echo "<p>Error updating user: " . mysqli_error($conn) . "</p>";
                    }
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) {
                    $UserID = $_POST['UserID'];

                    $sql = "DELETE FROM Users WHERE UserID = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "i", $UserID);

                    if (mysqli_stmt_execute($stmt)) {
                        echo "<p>User deleted successfully!</p>";
                    } else {
                        echo "<p>Error deleting user: " . mysqli_error($conn) . "</p>";
                    }
                }

                // Fetch users from database
                $sql = "SELECT * FROM Users";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['UserID']; ?></td>
                        <td><?php echo htmlspecialchars($row['FullName']); ?></td>
                        <td><?php echo htmlspecialchars($row['Email']); ?></td>
                        <td><?php echo htmlspecialchars($row['PhoneNumber']); ?></td>
                        <td><?php echo htmlspecialchars($row['Address']); ?></td>
                        <td>
                            <!-- Edit User Form -->
                            <form action="usermanagement.php" method="POST" style="display:inline;">
                                <input type="hidden" name="UserID" value="<?php echo $row['UserID']; ?>">
                                <input type="text" name="FullName" value="<?php echo $row['FullName']; ?>">
                                <input type="email" name="Email" value="<?php echo $row['Email']; ?>">
                                <input type="text" name="PhoneNumber" value="<?php echo $row['PhoneNumber']; ?>">
                                <input type="text" name="Address" value="<?php echo $row['Address']; ?>">
                                <button type="submit" name="edit_user">Edit</button>
                            </form>
                            <!-- Delete User Button -->
                            <form action="usermanagement.php" method="POST" style="display:inline;">
                                <input type="hidden" name="UserID" value="<?php echo $row['UserID']; ?>">
                                <button type="submit" name="delete_user">Delete</button>
                            </form>
                        </td>
                    </tr>


                <?php } ?>
            </tbody>
        </table>

        <h2>User Management</h2>

        <!-- Add User Form -->
        <form action="usermanagement.php" method="POST" class="user-form">
            <h2>Add User</h2>
            <label for="FullName">Full Name:</label>
            <input type="text" name="FullName" required> <br>
            <label for="Email">Email:</label>
            <input type="email" name="Email" required> <br>
            <label for="Password">Password:</label>
            <input type="password" name="Password" required> <br>
            <label for="PhoneNumber">Phone Number:</label>
            <input type="text" name="PhoneNumber"> <br>
            <label for="Address">Address:</label>
            <input type="text" name="Address"> <br>
            <button type="submit" name="add_user">Add User</button>
        </form>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Your Website. All rights reserved.</p>
    </footer>

</body>

</html>