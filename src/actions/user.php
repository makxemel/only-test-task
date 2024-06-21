<?php
require_once __DIR__.'/boot.php';

function getAuthedUser()
{
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = pdo()->prepare($sql);
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;
}