<?php

function validatePhone()
{
    if (!preg_match("/^[0-9]{11}$/", $_POST['phone'])) {
        return false;
    }
    return true;
}

function validateEmail()
{
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

function validatePassword()
{
    if (!$_POST['password'] == $_POST['confirm_password']) {
        return false;
    }
    return true;
}
