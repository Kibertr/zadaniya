<?php
session_start();

class database{
    private $conn = "";

    function __construct(){
        $this->conn = mysqli_connect("localhost","root","root","zadanie");


    }
    public function pagination(){
        $sql = "SELECT COUNT(*) FROM gk";
        $result = mysqli_query($this->conn,$sql);
        $row = mysqli_fetch_row($result);
        return $row[0];
    }

    public function getdata($nachalo,$limit){
        $sql = "SELECT * FROM gk ORDER BY date DESC LIMIT $nachalo,$limit ";
        $result = mysqli_query($this->conn,$sql);
        if(mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){
                $array[]=$row;
            }
            return $array;
        }
    }
    public function plus($stranica,$stranic){
        if ($stranica>=$stranic){
        }else $stranica++;
        return $stranica;
    }
    public function minus($stranica){
        if ($stranica==1){
        }else $stranica--;
        return $stranica;
    }

    function add(){
        $mail = $_POST['mail'];
        $text = $_POST['text'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H-i-s');
        $sql = "INSERT INTO `gk`(`mail`, `text`, `ip`, `date`) VALUES ('$mail','$text','$ip','$date')";
        $result = mysqli_query($this->conn,$sql);
    }
}
if(!empty($_POST['mail']) && !empty($_POST['text'])){
    $cl = new database();
    $cl->add();
}
?>
