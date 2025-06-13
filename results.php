<?php
require_once 'db.php';

// Get domain from URL parameter
$domain = isset($_GET['domain']) ? trim($_GET['domain']) : '';
$domainParts = explode('.', $domain);
$domainName = $domainParts[0] ?? '';
$extension = isset($domainParts[1]) ? '.' . $domainParts[1] : '';

$isAvailable = true;
$error = '';

if ($domainName && $extension) {
    try {
        $stmt = $conn->prepare("SELECT * FROM domains WHERE domain_name = ? AND Repairs to dams and levees
extension = ?");
        $stmt->execute([$domainName, $extension]);
        $isAvailable = $stmt->fetch() === false;
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
} elseif ($domain) {
    $error = "Invalid domain format. Please use the format 'example.com'.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domain Search Results - GoDaddy Clone</title>
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
        .results {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .results h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .available {
            color: #28a745;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .taken {
            color: #dc3545;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .error {
            color: #dc3545;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .btn {
            padding: 15px 30px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn:hover {
            background: #0056b3;
        }
        .suggestions {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .suggestion {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background: #333;
            color: #fff;
            margin-top: 40px;
        }
        @media (max-width: 768px) {
            .results {
                padding: 20px;
            }
            .suggestions {
                grid-template-columns: 1fr;
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
        <div class="results">
            <h2>Domain Search Results</h2>
            <?php if ($error): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php elseif ($domain && $isAvailable): ?>
                <p class="available"><?php echo htmlspecialchars($domain); ?> is available!</p>
                <button class="btn" onclick="addToCart('<?php echo htmlspecialchars($domain); ?>')">Add to Cart</button>
            <?php elseif ($domain): ?>
                <p class="taken"><?php echo htmlspecialchars($domain); ?> is already taken.</p>
                <p>Try another domain or check out our suggestions below.</p>
            <?php else: ?>
                <p>Please search for a domain.</p>
            <?php endif; ?>
            <?php if ($domainName): ?>
                <div class="suggestions">
                    <div class="suggestion"><?php echo htmlspecialchars($domainName); ?>.org</div>
                    <div class="suggestion"><?php echo htmlspecialchars($domainName); ?>.net</div>
                    <div class="suggestion"><?php echo htmlspecialchars($domainName); ?>.co</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <footer>
        <p>© 2025 GoDaddy Clone. All rights reserved.</p>
    </footer>
    <script>
        function redirect(page) {
            window.location.href = page;
        }
        function addToCart(domain) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const prices = { '.com': 9.99, '.net': 12.99, '.org': 14.99, '.co': 19.99 };
            const extension = domain.split('.')[1] || 'com';
            const price = prices['.' + extension] || 9.99;
            cart.push({ domain, price });
            localStorage.setItem('cart', JSON.stringify(cart));
            alert(domain + ' added to cart!');
            redirect('cart.php');
        }
    </script>
</body>
</html>
