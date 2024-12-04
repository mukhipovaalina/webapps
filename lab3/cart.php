<?php
include 'session.php'; 
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {
    $item = htmlspecialchars($_POST['item']);
    $_SESSION['cart'][] = $item; 
}

if (isset($_POST['remove_from_cart'])) {
    $item_to_remove = htmlspecialchars($_POST['item']);
    if (($key = array_search($item_to_remove, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

if (!isset($_SESSION['previous_cart'])) {
    $previous_cart = isset($_COOKIE['previous_cart']) ? unserialize($_COOKIE['previous_cart']) : [];
    
    if (!is_array($previous_cart)) {
        $previous_cart = [];
    }

    $_SESSION['previous_cart'] = $previous_cart;
}

$new_previous_cart = array_unique(array_merge($_SESSION['previous_cart'], $_SESSION['cart']));
setcookie('previous_cart', serialize($new_previous_cart), time() + (30 * 24 * 60 * 60)); // 30 днів

$_SESSION['previous_cart'] = $new_previous_cart;
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Корзина</h1>

    <h2>Товари в корзині:</h2>
    <ul>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <li><?php echo htmlspecialchars($item); ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" style="display:inline;">
                        <input type="hidden" name="item" value="<?php echo htmlspecialchars($item); ?>">
                        <button type="submit" name="remove_from_cart">Видалити</button>
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Корзина пуста</li>
        <?php endif; ?>
    </ul>

    <h2>Додати товар:</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="text" name="item" style="font-size: 18px;" placeholder="Назва товару" required>
        <button type="submit" name="add_to_cart">Додати до корзини</button>
    </form>

    <h2>Попередні покупки:</h2>
    <ul>
        <?php if (!empty($_SESSION['previous_cart'])): ?>
            <?php foreach ($_SESSION['previous_cart'] as $prev_item): ?>
                <li><?php echo htmlspecialchars($prev_item); ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Немає попередніх покупок</li>
        <?php endif; ?>
    </ul>

    <form action="index.php" method="get">
        <button type="submit">На головну</button>
    </form>
</body>
</html>
