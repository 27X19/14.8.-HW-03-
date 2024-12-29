<?php
    session_start();
    require "header.php";
?>
<style>
    header {
        display: none;
    }
    form{
        width: 40%;
        display: flex;
        flex-direction: column;
        align-items: center;
        background: #fff;
        margin: 20px 0;
        padding: 10px;
        border-radius: 10px;
    }
    .block{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    form input{
        margin: 10px 0;
        width: 80%;
        padding: 10px;
        outline: none;
    }
    button{
        width: 300px;
        padding: 10px;
        background: green;
        border: none;
        border-radius: 5px;
        color: #fff;
        margin: 15px 0;
        cursor: pointer;
    }
</style>
<!--
 Login user 
 password user123
 -->
<div class="content">
    <div class="block">
        <form action="assets/app/loginController.php" method="POST">
            <input type="text" name="login" placeholder="Логин">
            <input type="password" name="password" placeholder="Пароль">
            <button type="submit">Войти</button>
            <?php if(isset($_SESSION['error'])):?>
                <p class="error"><?=$_SESSION['error']?></p>
            <?php
                unset($_SESSION['error']); 
                endif;
            ?> 
        </form>
    </div>
</div>