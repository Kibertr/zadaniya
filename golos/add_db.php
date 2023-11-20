<?php
session_start();
$conn = mysqli_connect("localhost","root","root","zadanie");

$sql1 = "SELECT id FROM admin_db ORDER BY id DESC LIMIT 0, 1";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_row($result1);
$numb = ($row1[0]+1);
$vote_text = $_POST['text'];

$name=$_POST['username'];
$sql2 = "INSERT INTO `admin_db`(`id`,`text_db`) VALUES('$numb','$vote_text')";
$result2 = mysqli_query($conn,$sql2);

$sql3 = "CREATE TABLE vote$numb (
    vote varchar(255),
    votes varchar(5)        );";

$result3=mysqli_query($conn,$sql3);
if ($result3){
    $columns_number=$_POST['columns_number'];
    foreach(array_slice($_POST,1,$columns_number) as $key=>$val){
        include("connect.php");
        $sql4="INSERT INTO `vote$numb`(`vote`,`votes`) VALUES('$val','0')";
        $result4 = mysqli_query($conn,$sql4);
    }
    $_SESSION['error']='голосование создано';
}
header("Location: index.php");
?>
