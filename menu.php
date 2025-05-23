<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WalkWise</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-color: #f5f5f5;
}

header {
    background-color: #6b726b;
    color: #fff;
    padding: 15px 0;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
}

nav {
    background-color: #2c2c2c;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 12px 0;
    text-align: center;
}

nav ul li {
    display: inline-block;
    margin: 0 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    font-weight: 500;
    transition: color 0.3s ease;
}

nav ul li a:hover {
    text-decoration: underline;
    color: #4CAF50;
}

.featured-products {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 25px;
    padding: 40px 20px;
}

.product-card {
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.product-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.product-label {
    font-size: 20px;
    padding: 15px 10px;
    font-weight: bold;
    color: #333;
    border-top: 1px solid #eee;
    background-color: #fafafa;
}

section {
    padding: 50px 20px;
}

h2 {
    color: #4CAF50;
    margin-bottom: 20px;
    font-size: 28px;
}

form input,
form textarea {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    resize: vertical;
}

form button {
    background-color: #4CAF50;
    color: #fff;
    padding: 12px 24px;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #388e3c;
}

footer {
    background-color: #2c2c2c;
    color: #fff;
    text-align: center;
    padding: 25px 20px;
    font-size: 14px;
    margin-top: auto;
}

    </style>
</head>
<body>
    <header>
        <h1>WalkWise</h1>
    </header>

    <nav>
        <ul>
            <li><a href="javascript:void(0);" onclick="showSection('home')">Home</a></li>
        <li><a href="javascript:void(0);" onclick="showSection('shop')">Shop</a></li>
        <li><a href="javascript:void(0);" onclick="showSection('cart')">Cart</a></li>
        <li><a href="javascript:void(0);" onclick="showSection('contact')">Contact Us</a></li>
        <li><a href="./logout.php"><button class="logout-button" >Log Out</button></a></li>

        </ul>
    </nav>

    <section id="home">
        <h2>Featured Products</h2>
        <div class="featured-products">
            <div class="product-card">
                <img src="./pic/istockphoto-611066366-612x612.jpg" alt="Running Shoes">
                <div class="product-label">Running Shoes</div>
            </div>
            <div class="product-card">
                <img src="./pic/8eb9c16b5d408abdf3139bece65d99ac.jpg" alt="Casual Shoes">
                <div class="product-label">Casual Shoes</div>
            </div>
            <div class="product-card">
                <img src="./pic/sneakers.webp" alt="Sneakers">
                <div class="product-label">Sneakers</div>
            </div>
            <div class="product-card">
                <img src="./pic/forgrils.webp" alt="Girls' Shoes">
                <div class="product-label">Girls' Shoes</div>
            </div>
            <div class="product-card">
                <img src="./pic/boots.jpg" alt="Boots">
                <div class="product-label">Boots</div>
            </div>
        </div>
    </section>

    <section id="shop">
        <h2>Shop</h2>
    
        <div class="categories">
            <button onclick="filterCategory('men')">Men</button>
            <button onclick="filterCategory('women')">Women</button>
            <button onclick="filterCategory('kids')">Kids</button>
        </div>
    
        <div id="filters">
            <label>Size: <input type="text" id="sizeFilter"></label>
            <label>Color: <input type="text" id="colorFilter"></label>
            <label>Price: <input type="number" id="priceFilter"></label>
            <button onclick="applyFilters()">Apply Filters</button>
        </div>
    
        <div id="product-list"></div>
    </section>
    
    <section id="cart">
        <h2>Cart</h2>
        <div id="cart-items"></div>
        <div id="cart-total">Total: $0.00</div>
        <button onclick="checkout()">Checkout</button>
    </section>
    
    <section id="contact">
        <h2>Contact Us</h2>
        <form id="contactForm">
            <input type="text" id="name" placeholder="Name" required>
            <input type="email" id="email" placeholder="Email" required>
            <textarea id="message" placeholder="Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    
        <div id="store-location">
            <h3>Store Location</h3>
            <p>123 Shoe St., Walk City</p>
        </div>
    </section>
    
    <script>
        // Simple JS for WalkWise
    
        // Example Product Data
        const products = [
            { id: 1, name: 'Men’s Sneakers', category: 'men', price: 50 },
            { id: 2, name: 'Women’s Heels', category: 'women', price: 70 },
            { id: 3, name: 'Kids’ Sneakers', category: 'kids', price: 40 }
        ];
    
        const cart = [];
    
        // Display Products
        function displayProducts() {
            const productList = document.getElementById('product-list');
            productList.innerHTML = '';
    
            products.forEach(product => {
                const productDiv = document.createElement('div');
                productDiv.innerHTML = `
                    <h4>${product.name}</h4>
                    <p>Price: $${product.price}</p>
                    <button onclick="addToCart(${product.id})">Add to Cart</button>
                `;
                productList.appendChild(productDiv);
            });
        }
    
        // Add to Cart
        function addToCart(id) {
            const product = products.find(p => p.id === id);
            cart.push(product);
            updateCart();
        }
    
        // Update Cart
        function updateCart() {
            const cartItems = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');
            cartItems.innerHTML = '';
    
            let total = 0;
            cart.forEach(item => {
                total += item.price;
                cartItems.innerHTML += `<p>${item.name} - $${item.price}</p>`;
            });
    
            cartTotal.innerText = `Total: $${total}`;
        }
    
        // Filter Products
        function filterCategory(category) {
            const filtered = products.filter(p => p.category === category);
            displayProducts(filtered);
        }
    
        // Checkout Placeholder
        function checkout() {
            alert('Proceeding to checkout...');
        }
    
        window.onload = displayProducts;
    
        function showSection(sectionId) {
            document.querySelectorAll('section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
    
    <footer>
        <p>&copy; 2025 WalkWise. Developed by Angelica Laab.</p>
    </footer>
    
