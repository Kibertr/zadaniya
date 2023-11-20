<?php
session_start();
$conn=mysqli_connect("localhost","root","root","zadanie");
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href="style.css">
        <link rel='stylesheet' href="reset.css">
        
        <title></title>
    </head>
    <body>
        <section>
        <div class="info">
            <h1>Список доступных таблиц:</h1>
            <?php
            $sql = "SHOW tables";
            $result = mysqli_query($conn,$sql);
            $i=1;
            while($row = mysqli_fetch_row($result)){
                echo '<a href="?table='.$row[0].'">'.$row[0].'</a><br>';
                $i++;
            }
            if(isset($_GET['table'])||isset($_GET['page'])){
                $table = $_GET['table'];
                $sql1 = "SHOW COLUMNS from $table";
                $result1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_num_rows($result1);
                $sql_num = "SELECT * from $table";
                $result_num = mysqli_query($conn,$sql_num);
                $strok = mysqli_num_rows($result_num);
                $max = 50;
                if(isset($_GET['page'])){
                    $stranica = $_GET['page'];
                }else{
                    $_GET['page']= 1;
                    $stranica = 1;
                }
                $stranic = round($strok/$max);
                if($stranic==0){
                    $stranic=1;
                }
                $nachalo = $stranica*$max-$max;
                for ($i=1;$i<=$stranic;$i++){
                    if($_GET['page']==$i){
                        echo '<b><a href="?page='.$i.'&table='.$table.'" style="margin:3px;">'.$i.'</a></b>';
                    }else{
                        echo '<a href="?page='.$i.'&table='.$table.'" style="margin:3px;">'.$i.'</a>';
                    }
                }
                $sql2 = "SELECT * from $table LIMIT $nachalo,$max";
                $result2 = mysqli_query($conn,$sql2);
                echo "<table border='1' cellpadding='5'>";
                echo "<tr>";
                while($row2 = mysqli_fetch_row($result1)){
                    echo "<td>".$row2[0]."</td>";
                }
                echo "</tr>";
                while($row3 = mysqli_fetch_row($result2)){
                    echo "<tr>";
                    for ($i=0;$i<$row1;$i++){
                        echo "<td>".$row3[$i]."</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>
        </div>
        </section>
        <?php
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?>
    </body>
</html>
