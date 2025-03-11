<?php
session_start();
include 'config.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty.</p>";
    exit();
}

$cart_items = $_SESSION['cart'];
$sql = "SELECT * FROM products WHERE id IN (" . implode(",", $cart_items) . ")";
$result = $conn->query($sql);
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Neski Gifts</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="branding">
                <img src="images/logo neski.jpg" alt="Neski Gifts Logo" class="logo">
                <h1>Neski Gifts - Cart</h1>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">View Site</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <h2>Your Cart</h2>
        <?php if (!empty($products)): ?>
            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                    <article class="product-card">
                        <div class="product-image">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        </div>
                        <div class="product-details">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="description"><?php echo htmlspecialchars($product['description']); ?></p>
                            <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No products found in your cart.</p>
        <?php endif; ?>
    </main>

    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <img src="images/logo neski.jpg" alt="Neski Gifts Logo" class="footer-logo">
                <p>&copy; <?php echo date('Y'); ?> Neski Gifts. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>