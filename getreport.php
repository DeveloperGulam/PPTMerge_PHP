<?php
require_once'_headcode.php';
/* 
 * downloads report and pushes it to client
Fix for non http report server
 */


if(@isset($_POST['rurl'])){
    set_time_limit(0);
//    $file = str_replace(" ","%20", $_POST['rurl']);
    if(strpos($_POST['rurl'],".ppt")){
        $file = $_POST['rurl'];
    }else{
        $file = $siteRoot. "tmp/".$_POST['rurl'] ."/RAM.docx"; //has issue with spaces Audit summary.New location where we save docs for download is different for word
    }
    header("Content-Description: File Transfer"); 
    header("Content-Type: application/octet-stream"); 
    //header("Content-Transfer-Encoding: Binary"); 
    header('Content-Transfer-Encoding: chunked'); //start download while reading the file(no delay)
    header('Expires: 0');
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header('Pragma: public');
    header("Content-Disposition: attachment; filename=\"". basename($file) ."\""); 
    flush();
    readfile ($file);
    exit(); 

}else{
    die("This page cannot be used independently");
}