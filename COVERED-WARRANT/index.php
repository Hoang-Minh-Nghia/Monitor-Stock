

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            font-size: 16px;
            font-family: sans-serif;
            margin: 0;
            background: #232632;
            font-weight:600;
            scroll-behavior: smooth;
            color:#CBCACB;
        }
        .gap{
            height:100px;
        }
        .d-flex {
            display: flex;
            border-bottom: 2px solid rgba(255,255,255,.5);
        }
        .active{
            background: #2FFF1F!important;
            transition:all 0.4s;
        }
        .d-flex>div {
            text-align: center;
            padding: 10px 0px;
            transition: all 0.4s;
            border: 3px solid rgba(0,0,0,.1);
            border:0px 3px 0px 3px!important;
        }
        .d-flex>div:hover {
            border: 3px solid yellow !important;
        }
        .d-flex>.col-1 {
            width: 20%;
        }
        .d-flex>.col-2 {
            width: 20%;
        }
        .bg-green {
            color:#CBCACB;
            background: #05040F;
            border: 3px solid rgba(0,0,0,1) !important;
        }
        .bg-green>span , a{
            background: #000;
            text-decoration:none;
        }
        #root {
            padding: 20px;
        }
        .txt-red{
            color:red!important;
            background: #2FFF1F;
        }
        .txt-orange{
            background: #2FFF1F;
            color:yellow!important;
        }
        .txt-purple{
            color:rgb(253, 2, 253)!important;
        }
        .txt-green{
            color:#2FFF1F!important;
        }
        .txt-blue{
            color: #1e90ff!important;
        }
        .txt-yellow{
            color:yellow!important;
        }
        .d-none-x{
            display:none;
        }
        .price, .index7{
            background:#000!important;
            color:#fff;
        }
        .wrap-btn{
            display: flex;
            position: fixed;
            bottom: 0;
            left: 0;
            background: #000;
            width: 100%;
        }
        .wrap-btn a{
            display: inline-block;
            padding: 20px;
            width: 50%;
            color: #fff;
            text-align: center;
            margin: 0px 10px;
            transition:all 0.4s;
        }
        .wrap-btn a:hover{
            background:#d9d9d9;
            color:#000;
        }
        .index9{
            background:#000;
            color:#fff;
        }
        .sticky{
            position:sticky;
            top: 0;
        }
        .wrap-intro{
            overflow:hidden;
        }
        .wrap-intro .details{
            animation:run 20s linear;
            animation-iteration-count:infinite;
            transform:translateX(100%);
        }
        @keyframes run{
            0{
                transform:translateX(100%);
            }
            85%{
                opacity:1;
                transform:translateX(-100%);
            }
            90%{
                opacity:0;
                transform:translateX(-100%);
            }
            95%{
                opacity:0;
                transform:translateX(100%);
            }
            100%{
                opacity:1;
                transform:translateX(100%);
            }
        }
    </style>
</head>

<body>
<div class="wrap-btn">
<a href="javascript:void(0);" id="sendlist" >START</a>
<a href="javascript:void(0);" id="getInfo" >LOAD INFO</a>
</div>
    <div id="list"></div>
    <div class="result"></div>
    <div id="clone"></div> 
<?php

require_once('process.php');
?>

</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>


// construct
getListCW();

var dataStr = '';
var listCodeTemp = [];


function getListCW(){
    let listCodex = [];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            obj = JSON.parse(this.responseText);
            str = '';
            strW = '<div class="d-flex"><div class="col-1 bg-price">Mã</div>' +
                '<div class="col-1">Tỉ lệ chuyển đổi</div>' +
                '<div class="col-1 bg-price">Giá</div>' + '<div class="col-1">Giá TH</div>' +
                '<div class="col-1 bg-price">First</div>' +
                '<div class="col-1">Last</div>' +
                '<div class="col-1 bg-price">Cơ sở</div>' +
                '<div class="col-1">Điểm hòa vốn</div>' +
                '<div class="col-1 bg-price">Lợi nhuận</div>'
                + '</div>';
            for (varx of obj) 
            {
                key = varx['_sc_'];
                title = varx['label'];
                    listCodex.push(key);
                    strW += '<a title="' + title + '" id="#' + key + '" class="d-flex"><div class="col-1 bg-price">' + key + '</div>';
                    strW += '<div class="col-1">-</div>';
                    strW += '<div class="col-1 bg-price">' + varx['r'] + '</div>';
                    strW += '<div class="col-1">-</div>';
                    strW += '<div class="col-1 bg-price">-</div>';
                    strW += '<div class="col-1">-</div>';
                    strW += '<div class="col-1 bg-price">-</div>';
                    strW += '<div class="col-1">-</div>';
                    strW += '<div class="col-1 bg-price">-</div>';
                    +'</a>';

            }
            // $('#root').html(strW + str);
            listCodex.push(varx['_sc_']);
            listCode = listCodex.slice();
    
            listCodeTemp = listCodex.slice();

            listLength = listCode.length;
            listCode = listCode.toString();
        }

    }
    xmlhttp.open("GET", "https://api.vietstock.vn/finance/exchangeinfo?catID=12&languageID=1", true);
    xmlhttp.send();
}


