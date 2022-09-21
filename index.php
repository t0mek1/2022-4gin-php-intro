<?php
$connect = file_get_contents('http://loripsum.net/api');
$wyszukaj="";
function ArraySort($tablica, $szukaj){
    $powrot;
    $tablica = explode(' ', $tablica);
    sort($tablica, SORT_NATURAL | SORT_FLAG_CASE);
    foreach ($tablica as $we){
        if (preg_match("/\b(\w*$szukaj\w*)\b/ ", $we, $z) == true){
            $powrot[]= $z[0]."<br>";
    }
    }
    for($i=0, $zwrot; $i<count($powrot);$i++){
        if ($szukaj=="" && $i==0){
            $i = $i + 5;
        }
        $zwrot[]= $powrot[$i];
    }
    return $zwrot;
}
$dane = ArraySort($connect, $wyszukaj);
$tabela= "";
$tabela .= "<table>";
for($i=0; $i<count($dane);$i++){
    if($i%4==0){
    $tabela .="<tr>";
    }
    if ($i<4){
        $tabela .="<th>".$dane[$i]."</th>";
    } else {
        $tabela .="<td>".$dane[$i]."</td>";
    }
    if($i%4==3){
        $tabela .="</tr>";
        }
}
$tabela .= "</table>";
echo $tabela;
//3.2 jest juz w 3.1
?>