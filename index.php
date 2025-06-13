<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoDaddy Clone - Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }
        nav a:hover {
            color: #007bff;
        }
        .hero {
            text-align: center;
            padding: 60px 0;
            background: #fff;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .hero h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #222;
        }
        .search-bar {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .search-bar input {
            padding: 15px;
            width: 400px;
            border: 2px solid #007bff;
            border-radius: 5px 0 0 5px;
            font-size: 16px;
        }
        .search-bar button {
            padding: 15px 30px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        .search-bar button:hover {
            background: #0056b3;
        }
        .extensions {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }
        .extension {
            background: #f8f9fa;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 500;
            color: #333;
        }
        .promotions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        .promo-card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .promo-card:hover {
            transform: translateY(-5px);
        }
        .promo-card h3 {
            margin-bottom: 10px;
            color: #007bff;
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background: #333;
            color: #fff;
            margin-top: 40px;
        }
        @media (max-width: 768px) {
            .search-bar input {
                width: 100%;
            }
            .search-bar {
                flex-direction: column;
                gap: 10px;
            }
            .search-bar button {
                border-radius: 5px;
            }
            .extensions {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">GoDaddy Clone</div>
            <nav>
                <a href="#" onclick="redirect('index.php')">Home</a>
                <a href="#" onclick="redirect('dashboard.php')">Dashboard</a>
                <a href="#" onclick="redirect('cart.php')">Cart</a>
                <a href="#" onclick="redirect('php_errorlog.php')">Error Log</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="hero">
            <h1>Find Your Perfect Domain Name</h1>
            <form class="search-bar" action="search.php" method="GET" onsubmit="logSubmit()">
                <input type="text" name="domain" id="domainInput" placeholder="Enter domain name (e.g., example.com)" required>
                <button type="submit">Search</button>
            </form>
            <div class="extensions">
                <div class="extension">.com</div>
                <div class="extension">.net</div>
                <div class="extension">.org</div>
            </div>
        </div>
        <div class="promotions">
            <div class="promo-card">
                <h3>.com $9.99/year</h3>
                <p>Grab the most popular domain extension today!</p>
            </div>
            <div class="promo-card">
                <h3>.net $12.99/year</h3>
                <p>Perfect for networks and businesses.</p>
            </div>
            <div class="promo-card">
                <h3>.org $14.99/year</h3>
                <p>Ideal for organizations and non-profits.</p>
            </div>
        </div>
    </div>
    <footer>
        <p>© 2025 GoDaddy Clone. All rights reserved.</p>
    </footer>
    <script>
        function redirect(page) {
            window.location.href = page;
        }
        function logSubmit() {
            const domain = document.getElementById('domainInput').value;
            console.log('Form submitted with domain:', domain);
            console.log('Submitting to: search.php?domain=' + encodeURIComponent(domain));
        }
    </script>
</body>
</html>
