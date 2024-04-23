<?php
// Retrieve the pathPrefix variable from the query string
$pathPrefix = $_GET['pathPrefix'];

shell_exec('rm -r '.$pathPrefix);
?>