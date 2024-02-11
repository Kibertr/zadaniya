<?php
include("main.php");
$cl = new main();
?>
<style>
.change button{
    width:50%;
}
.change{
    display:flex;
    justify-content: space-between;
}
.select{
    min-width:100px;
}
.setting{
    display:flex;
    flex-direction:column;
}
.settings{
    display:flex;
    flex-direction:row;
    justify-content: center;
}
.main{
    display:inline-block;
    flex-direction:column;
}
section{
    width:100%;
    height:90vh;
    justify-content: center;    
    align-items:center;
}
</style>
<script src="jquery-3.7.1.js"></script>
<section>
<div class="main">
    <div class="settings">
        <div class="setting">
            <div >
                <select id="year" class="select">
                    <?php
                    for($i=1970;$i<=2030;$i++){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="change">
                <button id="year_minus"><-</button>
                <button id="year_plus">-></button>
            </div>
        </div>
        <div class="setting">
            <div >
                <select id="month" class="select">
                    <?php
                    $m = [1 => 'Январь',2 => 'Февраль',3 => 'Март',4 => 'Апрель',5 => 'Май',6 => 'Июнь',7 => 'Июль',8 => 'Август',9 => 'Сентябрь',10 => 'Октябрь',11 => 'Ноябрь',12 => 'Декабрь'];
                    for($i=1;$i<=12;$i++){
                        echo '<option value="'.$i.'">'.$m[$i].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="change">
                <button id="month_minus"><-</button>
                <button id="month_plus">-></button>
            </div>
        </div>
    </div>
    <div class="calendar_div">
        <div id="kalendar" class="calendar">

        </div>
    </div>
</div>
</section>
<script>
    $("#month_minus").on("click",function(){
        let s = $("#month").val();
        if($("#month").val()==1){
            s = 12;
        }else{
            s -=1;
        }
        $('#month option[value='+s+']').prop('selected', true);
        kalendar()
    });
    $("#month_plus").on("click",function(){
        let s = $("#month").val();
        if($("#month").val()==12){
            s = 1;
        }else{
            s = s*1+1;
        }
        $('#month option[value='+s+']').prop('selected', true);
        kalendar();
    });
    $("#year_minus").on("click",function(){
        let s = $("#year").val();
        if($("#year").val()==1970){
            s = 2030;
        }else{
            s -=1;
        }
        $('#year option[value='+s+']').prop('selected', true);
        kalendar()
    });
    $("#year_plus").on("click",function(){
        let s = $("#year").val();
        if($("#year").val()==2030){
            s = 1970;
        }else{
            s = s*1+1;
        }
        $('#year option[value='+s+']').prop('selected', true);
        kalendar();
    });
    $('#year').on('change',kalendar());
    $('#month').on('change',kalendar());
    function kalendar(){
        let year = $('#year').val();
        let month = $('#month').val();
        $('#kalendar').load("main.php?kalendar=kalendar&month="+month+"&year="+year);
    }
</script>

