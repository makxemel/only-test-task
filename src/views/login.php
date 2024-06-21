<?php
require_once __DIR__.'/../actions/boot.php';
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
    <script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
</head>
<body>
<div class="d-flex justify-content-center">
    <span>Нет аккаунта? <a href="/register"> Зарегистрируйся</a></span>
</div>
<?php flash(); ?>
<div class="d-flex justify-content-center">
    <form action="/login/user" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Почта или телефон</label>
            <input name="login" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div class="form-text">Телефон в формате XXXXXXXXXXX</div>
            <div class="form-text">Почта в формате mail@domain.ru</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div
                style="height: 100px"
                id="captcha-container"
                class="smart-captcha"
                data-sitekey="ysc1_EUJFvl0Ud85fYQxd457bFIQjlwE40MegsnWLCQ38dce6cf63"
        ></div>
        <button type="submit" class="btn btn-primary">Войти</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

