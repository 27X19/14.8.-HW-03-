
<?php
function getCurrentUser() {
    return isset($_SESSION['login']) ? $_SESSION['login'] : null;
}
?>