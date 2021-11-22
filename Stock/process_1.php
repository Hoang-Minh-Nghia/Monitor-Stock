<?php
$arrCW = [];
if(isset($_POST['state'])){
   
    
    $arrCW = explode(',',$_POST['arr'],-1);
 
    $strWx = '<div class="d-flex sticky" ><div class="col-2 bg-green">Mã</div>' .
    '<div class="col-1">EPS</div>' .
    '<div class="col-1 bg-green">Giá</div>' . '<div class="col-1">P/E</div>' .
    '<div class="col-1 bg-green">F P/E</div>' .
    '<div class="col-1">BVPS</div>' .
    '<div class="col-1 bg-green">P/B</div>' .
    '<div class="col-1">KLGD</div>' .
    '<div class="col-1 bg-green">Lợi nhuận</div>'
    . '</div>';
    echo $strWx;

    $strW = '';
    for($i = 0; $i<$_POST['listLength']-1;$i++){
        $strW .= '<div id="' . $arrCW[$i] 
        . '" class="d-flex"><div class="col-2 bg-green">'.($i+1). ' - ' .
        $arrCW[$i] . '</div>' . '<div class="col-1 index2">-</div>'.
        '<div class="col-1 bg-green price pricex"> - </div>'.
        '<div class="col-1 index4">-</div>'.
        '<div class="col-1 index5 bg-green">-</div>'.
        '<div class="col-1 index6">-</div>'.
        '<div class="col-1 index7 bg-green">-</div>'.
        '<div class="col-1 index8">-</div>'.
        '<div class="col-1 index9 bg-green">-</div>'.
        '</div>';
    }
    echo $strW.'<div class="gap"></div>';
}


?>
