<?php 
    session_start();
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    if($password && $login){

        
        // Получаем данные из файла
        $file = fopen('../dataAuth.txt', 'r');

        $login_file = '';
        $password_file = '';

        while(!feof($file)) {
            $line = fgets($file);
            if (strpos($line, 'Login:') === 0) {
                $login_file = trim(str_replace('Login:', '', $line));
            }
            if (strpos($line, 'Password:') === 0) {
                $password_file = trim(str_replace('Password:', '', $line));
            }
        }
        fclose($file);

        $login_text = $login;

        if(md5($login) == $login_file && md5($password) == $password_file){
            $_SESSION['user'] == $login_text;
            header("Location: ../../index.php");
        }
        else{
            $_SESSION['error'] = "НЕТ ТАКОЙ УЧЕТНОЙ ЗАПИСИ";
            header("Location: ../../login.php");
        }
    }
    else{
        $_SESSION['error'] = "ЗАПОЛНИТЕ ВСЕ ПОЛЯ";
        header("Location: ../../login.php");
    }
?>