<?php
include 'session.php';
session_start();

if (isset($_POST['username'])) {
    $username = htmlspecialchars($_POST['username']);
    setcookie('username', $username, time() + (7 * 24 * 60 * 60)); // Зберігаємо cookie на 7 днів
    header("Location: cookie.php"); 
    exit();
}

if (isset($_COOKIE['username'])) {
    $greeting = "Привіт, " . htmlspecialchars($_COOKIE['username']) . "!";
} else {
    $greeting = "";
}

if (isset($_POST['delete_cookie'])) {
    setcookie('username', '', time() - 3600); 
    header("Location: cookie.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Керування cookie</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Керування cookie</h1>
    <p><?php echo $greeting; ?></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="username">Ваше ім'я:</label>
        <input type="text" name="username" required>
        <input type="submit" style="background-color: pink;" value="Відправити">
    </form>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="submit" name="delete_cookie" style="background-color: pink; margin-bottom:10px; margin-top:10px;" value="Видалити cookie">
    </form>

    <form action="index.php" method="get">
    <button type="submit">На головну</button>
    </form>
</body>
</html>
