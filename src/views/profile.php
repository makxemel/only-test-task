<?php
require_once __DIR__.'/../actions/user.php';
require_once __DIR__.'/../actions/boot.php';

redirectToLoginIfNotAuthorized();

// get authorized user
$user = getAuthedUser();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Only Test Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php flash(); ?>
<div class="d-flex justify-content-center">
    <form action="/profile/update" method="POST">
        <div class="mb-3">
            <label class="form-label">Имя</label>
            <input name="name" type="text" class="form-control" value="<?= htmlspecialchars($user['name']) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Телефон</label>
            <input name="phone" type="tel" class="form-control" value="<?= htmlspecialchars($user['phone']) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Почта</label>
            <input name="email" type="email" class="form-control" aria-describedby="emailHelp" value="<?= htmlspecialchars($user['email']) ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Новый пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Подверждение пароля</label>
            <input name="confirm_password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
