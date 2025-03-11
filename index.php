<?php
session_start();
include 'config.php';

// Fetch products from database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
$products = [];

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
} else {
    // Handle query error
    echo "<p>Error fetching products: " . $conn->error . "</p>";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neski Gifts - Unique Presents Online</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/jpg" href="images/logo neski.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="header-wrapper">
                <div class="branding">
                    <img src="images/logo neski.jpg" alt="Neski Gifts Logo" class="logo">
                    <h1>Neski Gifts</h1>
                </div>
                <div class="hamburger-menu">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
                <nav class="main-nav">
                    <ul>
                        <li><a href="index.php" class="active"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="#products"><i class="fas fa-gift"></i> Products</a></li>
                        <li><a href="about.php"><i class="fas fa-info-circle"></i> About</a></li>
                        <li><a href="blog.php"><i class="fa-solid fa-newspaper"></i> Blog</a></li>
                        <li>
                            <a href="cart.php" class="cart-link">
                                <i class="fas fa-shopping-cart"></i> Cart 
                                <span class="cart-count"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
                            </a>
                        </li>
                        <?php if (isset($_SESSION['username'])): ?>
                            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a></li>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <li><a href="admin.php"><i class="fas fa-user-shield"></i> Admin Panel</a></li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                            <li><a href="register.php"><i class="fas fa-user-plus"></i> Register</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <h2 class="animate-text">Beautiful Gifts for Every Occasion</h2>
                <p class="animate-text-delay">Handcrafted with care, delivered with love Offering you perfectly curated gifting services.
                Cooperate gifting, Personalised hampers, events hampers...</p>
                <a href="#products" class="cta-button hero-button animate-text-delay">Shop Now <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="feature-cards">
                <div class="feature-card">
                    <i class="fas fa-truck"></i>
                    <h3>Free Shipping</h3>
                    <p>On orders over $50</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Secure Payment</h3>
                    <p>100% secure checkout</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-undo"></i>
                    <h3>Easy Returns</h3>
                    <p>30 day return policy</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-headset"></i>
                    <h3>24/7 Support</h3>
                    <p>Always here to help</p>
                </div>
            </div>
        </div>
    </section>

    <main class="container" id="products">
        <h2 class="section-title">Our Featured Gifts</h2>
        <div class="category-filter">
            <button class="filter-button active" data-filter="all">All</button>
            <button class="filter-button" data-filter="birthday">Birthday</button>
            <button class="filter-button" data-filter="anniversary">Anniversary</button>
            <button class="filter-button" data-filter="seasonal">Seasonal</button>
        </div>
        
        <div class="product-grid">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <article class="product-card" data-category="<?php echo htmlspecialchars($product['category'] ?? 'all'); ?>">
                        <div class="product-badge"><?php echo isset($product['is_new']) && $product['is_new'] ? 'New' : (isset($product['sale']) && $product['sale'] ? 'Sale' : ''); ?></div>
                        <div class="product-image">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <div class="product-overlay">
                                <button class="quick-view-btn" data-id="<?php echo $product['id']; ?>"><i class="fas fa-eye"></i> Quick View</button>
                            </div>
                        </div>
                        <div class="product-details">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <div class="rating">
                                <?php 
                                    $rating = isset($product['rating']) ? $product['rating'] : 5;
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $rating) {
                                            echo '<i class="fas fa-star"></i>';
                                        } else {
                                            echo '<i class="far fa-star"></i>';
                                        }
                                    }
                                ?>
                                <span class="reviews">(<?php echo isset($product['reviews']) ? $product['reviews'] : rand(10, 100); ?>)</span>
                            </div>
                            <p class="description"><?php echo htmlspecialchars($product['description']); ?></p>
                            <p class="price">
                                <?php if (isset($product['old_price']) && $product['old_price'] > $product['price']): ?>
                                    <span class="old-price">$<?php echo number_format($product['old_price'], 2); ?></span>
                                <?php endif; ?>
                                $<?php echo number_format($product['price'], 2); ?>
                            </p>
                            <form action="add_to_cart.php" method="post" class="add-to-cart-form">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <button type="submit" class="cta-button add-to-cart-btn">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </form>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-products">
                    <i class="fas fa-box-open"></i>
                    <p>No products found.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <div class="admin-section">
                <h2>Admin Controls</h2>
                <p>Manage products, orders, and users.</p>
                <a href="admin.php" class="cta-button"><i class="fas fa-cogs"></i> Go to Admin Panel</a>
            </div>
        <?php endif; ?>
    </main>

    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">What Our Customers Say</h2>
            <div class="testimonial-slider">
                <div class="testimonial-slide">
                    <div class="testimonial-text">
                        <i class="fas fa-quote-left"></i>
                        <p>The gift basket We ordered  was absolutely perfect👌 Everything was beautifully arranged and of great quality.</p>
                        <div class="testimonial-author">
                            <h4>VILLAGE MARKRET</h4>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slide">
                    <div class="testimonial-text">
                        <i class="fas fa-quote-left"></i>
                        <p>Neski Gifts helped us find the perfect anniversary presents. The customer service was exceptional and delivery was prompt.</p>
                        <div class="testimonial-author">
                            <h4>AWEMAC</h4>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
            </div>
        </div>
    </section>

    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h3>Subscribe to Our Newsletter</h3>
                <p>Get updates on new products and special offers</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email address" required>
                    <button type="submit" class="cta-button">Subscribe</button>
                </form>
            </div>
        </div>
    </section>

    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-columns">
                    <div class="footer-column">
                        <img src="images/logo neski.jpg" alt="Neski Gifts Logo" class="footer-logo">
                        <p class="footer-about">Neski Gifts specializes in unique, handcrafted gifts for all special occasions. We believe that a thoughtful gift can create lasting memories.</p>
                    </div>
                    <div class="footer-column">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#products">Products</a></li>
                            <li><a href="#about">About Us</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h4>Customer Service</h4>
                        <ul>
                            <li><a href="#">Shipping Policy</a></li>
                            <li><a href="#">Return Policy</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h4>Contact Us</h4>
                        <address>
                            <p><i class="fas fa-map-marker-alt"></i> Nairobi,karen, kenya</p>
                            <p><i class="fas fa-phone"></i> (+254) 716575715</p>
                            <p><i class="fas fa-envelope"></i> NESKIGIFTING@GMAIL.com</p>
                        </address>
                        <div class="social-links">
                            <a href="https://www.instagram.com/neski_gifting?igsh=YzljYTk1ODg3Zg==" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>&copy; <?php echo date('Y'); ?> Neski Gifts. All rights reserved.</p>
                    <div class="payment-methods">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-amex"></i>
                        <i class="fab fa-cc-paypal"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Quick view modal -->
    <div class="modal" id="quickViewModal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <div class="modal-body">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>
    </div>

    <!-- Back to top button -->
    <button id="backToTop" title="Back to Top"><i class="fas fa-arrow-up"></i></button>

    <!-- Add JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hamburger menu toggle
            const hamburger = document.querySelector('.hamburger-menu');
            const mainNav = document.querySelector('.main-nav');
            
            hamburger.addEventListener('click', function() {
                mainNav.classList.toggle('active');
                hamburger.classList.toggle('active');
            });

            // Product filtering
            const filterButtons = document.querySelectorAll('.filter-button');
            const productCards = document.querySelectorAll('.product-card');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');
                    
                    // Update active class
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Filter products
                    productCards.forEach(card => {
                        if (filter === 'all' || card.getAttribute('data-category') === filter) {
                            card.style.display = 'flex';
                            setTimeout(() => {
                                card.classList.add('show');
                            }, 10);
                        } else {
                            card.classList.remove('show');
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300);
                        }
                    });
                });
            });

            // Initialize all products as visible
            productCards.forEach(card => {
                card.classList.add('show');
            });

            // Add to cart animation
            const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
            
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    this.classList.add('adding');
                    setTimeout(() => {
                        this.classList.remove('adding');
                    }, 1500);
                });
            });

            // Testimonial slider
            const testimonialSlides = document.querySelectorAll('.testimonial-slide');
            const dots = document.querySelectorAll('.dot');
            let currentSlide = 0;

            function showSlide(n) {
                testimonialSlides.forEach(slide => slide.style.display = 'none');
                dots.forEach(dot => dot.classList.remove('active'));
                
                testimonialSlides[n].style.display = 'block';
                dots[n].classList.add('active');
                currentSlide = n;
            }

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => showSlide(index));
            });

            function nextSlide() {
                currentSlide = (currentSlide + 1) % testimonialSlides.length;
                showSlide(currentSlide);
            }

            // Auto slide
            setInterval(nextSlide, 5000);
            showSlide(0);

            // Quick view modal
            const quickViewButtons = document.querySelectorAll('.quick-view-btn');
            const modal = document.getElementById('quickViewModal');
            const closeModal = document.querySelector('.close-modal');
            const modalBody = document.querySelector('.modal-body');

            quickViewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');
                    modalBody.innerHTML = '<div class="loading"><i class="fas fa-spinner fa-spin"></i> Loading...</div>';
                    modal.style.display = 'block';
                    
                    // Simulate loading product data (in a real app, you'd fetch from server)
                    setTimeout(() => {
                        // Get parent product card content
                        const productCard = this.closest('.product-card');
                        const productImage = productCard.querySelector('.product-image img').src;
                        const productName = productCard.querySelector('h3').textContent;
                        const productDesc = productCard.querySelector('.description').textContent;
                        const productPrice = productCard.querySelector('.price').textContent;
                        
                        // Create modal content
                        modalBody.innerHTML = `
                            <div class="quick-view-content">
                                <div class="quick-view-image">
                                    <img src="${productImage}" alt="${productName}">
                                </div>
                                <div class="quick-view-details">
                                    <h3>${productName}</h3>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <p class="price">${productPrice}</p>
                                    <p class="description">${productDesc}</p>
                                    <form action="add_to_cart.php" method="post">
                                        <div class="quantity-selector">
                                            <label for="quantity">Quantity</label>
                                            <div class="quantity-buttons">
                                                <button type="button" class="quantity-decrease">-</button>
                                                <input type="number" id="quantity" name="quantity" value="1" min="1">
                                                <button type="button" class="quantity-increase">+</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="product_id" value="${productId}">
                                        <button type="submit" class="cta-button"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        `;
                        
                        // Add quantity selector functionality
                        const quantityInput = modalBody.querySelector('#quantity');
                        const increaseBtn = modalBody.querySelector('.quantity-increase');
                        const decreaseBtn = modalBody.querySelector('.quantity-decrease');
                        
                        increaseBtn.addEventListener('click', function() {
                            quantityInput.value = parseInt(quantityInput.value) + 1;
                        });
                        
                        decreaseBtn.addEventListener('click', function() {
                            if (parseInt(quantityInput.value) > 1) {
                                quantityInput.value = parseInt(quantityInput.value) - 1;
                            }
                        });
                    }, 500);
                });
            });

            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });

            // Back to top button
            const backToTopButton = document.getElementById('backToTop');
            
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.add('show');
                } else {
                    backToTopButton.classList.remove('show');
                }
            });
            
            backToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Newsletter form submission
            const newsletterForm = document.querySelector('.newsletter-form');
            
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const emailInput = this.querySelector('input[type="email"]');
                    if (emailInput.value) {
                        // Simulate success (in a real app, you'd submit to server)
                        this.innerHTML = '<p class="success-message"><i class="fas fa-check-circle"></i> Thank you for subscribing!</p>';
                    }
                });
            }

            // Add animation on scroll
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.feature-card, .product-card, .section-title, .testimonial-slide');
                
                elements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    
                    if (elementTop < windowHeight - 50) {
                        element.classList.add('animate');
                    }
                });
            };
            
            window.addEventListener('scroll', animateOnScroll);
            // Initial check
            animateOnScroll();
        });
    </script>
</body>
</html>