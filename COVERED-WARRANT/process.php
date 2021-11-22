<?php
$arrCW = [];
if(isset($_POST['state'])){
   
    
    $arrCW = explode(',',$_POST['arr'],-1);
 
    $strWx = '<div class="d-flex sticky" ><div class="col-2 bg-green">Mã</div>' .
    '<div class="col-1">Tỉ lệ chuyển đổi</div>' .
    '<div class="col-1 bg-green">Giá</div>' . '<div class="col-1">Giá TH</div>' .
    '<div class="col-1 bg-green">First</div>' .
    '<div class="col-1">Last</div>' .
    '<div class="col-1 bg-green">Cơ sở</div>' .
    '<div class="col-1">Điểm hòa vốn</div>' .
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
