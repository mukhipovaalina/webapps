<?php
session_start();

$session_timeout = 5 * 60;

if (isset($_SESSION['last_activity'])) {
    $inactive_time = time() - $_SESSION['last_activity'];

    error_log("Час неактивності: $inactive_time секунд.");

    if ($inactive_time > $session_timeout) {
        error_log("Сесія закінчена через неактивність.");
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
} else {
    error_log("Початок нової сесії.");
}

$_SESSION['last_activity'] = time();
?>
