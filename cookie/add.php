<?php
session_start();
$conn = mysqli_connect("localhost","developer","developer","development");


if(!empty($_POST['mail']) && !empty($_POST['pass'])){
    $mail = $_POST['mail'];
    $pass = md5($_POST['pass']);

    $sql1 = "SELECT mail,pass from `cookie` WHERE mail = '$mail'";
    $result1 = mysqli_query($conn,$sql1);
    if (mysqli_num_rows($result1) == 0){
        $sql2 = "INSERT INTO `cookie`(`id`, `mail`, `pass`) VALUES (NULL,'$mail','$pass')";
        $result2 = mysqli_query($conn,$sql2);
        if ($result2){
            $_SESSION["error"] = "Аккаунт успешно создан";
            if ($_POST['save_log1']!= "on"){
                setcookie("mail", $mail, time()+3600);
                setcookie("pass", $pass, time()+3600);
            }else {
                $_SESSION['mail'] = $mail;
                $_SESSION['pass'] = $pass;
            }
        }else {
            $_SESSION["error"] = "Не удалось создать аккаунт";
        }
    }
    if (mysqli_num_rows($result1) == 1){
        $pass = md5($_POST['pass']);
        $mail = $_POST['mail'];

        $sql3 = "SELECT pass from cookie WHERE mail = '$mail'";
        $result3 = mysqli_query($conn,$sql3);
        while ($row = mysqli_fetch_row($result3)){
            if($pass == $row[0]){
                if ($_POST['save_log1']!= "on"){
                    $_SESSION['error'] = "Успешный вход";
                    setcookie("mail", $mail, time()+3600);
                    setcookie("pass", $pass, time()+3600);
                }else {
                    $_SESSION['mail'] = $mail;
                    $_SESSION['pass'] = $pass;
                }
            }else {
                $_SESSION['error']="Пароль не верен";
            }
        }
    }
    setcookie('mail_reg',$_POST['mail'],time()+3600);
    setcookie('pass_reg',$_POST['pass'],time()+3600);
}else{
    $_SESSION['error']="Поля не заполнены";
    if (!empty($_POST['mail'])){
        setcookie('mail_reg',$_POST['mail'],time()+3600);
    }else {
        setcookie('mail_reg',"",time()-3600);
    }
    if (!empty($_POST['pass'])){
        setcookie('pass_reg',$_POST['pass'],time()+3600);
    }else{
        setcookie('pass_reg',"",time()-3600);
    }
}

header("Location: index.php");
?>
