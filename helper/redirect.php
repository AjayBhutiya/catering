<?php
function redirect($path){
 $path=root.$path;
header("location:$path");
}
?>