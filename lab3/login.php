<?php
include 'session.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $correct_login = 'admin';
    $correct_password = 'password';

    $username = trim($_POST['username']); 
    $password = trim($_POST['password']);

    if ($username === $correct_login && $password === $correct_password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $correct_login;
        header("Location: index.php");
        exit();
    } else {
        $error = "Неправильний логін або пароль!";
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вхід</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Вхід</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="username">Логін:</label>
        <input type="text" name="username" required>
        <label for="password">Пароль:</label>
        <input type="password" name="password" required>
        <input type="submit" name="login" style="background-color: pink; margin-bottom:10px; margin-top:10px;" value="Увійти">
    </form>

    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

    <form action="index.php" method="get">
        <button type="submit" style="margin-top:10px;">На головну</button>
    </form>
</body>
</html>
