<?php
require_once 'existsUser.php';

function checkPassword($login, $password) {
    $users = getUsersList();
    if (existsUser($login)) {
        return password_verify($password, $users[$login]);
    }
    return false;
}
?>