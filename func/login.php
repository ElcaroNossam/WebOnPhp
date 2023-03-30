<?php
session_start(); // необхідно для роботи з сесіями
$login = "admin"; // у нас немає бази даних, то встановимо логін і пароль вручну
$password = "123456";

if (isset($_POST["submit"]))  { // якщо натиснуто кнопку "Login"
    $userName = $_POST["username"]; // витягуємо ім'я користувача з форми
    $pass = $_POST["password"]; // витягуємо пароль користувача з форми

    if($userName === $login && $pass === $password) {
        $_SESSION['name'] = $userName; // якщо логін і пароль вірні, то записуємо ім'я користувача в сесію
    }
}

// redirect to index.php
header("Location: /");