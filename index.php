<?php
session_start();
require_once 'getCurrentUser.php';

$user = getCurrentUser();
if (!$user) {
    header('Location: login.php');
    exit();
}

$loginTime = $_SESSION['login_time'];
$remainingTime = 24 * 3600 - (time() - $loginTime);

$birthdayMessage = '';
if (isset($_SESSION['birthday'])) {
    $birthday = $_SESSION['birthday'];
    $daysUntilBirthday = ceil(($birthday - time()) / 86400);
    if ($daysUntilBirthday <= 0) {
        $birthdayMessage = 'С Днём Рождения! Скидка 5% на все услуги!';
    } else {
        $birthdayMessage = "До вашего дня рождения осталось $daysUntilBirthday дней.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['birthday'])) {
    $birthday = strtotime($_POST['birthday']);
    $_SESSION['birthday'] = $birthday;
    $daysUntilBirthday = ceil(($birthday - time()) / 86400);
    $birthdayMessage = $daysUntilBirthday <= 0 
        ? 'С Днём Рождения! Скидка 5% на все услуги!' 
        : "До вашего дня рождения осталось $daysUntilBirthday дней.";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Главная страница</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>SPA-салон "Баклажан"</h1>
    <h2>Добро пожаловать, <?= htmlspecialchars($user) ?>!</h2>
    <p>До конца вашей персональной скидки осталось <?= gmdate('H:i:s', $remainingTime) ?></p>
    <?php if (!isset($_SESSION['birthday'])): ?>
    <form method="post">
        <label for="birthday">Введите вашу дату рождения:</label>
        <input type="date" id="birthday" name="birthday" required>
        <button type="submit">Сохранить</button>
    </form>
    <?php endif; ?>
    <p><?= htmlspecialchars($birthdayMessage) ?></p>

    <div class="gallery">
        <h2>Наши Услуги</h2>
        <img src="images/spa1.jpg" alt="Фото салона 1">
        <img src="images/spa2.jpg" alt="Фото салона 2">
    </div>

    <a href="logout.php">Выйти</a>
</body>
</html>