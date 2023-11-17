<?php
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

    public function getdata($nachalo){
        $sql = "SELECT * FROM gk LIMIT $nachalo,10";
        $result = mysqli_query($this->conn,$sql);
        while ($row = mysqli_fetch_assoc($result)){
            $array[]=$row;
        }
        return $array;
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
}
?>
