<?php
if(!empty($_POST['mail']) && !empty($_POST['text'])){
    $conn = mysqli_connect("localhost","root","root","zadanie");
    $mail = $_POST['mail'];
    $text = $_POST['text'];
    $ip = $_POST['ip'];
    $date = $_POST['date'];
    $sql = "INSERT INTO `gk`(`mail`, `text`, `ip`, `date`) VALUES ('$mail','$text','$ip','$date')";
    $result = mysqli_query($conn,$sql);
}
    header("Location: index.php");
?>
