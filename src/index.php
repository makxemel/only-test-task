<?php

// router
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '':
    case '/':
        require __DIR__ . '/views/login.php';
        break;
    case '/register':
        require __DIR__ . '/views/register.php';
        break;
    case '/register/user':
        require_once __DIR__.'/actions/do_register.php';
        break;
    case '/login':
        require_once __DIR__.'/views/login.php';
        break;
    case '/login/user':
        require_once __DIR__.'/actions/do_login.php';
        break;
    case '/profile/update':
        require __DIR__.'/actions/do_update.php';
        break;
    case '/profile':
        require __DIR__ .'/views/profile.php';
        break;
}