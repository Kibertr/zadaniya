<?php
include("main.php");
$cl = new database();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head>
        <script src="assets/js/color-modes.js"></script>
        <script src="jquery-3.7.1.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>Offcanvas navbar template · Bootstrap v5.3</title>
        <link rel="stylesheet" href="downloads/css@3.css">
        <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="offcanvas-navbar.css" rel="stylesheet">

        <style>
        </style>
    </head>
  <body class="bg-body-tertiary">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

<main class="container">
<div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <div class="lh-1">
    <form method="post" action="add.php">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Почта</label>
        <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="text" class="form-label">Текст</label>
        <textarea  name="text" class="form-control" id="text"></textarea>
      </div>
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
        <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>">
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
      $("textarea").on('keyup', function (e) {
        if (e.key === 'Enter' || e.keyCode === 13) {
          $('textarea').val($('textarea').val() + '<br>');
        }
      });
    </script>
    
</div>
</div>

<?php
// Получаем текущую страницу
$current_page = basename($_SERVER['REQUEST_URI']);

// Генерируем "хлебные крошки"
echo '<nav aria-label="breadcrumb">';
echo '<ol class="breadcrumb">';

// Главный элемент
echo '<li class="breadcrumb-item">';
echo '<a href="index.php">Книга</a>';
echo '</li>';

// Промежуточные элементы
echo '<li class="breadcrumb-item"><a href="https://ya.ru">Yandex</a></li>';
echo '<li class="breadcrumb-item"><a href="another.php">Another</a></li>';
 

// Текущий элемент
echo "<li class='breadcrumb-item'><a class='active' class='link-success' href='".$current_page."'>"."Текущая вкладка: ".$current_page."</a></li>";
echo '</nav>';
?>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Гостевая книга</h6>
    <?php
        $vsego = $cl->pagination();
        $limit = 10;
        if(empty($_GET['page'])){
          $_GET['page']=1;
        }
        if(isset($_GET['page'])){
          $stranica = $_GET['page'];
          }
        else $stranica = 1;
        if ($vsego%$limit<5 & $vsego%$limit!=0){
          $stranic = round($vsego/$limit)+1;
        }else{
          $stranic = round($vsego/$limit);
        }
        $nachalo = $stranica * $limit - $limit;
        echo '
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="?page='.$cl->minus($stranica).'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>';
        for ($i=1;$i<=$stranic;$i++){
          if($_GET['page']==$i){
            echo '<b><li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li></b>';
          }else{
            echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
        }
        }
        echo '<li class="page-item">
                <a class="page-link" href="?page='.$cl->plus($stranica,$stranic).'" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
          </ul>
        </nav>';
        $array = $cl->getdata($nachalo);
        foreach($array as $key=>$val){
              echo '<div class="d-flex text-body-secondary pt-3">';
              echo '<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>';
              echo '<p class="pb-3 mb-0 small lh-sm border-bottom" style="width:100%;">';
              echo '<strong class="d-block text-gray-dark">'.$val['id'].". ".$val["mail"]."<text style='float:right;'>".$val['ip']."</text></strong>";
              echo '<br>';
              echo '<text>'.$val['text'].'</text>';
              echo '<strong class="d-block text-gray-dark" style="float:right;">'.$val["date"]."</strong>";
              echo "</p>";
              echo '</div>';
        }
    ?>

  </div>
</main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="offcanvas-navbar.js"></script></body>
</html>
