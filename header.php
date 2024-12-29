<?php 
    session_start();
    $session_header;
    if($_SESSION['header']) $session_header = $_SESSION['header'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>SPA-TIMUR_SALON || <?=$session_header?></title>
</head>
<body>
    <header>
        <nav>
            <?php if(isset($_SESSION['user'])): ?>
                <a href="logout.php">Выход</a>
                <a href="user.php">Личный кабинет</a>
                <?php else: ?>
                <a href="login.php">Войти</a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="content">
    </div>
</body>
</html>