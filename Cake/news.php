<?php
header('Content-type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cake</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>
</head>

<body>

  <nav class="container navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #f3dc73;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
      aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">
      <img src="img/brand.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
      Cake
    </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Главная</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="news.php">Новости</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="recipes.php">Рецепты</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_recipe.php">Добавить рецепт</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row text-center alert">
      <div class="col-12">
        <h1 class="display-4">Заголовок</h1>
      </div>
      <hr>
      <div class="col-12">
        <p class="lead">
          О нас
          Если Вы уже успели немного ознакомиться с нашим сайтом, то могли заметить, что на нем представлены работы
          кондитеров из разных населенных пунктов со всего мира. Идея проста - в одном месте можно найти сразу и
          подходящий по внешнему виду торт, и кондитера из своего города, при этом, что важно, сразу ознакомиться с
          выполненными им работами.

          Часы работы кондитерской: с 9-00 до 21-00 по будням и с 10:00 до 20:00 в выходные и праздничные дни

          Адрес: г.Краснодар
        </p>
      </div>
    </div>
  </div>

  <?php require "php/footer.php" ?>

</body>

</html>