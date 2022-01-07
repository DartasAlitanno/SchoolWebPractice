<?php
    require 'red_bean_db_connect.php';
    $data = $_POST;
    if(isset($data['do_login'])){
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']));
        if($user){
            if(password_verify($data['password'], $user->password)){
                // проблем нет, логиним пользователя
                $_SESSION['logged_user'] = $user;
                header('Location: /index.php');
            } else {
                $errors[] = 'Неверно введён логин или пароль';
            }
        } else {
            $errors[] = 'Неверно введён логин или пароль';
        }
        if(!empty($errors)){
            echo '<div class="container block-danger text-center"><strong>Ошибка!</strong>'.array_shift($errors).'</div>';
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
  <title>Авторизация</title>
  <meta charset="utf-8">
  <!-- local import -->
  <link rel="stylesheet" href="../../css/auth.css" />
  <script src="../js/script.js"></script>
  <!-- web import -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>
</head>

<body>
  <div class="container">
    <div class="block-blue">
      <form method="POST" action="login.php">
        <legend>Авторизация</legend>
        <div class="form-group">
          <label for="Login">Логин</label>
          <input type="text" class="form-control" id="first" name="login"
            placeholder="Логин" value="<?php echo @$data['login']; ?>">
        </div>
        <div class="form-group">
          <label for="Password">Пароль</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-cyber" name="do_login">Вход</button>
          <button class="btn btn-cyber" type="button" onclick="document.location='register.php'">Нету аккаунта?</button>
          <button class="btn btn-cyber" type="button" onclick="document.location='../../index.php'">Отмена</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>