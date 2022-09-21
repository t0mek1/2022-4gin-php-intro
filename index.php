<?php
$connect = file_get_contents('http://loripsum.net/api');
$array = explode(' ', $connect);
foreach ($array as $we){
    if (preg_match("/\b(\w*e\w*)\b/ ", $we, $z) == true){
        echo $z[0]."<br>";
}
}
?>