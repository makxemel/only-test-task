<?php
session_start();

function pdo()
{
    static $pdo;

    if (!$pdo) {
        $config = include __DIR__.'/../config.php';

        $driver = $config['driver'];
        $host = $config['host'];
        $port = $config['port'];
        $database = $config['database'];
        $username = $config['username'];
        $password = $config['password'];
        $charset = $config['charset'];

        $pdo = new \PDO(
            "$driver:host=$host;port=$port;dbname=$database",
            $username,
            $password
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;
}

function flash($message = null)
{
    if ($message) {
        $_SESSION['flash'] = $message;
    } else {
        if (!empty($_SESSION['flash'])) { ?>
            <div class="d-flex justify-content-center alert alert-danger" role="alert">
                <?=$_SESSION['flash']?>
            </div>
        <?php }
        unset($_SESSION['flash']);
    }
}

function check_auth()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: /');
    }
    return true;
}

function getUser()
{
    if (check_auth()) {
        $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $stmt->execute(['id' => $_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    return false;
}

function redirectToLoginIfNotAuthorized()
{
    if (!check_auth()) {
        header('Location: /login');
    }
}