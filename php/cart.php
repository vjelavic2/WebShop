<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspera Cosmetics</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&family=Yanone+Kaffeesatz:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <!-------NAVIGATION-------->
    <div class="navigation-container" role="navigation">
        <div class="empty"></div>
        <div class="navigation-middle">
            <a href="./index.php" class="name" aria-label="Intro" role="link">ASPERA COSMETICS</a>
            <h3 class="author">VALENTINA</h3>
            <div class="links" role="navigation" aria-label="Navigation">
                <a href="./index.php" class="linkk" aria-label="Foundations" role="link">foundation</a>
                <a href="./index.php" class="linkk" aria-label="Concealers" role="link">concealer</a>
                <a href="./index.php" class="linkk" aria-label="Contours" role="link">contour</a>
                <a href="./index.php" class="linkk" aria-label="Blushes" role="link">blush</a>
                <a href="./index.php" class="linkk" aria-label="Highlighters" role="link">highlighter</a>
            </div>
        </div>
        <script>
            window.addEventListener('scroll', function() {
                var navigationContainer = document.querySelector('.navigation-container');
                if (window.scrollY > 0) {
                    navigationContainer.style.backgroundColor = 'white';
                } else {
                    navigationContainer.style.backgroundColor = '';
                }
            });
        </script>
        <div class="icons">
            <a href="./wishlist.php" class="bi bi-heart" id="icon"></a>
            <a href="./login.php" class="bi bi-person" id="icon"></a>
            <a href="#" class="bi bi-search" id="icon-search"></a>
            <a href="./cart.php" class="bi bi-bag" id="icon">
            </a>
            <a href="./out.php" class="bi bi-box-arrow-right" id="icon"></a>
        </div>
    </div>

    <!-- Hidden search form -->
    <div id="search-form-container" style="display: none;">
        <form id="search-form">
            <input type="text" id="search-input" placeholder="search" required>
        </form>
    </div>

    <div class="container">
        <h1>Your Cart</h1>
        <div id="cart-items"></div>
        <div id="cart-total"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartItemsContainer = document.getElementById('cart-items');
            const cartTotalContainer = document.getElementById('cart-total');

            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            function displayCart() {
    cartItemsContainer.innerHTML = '';
    let total = 0;

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p class="empty-cart-message">your cart is empty  :(</p>';
        cartTotalContainer.innerHTML = '';  
    } else {
        cart.forEach(item => {
            total += item.price * item.quantity;
            let itemElement = document.createElement('div');
            itemElement.classList.add('cart-item');
            itemElement.innerHTML = `
                <div class="image-container">
                    <img src="${item.image}" alt="${item.name}" class="image-item">
                </div>
                <div class="item-info">
                    <h5 class="name-item">${item.name}</h5>
                    <p class="description-item">${item.description}</p>
                </div>
                <div class="item-actions">
                    <button class="remove-from-cart-btn" data-id="${item.id}">remove</button>
                    <div class="empty-between"></div>
                    <div class="quantity-container">
                        <input type="number" class="quantity-input" data-id="${item.id}" value="${item.quantity}" min="1">
                        <button class="quantity-btn" data-id="${item.id}" data-action="increase">+</button>   
                        <button class="quantity-btn" data-id="${item.id}" data-action="decrease">-</button>
                    </div>
                </div>
            `;
            // Attach event listeners
            itemElement.querySelector('.quantity-input').addEventListener('change', updateQuantity);
            itemElement.querySelector('.remove-from-cart-btn').addEventListener('click', removeFromCart);
            itemElement.querySelector('.quantity-btn[data-action="decrease"]').addEventListener('click', changeQuantity);
            itemElement.querySelector('.quantity-btn[data-action="increase"]').addEventListener('click', changeQuantity);

            cartItemsContainer.appendChild(itemElement);
        });

        cartTotalContainer.innerHTML = `
            <div class="total-container">
                <h3 class="res-total">estimated total: $${total.toFixed(2)}</h3>
                <a href="./checkout.php" class="checkout">checkout</a>
            </div>
        `;
    }
}


            function updateQuantity(event) {
                const itemId = event.target.dataset.id;
                const newQuantity = parseInt(event.target.value);
                const cartItem = cart.find(item => item.id == itemId);

                if (cartItem && newQuantity > 0) {
                    cartItem.quantity = newQuantity;
                    localStorage.setItem('cart', JSON.stringify(cart));
                    displayCart();
                }
            }

            function changeQuantity(event) {
                const itemId = event.target.dataset.id;
                const action = event.target.dataset.action;
                const cartItem = cart.find(item => item.id == itemId);

                if (cartItem) {
                    if (action === 'decrease' && cartItem.quantity > 1) {
                        cartItem.quantity--;
                    } else if (action === 'increase') {
                        cartItem.quantity++;
                    }
                    localStorage.setItem('cart', JSON.stringify(cart));
                    displayCart();
                }
            }

            function removeFromCart(event) {
                const itemId = event.target.dataset.id;
                cart = cart.filter(item => item.id != itemId);
                localStorage.setItem('cart', JSON.stringify(cart));
                displayCart();
            }

            displayCart();
        });
    </script>
</body>
</html>
