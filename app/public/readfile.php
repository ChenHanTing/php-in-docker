<?php
$data = [];
$handle = fopen('data.txt', 'r');
if ($handle) {
  while (($line = fgets($handle)) !== false) {
    $_ = explode('=', $line);
    $data[$_[0]] = trim($_[1], "\n");
  }
  fclose($handle);
}

switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
    $response = json_encode($data);
    echo $response;
    break;
  case 'POST':
    if (isset($_POST['key'])) {
      $key = $_POST['key'];
      if (array_key_exists($key, $data))
        echo json_encode(array('result' => 'success', 'value' => $data[$key], 'key' => $key));
      else
        echo json_encode(array('result' => 'failed', 'error' => 'notfound', 'key' => $key));
    }
    break;
}
?>