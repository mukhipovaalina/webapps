<?php
include 'session.php';
session_start();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Головна сторінка</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Головна сторінка</h1>

    <h2>Вхід</h2>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        echo "Привіт, " . htmlspecialchars($_SESSION['username']) . "!";
        echo '<form method="post" action="logout.php">
                <button type="submit">Вихід</button>
              </form>';
    } else {
        echo '<form action="login.php" method="get">
        <button type="submit">Увійти</button>
        </form>';
    }
    ?>

    <h2>Ім'я</h2>
    <form action="cookie.php" method="get">
    <button type="submit">Ввести ім'я</button>
    </form>

    <h2>Інформація про сервер</h2>
    <form action="server_info.php" method="get">
    <button type="submit">Перегляд інформації про сервер</button>
    </form>

    <h2>Корзина</h2>
    <form action="cart.php" method="get">
    <button type="submit">Переглянути корзину</button>
    </form>
</body>
</html>
