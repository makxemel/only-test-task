<?php

require_once __DIR__.'/../validator/validator.php';
require_once __DIR__.'/boot.php';

// validate phone
if (!validatePhone()) {
    flash('Наберите телефон в формате: XXXXXXXXXXX.');
    header('Location: /profile');
    die;
}

// validate email
if (!validateEmail()) {
    flash('Введите почту в формате: mail@domain.com');
    header('Location: /profile');
    die;
}

// if password exists and not validated
if (strlen($_POST['password']) > 0 && !validatePassword()) {
    flash('Пароли не совпадают');
    header('Location: /profile');
    die;
}

// update data
$sql = "UPDATE users SET name = :name, phone = :phone, email = :email, password = :password WHERE id = :id";
$prepStatement = [
    'id' => $_SESSION['user_id'],
    'name' => $_POST['name'],
    'phone' => (int)$_POST['phone'],
    'email' => $_POST['email'],
];

// if password not exists or exists in form
if (strlen($_POST['password']) == 0) {
    $sql = "UPDATE users SET name = :name, phone = :phone, email = :email WHERE id = :id";
} else {
    $prepStatement = array_merge(['password' => password_hash($_POST['password'], PASSWORD_DEFAULT)], $prepStatement);
}
$stmt = pdo()->prepare($sql);
$stmt->execute($prepStatement);

header('Location: /profile');