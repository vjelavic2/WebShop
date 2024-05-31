<?php include('server.php') ?>

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
    <link rel="stylesheet" href="../style/signIn.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&family=Yanone+Kaffeesatz:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>  

<div class="navigation-container" role="navigation">
    <div class="navigation-middle">
        <a href="index.php" class="name" aria-label="Intro" role="link">ASPERA COSMETICS</a>
        <h3 class="author">VALENTINA</h3>
    </div>
</div>

<div class="container-box">
    <div class="form-box">
        <h1 id="title">SIGN UP</h1>
        <form method="post" action="signup.php">
            <?php include('errors.php'); ?>

            <?php 
            // Initialize variables to avoid undefined variable warnings
            $username = isset($username) ? $username : '';
            $email = isset($email) ? $email : '';
            ?>

            <div class="input-group">
                <div class="input-field" id="nameField">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="name" name="username" value="<?php echo htmlspecialchars($username); ?>">
                </div>

                <div class="input-field">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                </div>

                <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="password" name="password_1">
                </div>

                <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="type password again" name="password_2">
                </div>
            </div>
            <div class="btn-field">
                <button type="submit" class="btn" name="reg_user">sign up</button>
            </div>

            <div class="create-acc">
                <p>you have an account?</p> 
                <a href="login.php" class="create">login</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
