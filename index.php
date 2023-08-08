<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php if (isset($_SESSION['auth']) && $_SESSION['auth']):?>
        <a class="logout" href="/logout.php">logout</a>
    <?php endif;?>
    <div class="auth">
        <h1 class="auth__title">Login:</h1>

        <form class="auth__form auth-form" id="auth-form" action="">
            <label for="email">Email:</label>
            <input type="email" id="email" class="auth-form__email auth-form__field" name="email" placeholder="exemple@mail.ru" required>

            <label for="password">Password:</label>
            <input type="password" id="password" class="auth-form__password auth-form__field" name="password" placeholder="password" required>

            <input type="submit" class="auth-form__submit" value="Submit">
        </form>
    </div>

        <script src="js/jquery-3.7.0.min.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>
</body>
</html>