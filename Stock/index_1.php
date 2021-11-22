

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
            background: #008000!important;
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
        .txt-blue{
            color: #1e90ff!important;
        }
        .txt-purple{
            color:rgb(253, 2, 253)!important;
        }
        .txt-green{
            color:#2FFF1F!important;
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
<a href="javascript:void(0);" id="getInfo1" >LOAD first</a>
<a href="javascript:void(0);" id="getInfo2" >LOAD second</a>
</div>
    <div id="list"></div>
    <div class="result"></div>
    <div id="clone"></div> 
<?php

require_once('process_1.php');
?>

</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>


// construct
getListCW();

function xoa_dau(str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
    str = str.replace(/Đ/g, "D");
    return str;
}

var dataStr = '';
var listCodeTemp = [];
var listCode_name = [];

function getListCW(){
    let listCodex = [];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
        

            obj = JSON.parse(this.responseText);
            // console.log(obj);
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
                name_cp=varx['stockName']

               
                    title = varx['label'];
                    listCodex.push(key);
                    name_cp=xoa_dau(name_cp).toLowerCase();
                    name_cp=name_cp.replace(/-/g,' ');
                    name_cp=name_cp.replace(/\s+/g,' ');
                    name_cp=name_cp.replace(/ /g,'-');
                    listCode_name.push(name_cp);
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
            listCode = listCodex.slice();
            listCode_ma = listCodex.slice();
            // console.log(listCode);
            listCodeTemp = listCode_name.slice();
            listLength = listCode.length;
            listCode = listCode.toString();
            
            
        }
    }
    xmlhttp.open("GET", "https://api.vietstock.vn/finance/exchangeinfo?catID=0&languageID=1", true);
    xmlhttp.send();
}


$('#sendlist').click(function(e){
    var url = 'process_1.php';
    var data = {
        "state":'completed',        // view list
        "arr" : listCode,
        "listLength":listLength,
    }
    $('.result').load(url, data);
});



var indexppp = 0 ;
$('#getInfo1').click(function(e){
    var i=1;
    lengthc = listCodeTemp.length; 

        
        for(i=0;i<100;i++){
        eachLink(listCode_ma[i],listCodeTemp[i],i);
        }
        setTimeout(function(){
                for(i=100;i<200;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);
        setTimeout(function(){
                for(i=200;i<300;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);

        setTimeout(function(){
                for(i=300;i<400;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);

        setTimeout(function(){
                for(i=400;i<500;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);

        setTimeout(function(){
                for(i=500;i<600;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);

        setTimeout(function(){
                for(i=600;i<700;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);

        setTimeout(function(){
                for(i=700;i<800;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);

        setTimeout(function(){
                for(i=800;i<900;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);

        setTimeout(function(){
                for(i=900;i<1000;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);

        setTimeout(function(){
                for(i=1000;i<1100;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);

        setTimeout(function(){
                for(i=1100;i<1150;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);
     
});

$('#getInfo2').click(function(e){
    lengthc = listCodeTemp.length; 
        for(i=1150;i<1200;i++){
        eachLink(listCode_ma[i],listCodeTemp[i],i);
        }
        setTimeout(function(){
                for(i=1200;i<1300;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);
        setTimeout(function(){
                for(i=1300;i<1400;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);
        setTimeout(function(){
                for(i=1400;i<1500;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);
        setTimeout(function(){
                for(i=1500;i<1600;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);
        setTimeout(function(){
                for(i=1600;i<lengthc;i++){
                eachLink(listCode_ma[i],listCodeTemp[i],i);
                }
        }, 20000);
     
});



function eachLink (namePage,linkPage,indexArr) {    
    var xmlhttpxx = new XMLHttpRequest();

    xmlhttpxx.onreadystatechange = function () {
        
        if (this.readyState == 4 && this.status == 200) {

            var result = this.responseText;
            convertHTML = $.parseHTML( result );
            $('#clone').html(convertHTML);
            arrayCul = [];
            arrayCont = [];





       
            tempx = $('#stockprice').html(); // 0
            // console.log(" GIÁ");
            // console.log(tempx);
            arrayCont.push(tempx);//--- 

            


            tempx = $($('.v-table>.bg-50>.p8')[1]).find('.pull-right').text(); // 1
            arrayCont.push(tempx);//--- 
            // console.log(" EPS");
            // console.log(tempx);

            

            tempx = $($('.v-table>.bg-50>.p8')[2]).find('.pull-right').text(); // 2
            arrayCont.push(tempx);//--- 
            // console.log("  F P/E");
            // console.log(tempx);

           
            tempx = $($('.v-table>.bg-50>.p8')[3]).find('.pull-right').text(); // 3
            arrayCont.push(tempx);//--- 
            // console.log(" BVPS");
            // console.log(tempx);

            tempx = $($('.v-table>.bg-50>.p8')[4]).find('.pull-right').text();// 4
            arrayCont.push(tempx);//--- 
            // console.log(" P/B");
            // console.log(tempx);
           
            tempx = $($('.v-table>.bg-50>.p8')[0]).find('.pull-right').text();//5
            // console.log(tempx);
            tempx=tempx.replace(/,/g,'');
            arrayCont.push(tempx);//--- 
            // console.log(tempx);



            tempx = $($('.stock-price-info>.bg-50>.p8')[3]).find('.pull-right').text();//6
            tempx=tempx.replace(/,/g,'');
            arrayCont.push(tempx);//--- 

    
      
            tempx = $('#stockchange').html(); //Lợi nhuận
            arrayCont.push(tempx);//--- 
            $('#clone').html(' ');
            writeTable(arrayCont,indexArr);
            
        }
    }
    linkStr = 'https://finance.vietstock.vn/'+namePage+'-'+linkPage+'.htm';
    xmlhttpxx.open("GET", linkStr, true);
    xmlhttpxx.send();
}

function writeTable(arrayCul=[],indexPos){
    
    $($('.pricex')[indexPos]).html(arrayCul[0]);//write-giá-cw
    $($('.index4')[indexPos]).html(arrayCul[1]);// P/E
    $($('.index5')[indexPos]).html(arrayCul[2]);// F P/E
    $($('.index6')[indexPos]).html(arrayCul[3]);// BVPS
    $($('.index7')[indexPos]).html(arrayCul[4]);// P/B
    $($('.index2')[indexPos]).html(arrayCul[5]);// EPS
    $($('.index8')[indexPos]).html(arrayCul[6]);// KLGG
    $($('.index9')[indexPos]).html(arrayCul[7]);//


    if(arrayCul[1]>0 && arrayCul[1]<15){
        $($('.index4')[indexPos]).addClass('active');

    }
    else{
        $($('.index4')[indexPos]).removeClass('active');
    }
    // P/E

    if(arrayCul[5]>1500){
        $($('.index2')[indexPos]).addClass('active');

    }
    else{
        $($('.index2')[indexPos]).removeClass('active');
    }
    // EPS

    if(arrayCul[6]>1000000){
        $($('.index8')[indexPos]).addClass('active');

    }
    else{
        $($('.index8')[indexPos]).removeClass('active');
    }
    // KLGD
}




</script>



