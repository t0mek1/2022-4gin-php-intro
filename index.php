<?php
$connect = file_get_contents('http://loripsum.net/api');
$array = explode(' ', $connect);
var_dump($array);
?>