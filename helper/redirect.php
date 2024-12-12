<?php
function redirect($path){
 $path=root.$path;
header("location:$path");
}
function mustlogin(){
    if(!Session::get('logindtl')){
        redirect('users');
        exit;
    

    }
}
?>