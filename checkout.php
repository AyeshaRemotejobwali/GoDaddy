<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - GoDaddy Clone</title>
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
        .checkout {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            display: flex;
            gap: 40px;
        }
        .order-summary, .payment-form {
            flex: 1;
        }
        .checkout h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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
        .total {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }
        .payment-form label {
            display: block;
            margin: 10px 0 5px;
        }
        .payment-form input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn {
            padding: 15px 30px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            display: inline-block;
        }
        .btn:hover {
            background: #0056b3;
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background: #333;
            color: #fff;
            margin-top: 40px;
        }
        @media (max-width: 768px) {
            .checkout {
                flex-direction: column;
                padding: 20px;
            }
            .payment-form input {
                font-size: 14px;
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
        <div class="checkout">
            <div class="order-summary">
                <h2>Order Summary</h2>
                <table id="orderTable">
                    <tr>
                        <th>Domain</th>
                        <th>Price</th>
                    </tr>
                </table>
                <p class="total">Total: $<span id="orderTotal">0.00</span></p>
            </div>
            <div class="payment-form">
                <h2>Payment Details</h2>
                <label for="cardNumber">Card Number</label>
                <input type="text" id="cardNumber" placeholder="1234 5678 9012 3456" disabled>
                <label for="expiry">Expiry Date</label>
                <input type="text" id="expiry" placeholder="MM/YY" disabled>
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" placeholder="123" disabled>
                <button class="btn" onclick="completeCheckout()">Complete Purchase (Non-functional)</button>
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
        function loadOrder() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const table = document.getElementById('orderTable');
            const totalSpan = document.getElementById('orderTotal');
            let total = 0;

            // Clear existing rows except header
            while (table.rows.length > 1) {
                table.deleteRow(1);
            }

            cart.forEach(item => {
                const row = table.insertRow();
                row.innerHTML = `
                    <td>${item.domain}</td>
                    <td>$${item.price.toFixed(2)}</td>
                `;
                total += item.price;
            });

            totalSpan.textContent = total.toFixed(2);
        }
        function completeCheckout() {
            alert('Checkout completed (non-functional)!');
            localStorage.removeItem('cart');
            redirect('dashboard.php');
        }
        // Load order on page load
        document.addEventListener('DOMContentLoaded', loadOrder);
    </script>
</body>
</html>
