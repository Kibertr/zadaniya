<?php
session_start();
$conn = mysqli_connect("localhost","developer","developer","development");


if (!empty($_COOKIE['mail']) && !empty($_COOKIE['pass'])){
    $mail = $_COOKIE['mail'];
    $sql = "SELECT * from cookie WHERE mail = '$mail'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_row($result)){
        echo "Привет - ".$row[2];
    }
    if (isset($_GET['exit'])){
        setcookie('mail',"",time() - 3600);
        setcookie('pass',"",time() - 3600);
        header("Location: index.php");
    }
}else{
    $mail = $_SESSION['mail'];
    
    $sql = "SELECT * from cookie WHERE mail = '$mail'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_row($result)){
        echo "Привет - ".$row[2];
    }
    if (isset($_GET['exit'])){
        unset($_SESSION['pass']);
        unset($_SESSION['mail']);
        setcookie('mail',"",time() - 3600);
        setcookie('pass',"",time() - 3600);


        header("Location: index.php");
    }
}
?>

</br><a href="index.php">Назад</a><br>
<a href="?exit">Выйти из профиля</a>
