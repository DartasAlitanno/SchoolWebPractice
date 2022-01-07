<?php

//получить все записи
function get_all_articles() {
  $mysql_connection = new mysqli('localhost', 'root', 'root', 'sayt');
  $all_articles = array();
  if ($result = $mysql_connection->query("SELECT * FROM `articles`")) {
    while ($row = $result->fetch_assoc()) {
      $row['text'] = rtrim(substr($row['text'], 0, 300)).'...';//обрезание строки, теперь она еврей(((
      $all_articles[] = $row;
    }
  }
  $mysql_connection->close();
  return $all_articles;
}

//получить запись по id
function get_articles_by_id($id) {
  $mysql_connection = new mysqli('localhost', 'root', 'root', 'sayt');
  if ($result = $mysql_connection->query("SELECT * FROM `articles` WHERE `articles`.`id` = $id")) {
    $row = $result->fetch_assoc();
    $mysql_connection->close();
    return $row;
  }
}

//удалить запись по id
function delete_article($id) {
  $mysql_connection = new mysqli('localhost', 'root', 'root', 'sayt');
  if ($result = $mysql_connection->query("DELETE FROM `articles` WHERE `articles`.`id` = $id")) {
    return get_all_articles();
  }
}

?>