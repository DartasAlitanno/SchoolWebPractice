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
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Главная</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="news.php">Новости</a>
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

  <div class="container justify-content-center">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/cake1.jpg" class="d-block" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/cake2.jpg" class="d-block" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/cake3.jpg" class="d-block" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <div class="container">
    <div class="row text-center alert">
      <div class="col-12">
        <h1 class="display-4">Торты с Cake!</h1>
      </div>
      <hr>
      <div class="col-12">
        <p class="lead">
          В этом разделе вашему вниманию представлены проверенные рецепты тортов в домашних условиях. Торт…одно уже
          только это слово вызывает ассоциацию с праздником. Это особенная сладкая выпечка, которую обычно готовят по
          какому-либо поводу или к определенному празднику.
        </p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row text-center">
      <div class="col-12">
        <h1 class="display-4">Это удобно!</h1>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <h3>Онлайн обучение</h3>
        <p>
          Смотрите видео-уроки и готовьте десерты в любое удобное для вас время.
        </p>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <h3>Проверенные рецепты.</h3>
        <p>
          Подробные видео-уроки, разбор возможных ошибок, легкие рецепты базовых десертов и простые ингредиенты — все
          это поможет вам добиться идеальных результатов с первого раза.
        </p>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <h3>Заработок</h3>
        <p>
          Вы не только научитесь готовить вкусные десерты дома, но и начнете зарабатывать на любимом деле уже во время
          прохождения курса.
        </p>
      </div>
    </div>
    <br>
    <br>
  </div>

  <?php require "php/footer.php" ?>

</body>

</html>