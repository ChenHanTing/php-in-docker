<?php
  // 宣告變數 comments 為空陣列
  $comments = array();
  // 把資料放到陣列 $comments，裡面再建立陣列 array
  array_push($comments, array(
    "id" => 1,
    "username" => "aaa",
    "content" => "123"
  ));
  array_push($comments, array(
    "id" => 2,
    "username" => "bbb",
    "content" => "456"
  ));

  $json = array(
    "comments" => $comments
  );

  $response = json_encode($json);
  // 讓瀏覽器知道我們要印出 JSON 格式
  header('Content-Type: application/json; charset=utf-8');
  echo $response;
?>