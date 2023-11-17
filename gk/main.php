<?php
class database{
    private $conn = "";

    function __construct(){
        $this->conn = mysqli_connect("localhost","root","root","zadanie");

    }
    public function getdata(){
        $sql = "SELECT * FROM gk";
        $result = mysqli_query($this->conn,$sql);
        while ($row = mysqli_fetch_assoc($result)){
            $array[]=$row;
        }
        return $array;
    }
}
?>
