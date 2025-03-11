<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neski Gifts Blog</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #6e48aa, #9d50bb, #6e48aa, #4a6cf7);
            color: #fff;
            line-height: 1.6;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            text-align: center;
            padding: 50px 0;
        }
        header h1 {
            font-size: 3rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .blog-posts {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }
        .blog-post {
            flex: 1 1 30%;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        .blog-post img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .blog-post h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .blog-post p {
            font-size: 1rem;
            margin-bottom: 15px;
        }
        .blog-post a {
            color: #ff6f61;
            text-decoration: none;
            font-weight: bold;
        }
        .blog-post a:hover {
            text-decoration: underline;
        }
        .categories, .popular-posts {
            margin-top: 50px;
        }
        .categories h2, .popular-posts h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .categories ul, .popular-posts ul {
            list-style-type: none;
            padding: 0;
        }
        .categories ul li, .popular-posts ul li {
            background: rgba(255, 255, 255, 0.1);
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        footer {
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
            background: rgba(0, 0, 0, 0.2);
        }
        footer p {
            margin: 0;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Neski Gifts Blog</h1>
            <p>Discover the Art of Thoughtful Gifting</p>
        </header>

        <section class="blog-posts">
            <div class="blog-post">
                <img src="https://via.placeholder.com/400" alt="Beautiful Gifts">
                <h2>Beautiful Gifts for Every Occasion</h2>
                <p>Handcrafted with care, delivered with love. Offering you perfectly curated gifting services. Corporate gifting, personalized hampers, event hampers, and more.</p>
                <a href="#">Read More</a>
            </div>
            <div class="blog-post">
                <img src="https://via.placeholder.com/400" alt="Top 10 Christmas Gifts">
                <h2>Top 10 Christmas Gift Ideas</h2>
                <p>Find the perfect gifts for your loved ones this holiday season. From personalized ornaments to cozy blankets, we've got you covered.</p>
                <a href="#">Read More</a>
            </div>
            <div class="blog-post">
                <img src="https://via.placeholder.com/400" alt="How to Choose the Perfect Gift">
                <h2>How to Choose the Perfect Gift</h2>
                <p>Struggling to find the right gift? Follow our guide to selecting gifts that will leave a lasting impression.</p>
                <a href="#">Read More</a>
            </div>
        </section>

        <section class="categories">
            <h2>Categories</h2>
            <ul>
                <li><a href="#">Corporate Gifting</a></li>
                <li><a href="#">Personalized Gifts</a></li>
                <li><a href="#">Seasonal Gifts</a></li>
                <li><a href="#">Event Hampers</a></li>
            </ul>
        </section>

        <section class="popular-posts">
            <h2>Popular Posts</h2>
            <ul>
                <li><a href="#">Beautiful Gifts for Every Occasion</a></li>
                <li><a href="#">Top 10 Christmas Gift Ideas</a></li>
                <li><a href="#">How to Choose the Perfect Gift</a></li>
            </ul>
        </section>
    </div>

    <footer>
        <p>&copy; 2023 Neski Gifts. All rights reserved.</p>
    </footer>
</body>
</html>