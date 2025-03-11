<?php
session_start();
include 'config.php';

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}

// Handle form submission for editing a product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = floatval($_POST['price']);
    $image = $conn->real_escape_string($_POST['image']);

    // Update product in the database
    $sql = "UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsi", $name, $description, $price, $image, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Product updated successfully!";
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
    }
    $stmt->close();
    header('Location: admin.php');
    exit();
}

// Fetch product details for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Neski Gifts</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="branding">
                <img src="images/logo neski.jpg" alt="Neski Gifts Logo" class="logo">
                <h1>Neski Gifts - Edit Product</h1>
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
        <h2>Edit Product</h2>
        <?php if (isset($_SESSION['message'])): ?>
            <p class="success"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
            <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <form action="edit_product.php" method="post">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required><?php echo $product['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" value="<?php echo $product['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image URL:</label>
                <input type="text" id="image" name="image" value="<?php echo $product['image']; ?>" required>
            </div>
            <button type="submit" class="cta-button">Update Product</button>
        </form>
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