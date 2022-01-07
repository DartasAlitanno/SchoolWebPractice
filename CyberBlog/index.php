<?php
  header("Content-Type:text/html;charset=UTF8");
  //php include
  require "code/php/red_bean_db_connect.php";
  require "code/php/functions.php";
  //get all articles
  $articles_array = get_all_articles();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Blog</title>
  <meta charset="utf-8">
  <!-- local import -->
  <link rel="stylesheet" href="css//main.css" />
  <!-- web import -->
  <script src="https://use.fontawesome.com/937d944051.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>
</head>

<body>

  <!-- header -->
  <nav class="container-fluid navbar navbar-expand-lg navbar-dark bg-cyber fixed-top">
    <div class="container">
      <!-- logo -->
      <a class="navbar-brand navbar-brad" href="#"><img src="img/logo.png" alt="logo" /></a>
      <!-- burger -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- nav-menu -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Главная</a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="<?php if(isset($_SESSION['logged_user'])) echo 'articles.php'; else echo 'code/php/login.php'?>" id="dropdownMenuLink"
                data-toggle="dropdown">Публикации</a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="<?php if(isset($_SESSION['logged_user'])) echo 'articles.php'; else echo 'code/php/login.php'?>">Горячие новости</a>
                <a class="dropdown-item" href="<?php if(isset($_SESSION['logged_user'])) echo 'articles.php'; else echo 'code/php/login.php'?>">Популярные</a>
                <a class="dropdown-item" href="<?php if(isset($_SESSION['logged_user'])) echo 'articles.php'; else echo 'code/php/login.php'?>">Топ 100</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Обратная связь</a>
          </li>
        </ul>
        <?php if(isset($_SESSION['logged_user'])) : //if user correct?>
        <ul class="navbar-nav mr-right">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <?php if($_SESSION['logged_user']['role'] == 'admin') {?>
              <i class="fa fa-star" aria-hidden="false" style="color: #ffe60079; text-shadow: 1px 1px 10px #fff12fcc;"></i>
              <?php } echo $_SESSION['logged_user']->login; //user name?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Профиль</a>
              <a class="dropdown-item" href="#">Настройки</a>
              <?php if($_SESSION['logged_user']['role'] == 'admin') {?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="setting.php">Управление
              <i class="fa fa-cog" aria-hidden="false" style="color: #ffe60079; text-shadow: 1px 1px 10px #fff12fcc;"></i></a>
              <?php }?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="code/php/logout.php">Выход</a>
            </div>
          </li>
        </ul>
        <?php else : //if(isset($_SESSION['logged_user']) == false)?>
        <!-- auth buttons -->
        <form class="form-inline my-2 my-lg-0">
          <button class="btn btn-cyber-primary my-2 my-sm-0" type="button" value="login"
            onclick="document.location='code/php/login.php'">Вход</button>
          <button class="btn btn-cyber-secondary my-2 my-sm-0" type="button" value="registration"
            onclick="document.location='code/php/register.php'">Регистрация</button>
        </form>
        <?php endif ; ?>
      </div>
    </div>
  </nav>

  <!-- welcome text -->
  <div class="container">
    <div class="block-blue">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
          <p>
            Добро пожаловать на лучший игровой форум! Здесь можно обсудить и осудить любые популярные и не популярные
            игры
            без опасения за свою ж0пу!
          </p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
          <img class="img-fluid" src="img/vlogo.png" alt="">
        </div>
      </div>
    </div>
  </div>

  <!-- main content -->
  <div class="container">
    <div class="block-red">
      <?$counter = 0; foreach($articles_array as $key => $value) {?>
      <h2 class="cyber-h2"><?php echo $value['title'] ?></h2>
      <h6 class="cyber-h6"><?php echo $value['date'] ?></h6>
      <div class="row">
        <div class="col-7">
          <p class="cyber-p" style="font-size: 18px"><?php echo $value['text'] ?></p>
        </div>
        <div class="col-5">
          <img src="<?php echo $value['image'] ?>" class="img-fluid img-shadow img_cyber">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-3">
          <a href="<?php if(isset($_SESSION['logged_user'])) echo "article.php?id=".$value['id']; else echo 'code/php/login.php'?>" class="btn btn-cyber">Читать далее</a>
        </div>
        <div class="col-9">
          <p class="text-right cyber-ps">Опубликовано: <?php echo $value['creator'] ?></p>
        </div>
      </div>
      <hr class="hr_divider">
      <?php if($counter == 1) break; $counter++; }?>
      <div class="row text-center">
        <div class="col-12">
          <a class="learn_more" href="<?php if(isset($_SESSION['logged_user'])) echo 'articles.php'; else echo 'code/php/login.php'?>">Читать все записи...</a>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <?php require "modules/footer.php" ?>

</body>

</html>