$('#sendlist').click(function(e){
    var url = 'process.php';
    var data = {
        "state":'completed',        // view list
        "arr" : listCode,
        "listLength":listLength,
    }
    $('.result').load(url, data);
});
var indexppp = 0 ;
$('#getInfo').click(function(e){
    lengthc = listCodeTemp.length; 
    for(i=0;i<lengthc;i++){
        eachLink(listCodeTemp[i],i);
    }
    // var interval_obj = setInterval(function(){
    //     for(i=0;i<lengthc;i++){
    //     eachLink(listCodeTemp[i],i);
    // }
    // }, 10000);

});



function eachLink (linkPage,indexArr) {    
    var xmlhttpxx = new XMLHttpRequest();

    xmlhttpxx.onreadystatechange = function () {
        
        if (this.readyState == 4 && this.status == 200) {

            var result = this.responseText;
            convertHTML = $.parseHTML( result );
            $('#clone').html(convertHTML);
            arrayCul = [];
            arrayCont = [];

            // stockprice            
            tempx = $('#stockprice').html();
            arrayCont.push(tempx);//--- 
            // $($('.pricex')[indexArr]).html(tempx);//write
            tempx = $('#stockprice .price').text();
            tempx=tempx.replace(/,/g,"");
            tempx = Number(tempx);
            arrayCul.push(tempx);


            // gia thuc hien
            tempx = $($('.v-table>.bg-50>.p8')[1]).find('.pull-right').text();
            arrayCont.push(tempx);//--- 
            // $($('.index4')[indexArr]).html(tempx);//write
            tempx=tempx.replace(/,/g,"");
            tempx = Number(tempx);
            arrayCul.push(tempx);


            tempx = $($('.short-doc tbody>tr')[9]).find('.text-right').text();
            arrayCont.push(tempx);//--- 
            // $($('.index5')[indexArr]).html(tempx);//write date
            tempx = $($('.short-doc tbody>tr')[10]).find('.text-right').text();
            arrayCont.push(tempx);//--- 
            
            // $($('.index6')[indexArr]).html(tempx);//write date
            


            // co so
            tempx = $('#basestock').text();
            cls = $('#basestock').attr('class');
            tempx = '<span class="'+cls+'">'+tempx+'</span>';
            arrayCont.push(tempx);//--- 
            // $($('.index7')[indexArr]).html(tempx);//write
            tempx = $('#basestock').text();
            tempx=tempx.replace(/,/g,"");
            tempx = Number(tempx);
            arrayCul.push(tempx);

            // ti le chuyen doi
            tempx = $($('.short-doc tbody>tr')[12]).find('.text-right').text();
            arrayCont.push(tempx);//--- 
            // $($('.index2')[indexArr]).html(tempx);//write
            tempx = tempx.slice(0,-3);
            arrayCul.push(tempx);

            // diem hoa von
            // tempx = $('#breakeven').text();
            tempx = arrayCul[0]*arrayCul[3]+arrayCul[1];
            arrayCont.push(Math.round(tempx*100)/100);//--- 
            // $($('.index8')[indexArr]).html(Math.round(tempx*100)/100);//write point
            // tempx=tempx.replace(/,/g,"");
            arrayCul.push(tempx);

            // console.log(arrayCul);

            tempx = (((arrayCul[2]-arrayCul[4])/arrayCul[3])/arrayCul[0])*100;
            arrayCont.push(Math.round(tempx*100)/100);//--- 

            $('#clone').html(' ');
            writeTable(arrayCont,indexArr);
            
        }
    }
    linkStr = 'https://finance.vietstock.vn/chung-khoan-phai-sinh/'+linkPage+'/cw-tong-quan.htm';
    xmlhttpxx.open("GET", linkStr, true);
    xmlhttpxx.send();
}

function writeTable(arrayCul=[],indexPos){
    
    $($('.pricex')[indexPos]).html(arrayCul[0]);//write-giá-cw
    $($('.index4')[indexPos]).html(arrayCul[1]);//write-thực-hiện
    $($('.index5')[indexPos]).html(arrayCul[2]);//write date-phát-hành
    $($('.index6')[indexPos]).html(arrayCul[3]);//write date-đáo-hạn
    $($('.index7')[indexPos]).html(arrayCul[4]);//write-cơ-sở
    $($('.index2')[indexPos]).html(arrayCul[5]);//write-tỉ-lệ
    $($('.index8')[indexPos]).html(arrayCul[6]);//write point-hòa-vốn
    $($('.index9')[indexPos]).html(arrayCul[7]);//write point-lợi-nhuận
    if(arrayCul[7]>-15){
        $($('.index9')[indexPos]).addClass('active');
    }
    else{
        $($('.index9')[indexPos]).removeClass('active');
    }
}



</script>



