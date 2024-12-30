
<?php
require_once 'getUsersList.php';

function existsUser($login) {
    $users = getUsersList();
    return isset($users[$login]);
}
?>