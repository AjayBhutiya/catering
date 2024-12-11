<?php
include_once "helper/session.php";
Session::init();
define("root",'http://localhost/event/');
include_once "helper/redirect.php";
include_once "helper/DB.php";
$module = "users";
$file= "index";
$uid=null;
$url=$_GET['url'] ?? null;
if($url){
    $url = explode('/', rtrim($url,'/'));
    $module = $url[0];
    $file = $url[1] ?? $file;
    $uid = $url[2] ?? null;
}
$path="modules/$module/$file.php";
if(file_exists($path)){
    include_once "header.php";
    include_once $path;
    include_once "footer.php";
}else {
redirect('404.php');
}
?>
