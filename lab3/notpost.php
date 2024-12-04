<?php
include 'session.php';
session_start();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Помилка методу запиту</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Помилка</h1>
    <p>Ця сторінка була викликана з неправильним методом запиту. Очікується метод POST.</p>

    <h2>Інформація про сервер</h2>
    <p>IP-адреса клієнта: <?php echo htmlspecialchars($_SERVER['REMOTE_ADDR']); ?></p>
    <p>Браузер: <?php echo htmlspecialchars($_SERVER['HTTP_USER_AGENT']); ?></p>
    <p>Скрипт: <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?></p>
    <p>Метод запиту: <?php echo htmlspecialchars($_SERVER['REQUEST_METHOD']); ?></p>
    <p>Шлях до файлу на сервері: <?php echo htmlspecialchars($_SERVER['SCRIPT_FILENAME']); ?></p>

    <form action="index.php" method="get">
        <button type="submit">На головну</button>
    </form>
</body>
</html>
