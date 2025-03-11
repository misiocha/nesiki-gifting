<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Neski Gifts</title>
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
        header p {
            font-size: 1.2rem;
            font-style: italic;
        }
        .about-content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }
        .about-content .text {
            flex: 1 1 60%;
        }
        .about-content .image {
            flex: 1 1 35%;
            text-align: center;
        }
        .about-content .image img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        .mission, .team, .values {
            margin-top: 50px;
        }
        .mission h2, .team h2, .values h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .mission p, .team p, .values ul {
            font-size: 1.1rem;
        }
        .values ul {
            list-style-type: none;
            padding: 0;
        }
        .values ul li {
            background: rgba(255, 255, 255, 0.1);
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .team .members {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .team .member {
            flex: 1 1 30%;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        .team .member img {
            max-width: 100%;
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .team .member h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .team .member p {
            font-size: 1rem;
            font-style: italic;
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
            <h1>About Neski Gifts</h1>
            <p>Where Every Gift Tells a Story</p>
        </header>

        <section class="about-content">
            <div class="text">
                <p>Welcome to Neski Gifts, your one-stop destination for unique, personalized, and heartfelt gifts. We believe that every gift should be as special as the person receiving it. Whether it's a birthday, anniversary, or just a simple gesture of love, our curated collection of gifts is designed to make every occasion memorable.</p>
                <p>Founded in 2020, Neski Gifts has grown from a small online store to a beloved brand known for its creativity and attention to detail. Our mission is to spread joy and happiness through our thoughtfully crafted gifts.</p>
            </div>
            <div class="image">
                <img src="images/logo neski.jpg" alt="Neski Gifts">
            </div>
        </section>

        <section class="mission">
            <h2>Our Mission</h2>
            <p>At Neski Gifts, our mission is simple: to create meaningful connections through the art of gifting. We strive to offer a wide range of products that cater to every taste and occasion, ensuring that every gift is as unique as the person receiving it.</p>
        </section>

        <section class="team">
            <h2>Meet Our Team</h2>
            <div class="members">
                <div class="member">
                    <img src="https://via.placeholder.com/150" alt="Team Member 1">
                    <h3>Shishi</h3>
                    <p>Founder & CEO</p>
                </div>
                <div class="member">
                    <img src="https://via.placeholder.com/150" alt="Team Member 2">
                    <h3>yyy</h3>
                    <p>Creative Director</p>
                </div>
                <div class="member">
                    <img src="https://via.placeholder.com/150" alt="Team Member 3">
                    <h3>misiocha</h3>
                    <p>system dev</p>
                </div>
            </div>
        </section>

        <section class="values">
            <h2>Our Core Values</h2>
            <ul>
                <li><strong>Creativity:</strong> We believe in the power of imagination and innovation.</li>
                <li><strong>Quality:</strong> Every product we offer is crafted with the utmost care and attention to detail.</li>
                <li><strong>Customer Satisfaction:</strong> Your happiness is our priority.</li>
                <li><strong>Sustainability:</strong> We are committed to eco-friendly practices and materials.</li>
            </ul>
        </section>
    </div>

    <footer>
        <p>&copy; 2023 Neski Gifts. All rights reserved.</p>
    </footer>
</body>
</html>