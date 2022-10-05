<?php
require_once "tableTool.interface.php";

class tableTool implements tableToolInterface{

    var $qwerty;
    public function __construct($data){
        $this->qwerty=$data;
    }
    private function ArraySort($szukaj){
        $powrot=array();
        sort($this->qwerty, SORT_NATURAL | SORT_FLAG_CASE);
        foreach ($this->qwerty as $we){
            if (preg_match("/\b(\w*$szukaj\w*)\b/ ", $we, $z) == true){
                $powrot[]= $z[0];
        }
        }
        return $powrot;
    }
    public function renderHTML($cols, $filterString=''){
    $posortowane= $this->ArraySort($filterString);
    $tabela= '';
    $tabela .= "<table>";
    for($i=0; $i<count($posortowane);$i++){
        if($i%$cols==0){
        $tabela .="<tr>";
        }
        if ($i<$cols){
            $tabela .="<th>".$posortowane[$i]."</th>";
        } else {
            $tabela .="<td>".$posortowane[$i]."</td>";
        }
        if($i%$cols==$cols-1){
            $tabela .="</tr>";
            }
    }
    $tabela .= "</table>";
    return $tabela;
}
    

    public function renderCSV($cols, $filterString='') {

    }
    public function renderMD($cols, $filterString='') {

    }

}

// NIE DOTYKAĆ KODU PONIŻEJ TEJ LINIJKI

$array = explode(' ', file_get_contents('lorem.txt'));

$table = new tableTool($array);

// Tests
echo $table->renderHTML(3);
echo $table->renderHTML(10);
echo $table->renderHTML(5,'id');
//echo $table->renderCSV(3);
//echo $table->renderCSV(10);
//echo $table->renderCSV(5,'id');
//echo $table->renderMD(3);
//echo $table->renderMD(10);
//echo $table->renderMD(5,'id');