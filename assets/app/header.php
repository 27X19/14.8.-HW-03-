<?php 
    session_start();
    $_SESSION['user'] = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>SPA-TIMUR_SALON || <?=$_SESSION['header']?></title>
</head>
<body>
    <header>
        <nav>
            <?php if(isset($_SESSION['user']) && $_SESSION['user'] != ' '): ?>
                <a href="logout.php">Выход</a>
                <a href="user.php">Личный кабинет</a>
            <?php endif; ?>
            <a href="login.php">Войти</a>
        </nav>
    </header>

</body>
</html>