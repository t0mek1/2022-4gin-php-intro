<?php
$connect = file_get_contents('http://loripsum.net/api');
$wyszukaj="l";
function ArraySort($tablica, $szukaj){
    $powrot;
    $tablica = explode(' ', $tablica);
    sort($tablica, SORT_NATURAL | SORT_FLAG_CASE);
    foreach ($tablica as $we){
        if (preg_match("/\b(\w*$szukaj\w*)\b/ ", $we, $z) == true){
            $powrot[]= $z[0]."<br>";
    }
    }
    for($i=0, $zwrot=""; $i<count($powrot);$i++){
        $zwrot .= $powrot[$i];
    }
    return $zwrot;
}
echo ArraySort($connect, $wyszukaj);
?>