<?php
function strtoseo($value, $task=false)
{
    $marTViet= array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă", "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề" ,"ế","ệ","ể","ễ", "ì","í","ị","ỉ","ĩ", "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ" ,"ờ","ớ","ợ","ở","ỡ", "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ", "ỳ","ý","ỵ","ỷ","ỹ", "đ", "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă" ,"Ằ","Ắ","Ặ","Ẳ","Ẵ", "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ", "Ì","Í","Ị","Ỉ","Ĩ", "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ" ,"Ờ","Ớ","Ợ","Ở","Ỡ", "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ", "Ỳ","Ý","Ỵ","Ỷ","Ỹ", "Đ", " ","?",":","\"","'",",",".","!","#","@","$","(",")","[","]","{","}","|","+","`","&","/","%","\\","<",">");
    $marKoDau=array("a","a","a","a","a","a","a","a","a","a","a" ,"a","a","a","a","a","a", "e","e","e","e","e","e","e","e","e","e","e", "i","i","i","i","i", "o","o","o","o","o","o","o","o","o","o","o","o" ,"o","o","o","o","o", "u","u","u","u","u","u","u","u","u","u","u", "y","y","y","y","y", "d", "A","A","A","A","A","A","A","A","A","A","A","A" ,"A","A","A","A","A", "E","E","E","E","E","E","E","E","E","E","E", "I","I","I","I","I", "O","O","O","O","O","O","O","O","O","O","O","O" ,"O","O","O","O","O", "U","U","U","U","U","U","U","U","U","U","U", "Y","Y","Y","Y","Y", "D", "-","","","","","","","","","","","","","","","","","","","","","","","-","","");
    $value = str_replace($marTViet, $marKoDau, $value);
    $value = mb_strtolower(trim($value), "UTF-8");
    $value = str_replace(' ', '-', $value);
    $value = str_replace('?', '', $value);
    $value = str_replace('/', '-', $value);
    $value = str_replace('%', '', $value);
    $charaterA = '#(à|ả|ã|á|ạ|ă|ằ|ẳ|ẵ|ắ|ặ|â|ầ|ẩ|ẫ|ấ|ậ)#imsU';
    $replaceCharaterA = 'a';
    $value = preg_replace($charaterA, $replaceCharaterA, $value);
    $charaterD = '#(đ)#imsU';
    $replaceCharaterD = 'd';
    $value = preg_replace($charaterD, $replaceCharaterD, $value);
    $charaterE = '#(è|ẻ|ẽ|é|ẹ|ê|ề|ể|ễ|ế|ệ)#imsU';
    $replaceCharaterE = 'e';
    $value = preg_replace($charaterE, $replaceCharaterE, $value);
    $charaterI = '#(ì|ỉ|ĩ|í|ị)#imsU';
    $replaceCharaterI = 'i';
    $value = preg_replace($charaterI, $replaceCharaterI, $value);
    $charaterO = '#(ò|ỏ|õ|ó|ọ|ô|ồ|ổ|ỗ|ố|ộ|ơ|ờ|ở|ỡ|ớ|ợ)#imsU';
    $replaceCharaterO = 'o';
    $value = preg_replace($charaterO, $replaceCharaterO, $value);
    $charaterU = '#(ù|ủ|ũ|ú|ụ|ư|ừ|ử|ữ|ứ|ự)#imsU';
    $replaceCharaterU = 'u';
    $value = preg_replace($charaterU, $replaceCharaterU, $value);
    $charaterY = '#(ỳ|ỷ|ỹ|ý|ỵ)#imsU';
    $replaceCharaterY = 'y';
    $value = preg_replace($charaterY, $replaceCharaterY, $value);
    $value = str_replace(',', '', $value);
    $value = str_replace('---', '-', $value);
    $value = str_replace('--', '-', $value);
    $value = str_replace('-–-', '-', $value);
    $value = str_replace('_', '-', $value);
    $value = str_replace('(', '', $value);
    $value = str_replace(')', '', $value);
    $value = str_replace('{', '', $value);
    $value = str_replace('&', '', $value);
    $value = str_replace('}', '', $value);
    $value = str_replace('.', '-', $value);
    $value = str_replace('--', '-', $value);
    $value = str_replace('ỏ', 'o', $value);
    $value = preg_replace('/[^\p{L}\p{N}]/u', '-', $value);
    $value = str_replace("--", '-', $value);
    if ($task ==true) {
        $value = str_replace("--", '', $value);
        $value = str_replace("-", '', $value);
    }
    return $value;
}

function bsVndDot($strNum)
{
    $strNum = (int)$strNum;
    $result = number_format($strNum, 0, ',', '.');
    return $result;
}
