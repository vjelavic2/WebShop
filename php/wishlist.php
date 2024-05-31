<?php include('server.php') ?>
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
    <link rel="stylesheet" href="../style/wishlist.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&family=Yanone+Kaffeesatz:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>
     <!-------NAVIGATION-------->
     <div class="navigation-container" role="navigation">
        <div class="empty"></div>
        <div class="navigation-middle">
            <a href="./index.php" class="name" aria-label="Intro" role="link">ASPERA COSMETICS</a>
            <h3 class="author">VALENTINA</h3>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="links" role="navigation" aria-label="Navigation">
                    <a href="#foundation" class="linkk" aria-label="Foundations" role="link">foundation</a>
                    <a href="#concealer" class="linkk" aria-label="Concealers" role="link">concealer</a>
                    <a href="#contour" class="linkk" aria-label="Contours" role="link">contour</a>
                    <a href="#blush" class="linkk" aria-label="Blushes" role="link">blush</a>
                    <a href="#highlighter" class="linkk" aria-label="Highlighters" role="link">highlighter</a>
                </div>
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
            <a href="./cart.php" class="bi bi-bag" id="icon">
                <span id="cart-counter" class="cart-counter">0</span>
            </a>
            <a href="./out.php" class="bi bi-box-arrow-right" id="icon"></a>
        </div>
        <script>
            window.addEventListener('scroll', function() {
                var cartCounter = document.querySelector('.cart-counter');
                if (window.scrollY > 0) {
                    cartCounter.style.backgroundColor = '#b3848f'; 
                    cartCounter.style.color = 'white'; 
                } else {
                    cartCounter.style.backgroundColor = ''; 
                    cartCounter.style.color = ''; 
                }
            });
        </script>
    </div>
    
   

    <div class="container">
        <h1>My Wishlist</h1>
        <div class="wishlist-items">
            <?php
            if (isset($_SESSION['username'])) {
                $user_id = $_SESSION['user_id'];
                $wishlist_items = get_wishlist_items($db, $user_id);

                if (count($wishlist_items) > 0) {
                    foreach ($wishlist_items as $item) {
                        echo "<div class='item'>
                                <img src='" . $item['image'] . "' alt='" . $item['name'] . "'>
                                <div class='info'> 
                                    <h5>" . $item['name'] . "</h5>
                                    <p>" . $item['description'] . "</p>
                                </div>
                                <form method='post' action='wishlist.php'>
                                    <input type='hidden' name='product_id' value='" . $item['id'] . "'>
                                    <button type='submit' name='remove_from_wishlist' class='btn btn-danger'>remove</button>
                                </form>
                              </div>";
                    }
                } else {
                    echo "<p>Your wishlist is empty :(</p>";
                }
            } else {
                echo "<p>You must be logged in to view your wishlist!</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>