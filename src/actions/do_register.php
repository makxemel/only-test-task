<?php

require_once __DIR__.'/boot.php';
require_once __DIR__.'/../validator/validator.php';

// validate phone number
if (!validatePhone()) {
    flash('Наберите телефон в формате: XXXXXXXXXXX.');
    header('Location: /register');
    die;
}

//validate email
if (!validateEmail()) {
    flash('Введите почту в формате: mail@domain.com');
    header('Location: /register');
    die;
}

// validate password
if (strlen($_POST['password']) > 0 && !validatePassword()) {
    flash('Пароли не совпадают');
    header('Location: /register');
    die;
}

// exist phone or email in the database
$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `phone` = :phone OR `email` = :email");
$stmt->execute([
    'phone' => $_POST['phone'],
    'email' => $_POST['email']
]);
if ($stmt->rowCount() > 0) {
    flash('Эта почта или телефон уже занят!');
    header('Location: '.'/register');
    die;
}

// add user to db
$stmt = pdo()->prepare("INSERT INTO `users` (`name`, `phone`, `email`, `password`) VALUES (:name, :phone, :email, :password)");
$stmt->execute([
    'name' => $_POST['name'],
    'phone' => (int)$_POST['phone'],
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
]);

header('Location: '.'/');