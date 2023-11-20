<?php
session_start();
$conn = mysqli_connect("localhost","root","root","zadanie");
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href="style.css">
        <link rel='stylesheet' href="reset.css">
        <style>
            section{
                padding:50px 50px;
            }
            .error{
                width:100%;
                position: absolute;
            }

            .info div{
                margin: 20px;
                float:left;
            }
            .info{
                display: inline-block;
                width: 100%;
            }
         </style>
    </head>
    <body>
        <header class="error">
            <?php
            
            if(isset($_SESSION['error'])){
               echo $_SESSION['error'];
               unset($_SESSION['error']);
            }
            ?>
        </header>
        <section>
            <div class='data'>
            <form action="index.php" method="get">
                Кол-во вариантов ответа - <input type="number" name="columns_number" style="background-color:var(--main-color);"> 
                <input type="submit" Value="создать" class="button">
                </form>
                <?php
            if(isset($_GET['columns_number'])){
                echo '<form enctype="multipart/form-data" action="add_db.php" method="post">';
                echo 'Вопрос - <input type="text" name="text"><br>';
                for($i=1;$i<=$_GET['columns_number'];$i++){
                    echo 'Вариант ответа '.$i.' - <input type="text" name="vote'.$i.'"><br>';
                }
                echo '<input type="hidden" name="columns_number" value="'.$_GET['columns_number'].'">';
                echo '<input type="submit" Value="Создать" class="button">';
                echo '</form>';
            }
                ?>
            </div>
            <div class="info">
                <?php
                    $sql1="SELECT text_db,id from admin_db WHERE id>1";
                    $result1=mysqli_query($conn,$sql1);
                    while($row1 = mysqli_fetch_row($result1)){
                        echo '<div class="form">';
                        echo '<form action="add.php" method="post">';
                        echo ('<h1>'.$row1[0].'</h1><br>');

                        $numb = $row1[1];
                        $sql3="SELECT vote from vote$numb";
                        $result3 = mysqli_query($conn,$sql3);
                        while ($row3 = mysqli_fetch_row($result3)){
                            echo ($row3[0].'<input type="radio" name="age" Value='.$row3[0].' style="margin:5px"><br>');
                        }
                        echo '<input type="hidden" name="name_db" value="vote'.$numb[0].'">';
                        echo '<input type="hidden" name="cookie" value="'.$row1[1].'">';
                        ?>
                        <b><input type="submit" Value="Ответить"></b>
                        <?php echo "</form></div>";
                    }
                ?>
            </div>
            
        </section>
    </body>
</html>
