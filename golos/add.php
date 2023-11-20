<?php
session_start();
$conn = mysqli_connect("localhost","root","root","zadanie");

$cookie= $_POST['cookie'];
$vote = $_POST["age"];
$name_db = $_POST['name_db'];
$sql = "SELECT votes From $name_db WHERE vote ='$vote'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($result);
$votes = $row[0]+1;


$vote = $_POST["age"];
$sql = "UPDATE $name_db SET votes ='$votes' WHERE vote='$vote'";
if(!isset($_COOKIE[$cookie]) && !$_COOKIE[$cookie]=="golos"){
    $result=mysqli_query($conn,$sql);
    if ($result){
        $_SESSION['error'] = 'Ваш голос учтен';
        setcookie($cookie,"golos", time() + 31536000000);
    }else {
        $_SESSION['error'] = 'Произошла ошибка';
    }
}else{
    $_SESSION['error'] = 'голос уже отдан';

}
header("Location: index.php");
?>
