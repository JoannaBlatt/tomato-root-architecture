<?php
$receivedData = $_GET['myData'];
echo "Received data from JavaScript: " . $receivedData;

  $html = file_get_contents('upload.html');
  echo str_replace('passBack()', "passBack('{$receivedData}')", $html);

?>
