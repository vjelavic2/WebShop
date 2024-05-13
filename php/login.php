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
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&family=Yanone+Kaffeesatz:wght@200..700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="navigation-container" role="navigation">

       

        <div class="navigation-middle">
                <a href="index.php" class="name" aria-label="Intro" role="link">ASPERA COSMETICS</a>
                <h3 class="author">VALENTINA</h3>
        </div>
    </div>
    

<!---------------FORM---------->

       <div class="container-box">
            <div class="form-box">
                <h1 id="title">LOGIN</h1>


                <form method="post" action="signin.php">
                <?php include('errors.php'); ?>

                    <div class="input-group">
                        <div class="input-field" id="nameField">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" placeholder="username" name="username">
                        </div>

                        <div class="input-field">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" placeholder="password" name="password">
                        </div>

                    </div>
                    


                    <div class="btn-field">
                        <button type="submit" class="btn" name="login_user">log in</button>
                    </div>

                    <div class="create-acc">
                        <p>don't have an account yet?</p>
                        <a href="signup.php" class="create">create accoount</a>
                    </div>
                    
                </form>
            </div>

       </div>


    </body>
</html>