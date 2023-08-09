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
    <?php if (isset($_POST['vk']) || isset($_POST['ok']) || isset($_POST['google'])):?>
        <?php $registration_method = isset($_POST['vk']) ? 'vk' : 'ok';
            $registration_method = isset($_POST['google']) ? 'google' : $registration_method;
        ?> 
        <div class="modal-bg">
            <p class="modal-message">
                Вы зарегестрировались через
                <?php if($registration_method == 'vk'): ?>
                     vkontacte c почтовым ящиком: <?= $_POST['email'] ?>
                <?php elseif ($registration_method == 'ok'): ?>
                     одноклассники. Ваше имя <?= $_POST['name']; ?>
                <?php elseif ($registration_method == 'google'): ?>
                     google с почтовым ящиком <?= $_POST['email'] ?>
                <?php endif; ?>
            </p>
            <p> Вы будете перенаправленны на gesbes.com через: <span class="modal__timer"></span></p>
        </div>

   <?php endif;?>
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
            <div class="auth-form__submits">
                <input type="submit" class="auth-form__submit" value="Submit">
                <div class="auth-form__socials">
                    <a href="/vk_login.php" class="auth-form__social">
                        <img src="img/vk-icon.png" alt="">
                    </a>
                    <a href="/ok_login.php" class="auth-form__social">
                        <img src="img/ok.png" alt="">
                    </a>
                    <a href="/google_login.php" class="auth-form__social">
                        <img src="img/google.png" alt="">
                    </a>
                </div>    
            </div>
        </form>
    </div>

        <script src="js/jquery-3.7.0.min.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>
</body>
</html>