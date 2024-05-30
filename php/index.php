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
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&family=Yanone+Kaffeesatz:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>
    <!-------NAVIGATION-------->
    <div class="navigation-container" role="navigation">
        <div class="empty"></div>
        <div class="navigation-middle">
            <a href="#intro" class="name" aria-label="Intro" role="link">ASPERA COSMETICS</a>
            <h3 class="author">VALENTINA</h3>
            <div class="links" role="navigation" aria-label="Navigation">
                <a href="#foundation" class="linkk" aria-label="Foundations" role="link">foundation</a>
                <a href="#concealer" class="linkk" aria-label="Concealers" role="link">concealer</a>
                <a href="#contour" class="linkk" aria-label="Contours" role="link">contour</a>
                <a href="#blush" class="linkk" aria-label="Blushes" role="link">blush</a>
                <a href="#highlighter" class="linkk" aria-label="Highlighters" role="link">highlighter</a>
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
            <a href="./cart.php" class="bi bi-bag" id="icon"></a> 
            <a href="./out.php" class="bi-box-arrow-right" id="icon"></a> 
       </div>
        
    </div>
      <!-- Hidden search form -->
      <div id="search-form-container" style="display: none;">
    <form id="search-form">
        <input type="text" id="search-input" placeholder="search" required>
    </form>
</div>

       
    <!--------------INTRO---------------->
    <div class="intro-container" id="intro">
        <div class="left-container">
            <h3 class="last-lineup">THE LAST LINEUP</h3>
            <p class="new-items-1">new beauty from the hottest brands.</p>
            <a href="#foundation" class="shop-items"> SHOP NOW</a>
        </div>
    </div>
    
    <div class="shopping">
        <!-------------------FOUNDATION--------------->
        <div class="foundation-grid">
            <h2 class="f-name" id="foundation">FOUNDATIONS</h2>
            <div class="items-grid"></div>
        </div>
        <!-------------------CONCEALER--------------->
        <div class="concealer-grid">
            <h2 class="f-name" id="concealer">CONCEALERS</h2>
            <div class="items-grid"></div>
        </div>
        <!-- -----------------CONTOUR----------------->
        <div class="contour-grid">
            <h2 class="f-name" id="contour">CONTOUR</h2>
            <div class="items-grid"></div>
        </div>
        <!-- -----------------BLUSH----------------->
        <div class="blush-grid">
            <h2 class="f-name" id="blush">BLUSH</h2>
            <div class="items-grid"></div>
        </div>
         <!-- -----------------HIGHLIGHTER----------------->
         <div class="highlighter-grid">
            <h2 class="f-name" id="highlighter">HIGHLIGHTER</h2>
            <div class="items-grid"></div>
        </div>
    </div>
    
    <script src="../script.js"></script>
</body>
</html>
