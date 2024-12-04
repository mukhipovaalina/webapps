<?php
require_once 'account.php';

try {
    // Створення об'єктів BankAccount та SavingsAccount
    $account1 = new BankAccount(100);
    $savingsAccount = new SavingsAccount(500);

    // Поповнення рахунку
    echo "Поповнення рахунку на 200 USD";
    echo " ";
    $account1->deposit(200);
    echo "Баланс: " . $account1->getBalance() . " " . $account1->getCurrency() . "\n";
    // Спроба зняття більше, ніж баланс
    echo "Спроба зняття 400 USD\n";
    $account1->withdraw(400);
    echo "Баланс: " . $account1->getBalance() . " " . $account1->getCurrency() . "\n";

} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
}

try {
    // Застосування відсотків для накопичувального рахунку
    echo "Застосування відсотків до накопичувального рахунку\n";
    $savingsAccount->applyInterest();
    echo "Баланс після застосування відсотків: " . $savingsAccount->getBalance() . " " . $savingsAccount->getCurrency() . "\n";

    // Спроба некоректного зняття (негативна сума)
    echo "Спроба зняття -50 USD\n";
    $savingsAccount->withdraw(-50);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
}
?>
