<?php
  // use PhaIcon\Mvc\Micro;
  // $app = new Micro();

  $data = array();
  header('Content-Type: application/json; charset=utf-8');

  $handle = fopen('data.txt', 'r');
  if ($handle) {
      $counter = 1;
      while (($line = fgets($handle)) !== false) {
        // echo $line.'<br />';
        $_ = explode('=', $line);
        array_push($data, array('id' => $counter, 'key' => $_[0], 'value' => trim($_[1], "\n")));
        $counter++;
      }

      fclose($handle);
  } else {
      // error opening the file.
  }

  $method = $_SERVER['REQUEST_METHOD'];
  $input_json = file_get_contents('php://input');
  $decoded_data = json_decode($input_json);

  // create SQL based on HTTP method
  switch ($method) {
    case 'GET':
      $response = json_encode($data);
      // 讓瀏覽器知道我們要印出 JSON 格式
      echo $response;
      break;
    case 'POST':
      if(!empty($decoded_data)) {
        if(array_search($decoded_data->key, array_column($data, 'key'))) {
          echo json_encode(array('result' => 'success', 'message' => $decoded_data->key));
        } else {
          echo json_encode(array('result' => 'failed', 'message' => 'key not found'));
        }

      } else {
        echo json_encode(array('result' => 'failed', 'message' => 'null key'));
      }
      break;
  }
  // array_push($data, array('a' => 'b'));
  // $json = array($data);
?>