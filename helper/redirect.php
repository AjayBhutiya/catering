<?php
function redirect($path)
{
    $path = root.$path;
 echo <<<JS
 <script>

location.href='$path';
</script>
JS;
}
function mustlogin(){
    if(!Session::get('logindtl')){
        redirect('users');
        exit;
    

    }
}
?>
