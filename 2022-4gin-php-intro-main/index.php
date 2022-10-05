<?php
$connect = file_get_contents('http://loripsum.net/api');
$wyszukaj="";
$cols=5;
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
function renderHTMLTable($tablica, $szukaj, $kolumny){
    $dane = ArraySort($tablica, $szukaj);
    $tabela= "";
    $tabela .= "<table>";
    for($i=0; $i<count($dane);$i++){
        if($i%$kolumny==0){
        $tabela .="<tr>";
        }
        if ($i<$kolumny){
            $tabela .="<th>".$dane[$i]."</th>";
        } else {
            $tabela .="<td>".$dane[$i]."</td>";
        }
        if($i%$kolumny==$kolumny-1){
            $tabela .="</tr>";
            }
    }
    $tabela .= "</table>";
    return $tabela;
}
echo renderHTMLTable($connect, $wyszukaj, $cols);
?>