<?php
session_start();
include "Connect.php";
ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>

<style>
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
    margin-left: 200px;
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

</style>

<body>

    <!-- Thanh Menu -->
    <header class="header">
        <nav class="navbar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="productdetail.php">Product Detail</a></li>
                <li><a href="usermanagement.php">User Management</a></li>
                <li><a href="#cart.php">My Cart</a></li>
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

        <!-- <section class="banner">
            <img src="images/anh11.jpg" alt="Promotional Image" class="banner-img">
        </section> -->
        <div class="product-container">
            <?php
           if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
            $userID = $_SESSION['user_id'];
            $productID = $_POST['ProductID'];
            $quantity = $_POST['Quantity'];
        
            // Check if the product already exists in the cart
            $checkCartSql = "SELECT * FROM Cart WHERE UserID = ? AND ProductID = ?";
            $stmt = mysqli_prepare($conn, $checkCartSql);
            mysqli_stmt_bind_param($stmt, "ii", $userID, $productID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        
            if (mysqli_num_rows($result) > 0) {
                // If product exists, update the quantity
                $updateSql = "UPDATE Cart SET Quantity = Quantity + ? WHERE UserID = ? AND ProductID = ?";
                $stmt = mysqli_prepare($conn, $updateSql);
                mysqli_stmt_bind_param($stmt, "iii", $quantity, $userID, $productID);
            } else {
                // If product does not exist, insert it into the cart
                $insertSql = "INSERT INTO Cart (UserID, ProductID, Quantity) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($conn, $insertSql);
                mysqli_stmt_bind_param($stmt, "iii", $userID, $productID, $quantity);
            }
        
            // Execute the query and redirect if successful
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to cart page after successfully adding the product
                header("Location: cart.php");
                exit(); // Stop further execution after header redirection
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        
        // Displaying cart contents
        if (isset($_SESSION['user_id'])) {
            $userID = $_SESSION['user_id'];
        
            // Query to fetch cart items
            $sql = "SELECT p.ProductName, p.Image, c.Quantity, p.Price
                    FROM Cart c
                    INNER JOIN Product p ON c.ProductID = p.ProductID
                    WHERE c.UserID = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $userID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        
            // Display the cart items
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='product'>";
                echo "<h3>" . htmlspecialchars($row['ProductName']) . "</h3>";
                echo "<img src='images/" . htmlspecialchars($row['Image']) . "' alt='" . htmlspecialchars($row['ProductName']) . "'>";
                echo "<p>Quantity: " . $row['Quantity'] . "</p>";
                echo "<p>Price: " . number_format($row['Price'], 0, ',', '.') . " VNĐ</p>";
                echo "<p>Total: " . number_format($row['Price'] * $row['Quantity'], 0, ',', '.') . " VNĐ</p>";
                echo "</div><hr>";
            }
        } else {
            echo "Please <a href='login.php'>login</a> to view your cart.";
        }
        
        // End output buffering and flush the output buffer
        ob_end_flush();
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Your Website. All rights reserved.</p>
    </footer>

</body>

</html>