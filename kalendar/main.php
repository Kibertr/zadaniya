<?php
class main{
    function kalendar(){?>
        <table cellpadding="30" border="1">
        <tr><th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th>Сб</th><th>Вс</th></tr>
        <?php
        if(!empty($_GET)){
        $sd = mktime(0,0,0,$_GET['month'],1,$_GET['year']);
        $fd = mktime(0,0,0,$_GET['month'],date("t",$sd),$_GET['year']);
        $v = 0;
        if(date("w",$fd)!=0){
            $v++;
        }
        for($i=$sd;$i<=$fd;$i=$i+(3600*24)){
            if(date("w",$i)==0){
                $v++;
            }
        }
        for($i=$sd;$i<=$fd;$i=$i+(3600*24)){
            if(date("w",$i)==1 || $i==$sd){
                echo '<tr>';
            }
            if(date('w',$sd!=1) && $i==$sd){
                if(date("w",$sd)==0){
                    $o = 7;
                }else{
                    $o = date("w",$sd);
                }
                for($p=0;$p<$o-1;$p++){
                    echo "<td></td>";
                }
            }
            $d = date('d',$i);
            echo '<td>'.$d.'</td>';
            if(date("w",$i)==0){
                echo '</tr>';
            }
        }
        }
        ?>
        </table><?php
    }
}    
if(isset($_GET['kalendar'])){
    $cl = new main();
    $cl->kalendar();
}
?>