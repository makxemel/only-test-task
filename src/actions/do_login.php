<?php

require_once __DIR__.'/boot.php';
require_once __DIR__.'/captcha.php';

// check user exists or not
$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `phone` = :phone OR `email` = :email");
$stmt->execute([
    'phone' => $_POST['login'],
    'email' => $_POST['login']
]);
if (!$stmt->rowCount()) {
    flash('Пользователь с такой почтой или номером телефона не зарегистрирован!');
    header('Location: /login');
    die;
}

// get user
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// check captcha
if (!check_captcha($_POST['smart-token'])) {
    flash('Пройдите капчу еще раз');
    header('Location: /login');
    die;
}

// verify password
if (password_verify($_POST['password'], $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    header('Location: /profile');
    die;
} else {
    flash('Пароль не верен');
    header('Location: /login');
    die;
}