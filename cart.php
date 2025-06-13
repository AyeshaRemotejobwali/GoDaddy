<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - GoDaddy Clone</title>
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
        .cart {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .cart h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #007bff;
            color: #fff;
        }
        .btn {
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }
        .btn:hover {
            background: #0056b3;
        }
        .btn-danger {
            background: #dc3545;
        }
        .btn-danger:hover {
            background: #c82333;
        }
        .cart-total {
            margin-top: 20px;
            text-align: right;
        }
        .cart-total p {
            font-size: 18px;
            font-weight: bold;
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background: #333;
            color: #fff;
            margin-top: 40px;
        }
        @media (max-width: 768px) {
            .cart {
                padding: 20px;
            }
            table {
                font-size: 14px;
            }
            .btn {
                padding: 8px 16px;
                font-size: 12px;
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
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="cart">
            <h2>Your Cart</h2>
            <table id="cartTable">
                <tr>
                    <th>Domain</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </table>
            <div class="cart-total">
                <p>Total: $<span id="cartTotal">0.00</span></p>
                <button class="btn" onclick="redirect('checkout.php')">Proceed to Checkout</button>
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
        function loadCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const table = document.getElementById('cartTable');
            const totalSpan = document.getElementById('cartTotal');
            let total = 0;

            // Clear existing rows except header
            while (table.rows.length > 1) {
                table.deleteRow(1);
            }

            cart.forEach((item, index) => {
                const row = table.insertRow();
                row.innerHTML = `
                    <td>${item.domain}</td>
                    <td>$${item.price.toFixed(2)}</td>
                    <td><button class="btn btn-danger" onclick="removeFromCart(${index})">Remove</button></td>
                `;
                total += item.price;
            });

            totalSpan.textContent = total.toFixed(2);
        }
        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            loadCart();
        }
        // Load cart on page load
        document.addEventListener('DOMContentLoaded', loadCart);
    </script>
</body>
</html>
