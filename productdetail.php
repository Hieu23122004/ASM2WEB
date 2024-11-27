<?php
session_start();
include "Connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
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

.product-detail {
    width: 80%; /* Điều chỉnh độ rộng của khung */
    max-width: 800px; /* Đặt độ rộng tối đa */
    margin: 0 auto; /* Căn giữa phần tử */
    padding: 20px; /* Thêm khoảng cách bên trong khung */
    border: 2px solid #ccc; /* Tạo đường viền xung quanh */
    border-radius: 10px; /* Bo góc khung */
    background-color: #f9f9f9; /* Màu nền nhẹ */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Thêm hiệu ứng bóng đổ */
}

.product-detail h2 {
    text-align: center; /* Căn giữa tiêu đề */
    font-size: 1.8rem;
    margin-bottom: 20px;
}

.product-detail p {
    font-size: 1rem;
    line-height: 1.5;
    margin-bottom: 10px;
}

.product-image {
    display: block;
    margin: 0 auto 20px; /* Căn giữa hình ảnh */
    max-width: 100%; /* Đảm bảo hình ảnh không vượt quá khung */
    height: auto;
}

.btn {
    display: block;
    text-align: center;
    width: 100%;
    padding: 10px;
    background-color: #28a745; /* Màu xanh lá */
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 20px;
}

.btn:hover {
    background-color: #218838; /* Màu sắc khi hover */
}


</style>
<body>

    <!-- Thanh Menu -->
    <header class="header">
        <nav class="navbar">
            <ul>
                <li><a href="Home.php">Home</a></li>
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

    <section class="product-list">
        <h2 style="text-align: center;">"Land Sale: A Long-Term Investment Opportunity"</h2>

        <div class="product-container">
            <?php
            include "Connect.php";

            // Check if ProductID is passed in the URL
            if (isset($_GET['id'])) {
                $ProductID = $_GET['id'];

                // Fetch product and its detailed information from both Product and ProductDetail tables
                $sql = "
                    SELECT p.ProductID, p.ProductName, p.Price, p.Location, p.Area, p.Status, p.Image AS ProductImage, 
                           pd.Description, pd.Image AS DetailImage, pd.LegalStatus, pd.Infrastructure 
                    FROM Product p
                    LEFT JOIN ProductDetail pd ON p.ProductID = pd.ProductID
                    WHERE p.ProductID = $ProductID
                ";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row_product = mysqli_fetch_assoc($result);

                    // Assign the fetched values to variables
                    $ProductName = $row_product['ProductName'];
                    $Price = $row_product['Price'];
                    $Location = $row_product['Location'];
                    $Area = $row_product['Area'];
                    $Status = $row_product['Status'];
                    $ProductImage = $row_product['ProductImage'];
                    $Description = $row_product['Description'];
                    $DetailImage = $row_product['DetailImage'];
                    $LegalStatus = $row_product['LegalStatus'];
                    $Infrastructure = $row_product['Infrastructure'];
                } else {
                    echo "<p class='text-center'>Product not found.</p>";
                }
            } else {
                // Temporary product details when no product is selected
                $ProductName = "Details Product";
                $Price = 1000000;
                $Location = "Sample Location";
                $Area = 500;
                $Status = "Available";
                $ProductImage = "anh2.jpg";  // Example placeholder image
                $Description = "This is a sample description for a temporary product.";
                $DetailImage = "sample_detail.jpg";  // Example placeholder image
                $LegalStatus = "Clear";
                $Infrastructure = "Basic infrastructure available";
            }

            mysqli_close($conn);
            ?>

            <!-- Product Detail Display -->
            <div class="product-detail">
                <h2><?php echo htmlspecialchars($ProductName); ?></h2>
                <img src="<?php echo htmlspecialchars("images/$ProductImage"); ?>" alt="<?php echo htmlspecialchars($ProductName); ?>" class="product-image">
                <p><b>Price: <?php echo number_format($Price, 0, ',', '.'); ?> VNĐ</b></p>
                <p><b>Location: </b><?php echo htmlspecialchars($Location); ?></p>
                <p><b>Area: </b><?php echo number_format($Area, 2, ',', '.'); ?> m²</p>
                <p><b>Status: </b><?php echo htmlspecialchars($Status); ?></p>

                <h3>Details</h3>
                <p><b>Description: </b><?php echo nl2br(htmlspecialchars($Description)); ?></p>
                <p><b>Legal Status: </b><?php echo htmlspecialchars($LegalStatus); ?></p>
                <p><b>Infrastructure: </b><?php echo htmlspecialchars($Infrastructure); ?></p>

                <a href="Cart.php?ProductID=<?php echo isset($ProductID) ? $ProductID : ''; ?>" class="btn btn-success">Add to Cart</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Your Website. All rights reserved.</p>
    </footer>

</body>

</html>
