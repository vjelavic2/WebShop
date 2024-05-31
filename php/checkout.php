<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspera cosmetics</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3./css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3./js/bootstrap.bundle.min.js"></script>
    <link href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/checkout.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&family=Yanone+Kaffeesatz:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="navigation-container" role="navigation">
        <div class="navigation-middle">
            <a href="index.php" class="name" aria-label="Intro" role="link">ASPERA COSMETICS</a>
            <h3 class="author">VALENTINA</h3>
        </div>
    </div>
    
    <div class="container">
        <div class="form-section">
            <h1>SHIPPING </h1>
            <form id="checkout-form" action="checkout.php" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" id="country" placeholder="country" name="country" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="firstName" placeholder="first name" name="firstName" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="secondName" placeholder="second name" name="secondName" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="address" placeholder="address" name="address" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="postal_code" placeholder="postal code" name="postal_code" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="city" placeholder="city" name="city" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" required>
                </div>
        </div>

        <div class="form-section">
            <h1>CARD INFO</h1>
            <div class="mb-3">
                <input type="text" class="form-control" id="card_number" placeholder="card number" name="card_number" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="card_expiry" placeholder="MM/YY" name="card_expiry" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="card_cvc" placeholder="cvc" name="card_cvc" required>
            </div>
            <button type="submit" class="btn btn-primary">checkout</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('checkout-form').addEventListener('submit', function(event) {
            localStorage.removeItem('cart');
        });
    </script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $street = htmlspecialchars($_POST['street']);
    $number = htmlspecialchars($_POST['number']);
    $postal_code = htmlspecialchars($_POST['postal_code']);
    $city = htmlspecialchars($_POST['city']);
    $card_number = htmlspecialchars($_POST['card_number']);
    $card_expiry = htmlspecialchars($_POST['card_expiry']);
    $card_cvc = htmlspecialchars($_POST['card_cvc']);

   
    echo "<script>
        alert('purchase successful!');
        window.location.href = 'index.php';
    </script>";
}
?>
