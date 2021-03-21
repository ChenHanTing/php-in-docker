<?php
$data['key'] = [];
$data['value'] = [];

$handle = fopen('data.txt', 'r');
if ($handle) {
  $counter = 0;
  while (($line = fgets($handle)) !== false) {
    $_ = explode('=', $line);
    $data['key'][$counter] = $_[0];
    $data['value'][$counter] = trim($_[1], "\n");
    $counter++;
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
      if (in_array($key, $data['key'])) {
        foreach($data['key'] as $k => $v) {
          if ($key == $v)
            $index = $k;
        }
        echo json_encode(array('result' => 'success', 'value' => $data['value'][$index], 'key' => $key));
      }
      else
        echo json_encode(array('result' => 'failed', 'error' => 'notfound', 'key' => $key));
    }
    break;
}
?>
