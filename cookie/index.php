<?php
session_start();

?>
<html>
    <head>
        <title>профиль</title>
    </head>
    <body>
        <?php
            if(isset($_COOKIE['mail']) && isset($_COOKIE['pass']) || isset($_SESSION['pass']) && isset($_SESSION['mail'])){
                if(isset($_COOKIE['mail']) && isset($_COOKIE['pass'])){
                    echo "Вы вошли как - ".$_COOKIE['mail']."<br>"."Ваш пароль - ".$_COOKIE['pass'];
                }
                else if( isset($_SESSION['pass']) && isset($_SESSION['mail'])){
                    echo "Вы вошли как - ".$_SESSION['mail']."<br>"."Ваш пароль - ".$_SESSION['pass'];
                }
                ?>
                <br><a href="profile.php">Войти в профиль</a> 
                <?php
        }else {?>
        <div>
            <form action="add.php" method="post">
                Почта - <input type="text" name="mail" value="<?php if(isset($_COOKIE['mail_reg'])){echo $_COOKIE['mail_reg'];}?>"><br>
                Пароль - <input type="password" name="pass" value="<?php if(isset($_COOKIE['pass_reg'])){echo $_COOKIE['pass_reg'];}?>"><br>
                запомнить? <input type="checkbox" name="save_log1" checked="checked"><br>
                <input type="submit" Value="Создать">
            </form>
        </div>
        <?php
    }
        if (isset($_SESSION['error']) && !empty($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?>
    </body>
</html>
