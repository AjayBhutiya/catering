<?php
    if(Session::get('logindtl')){
        redirect('menu');
        exit;
    }
$error=null;
if(isset($_POST['username'])){
    extract($_POST);
     $username=addslashes($username);
     $password=md5($password);
     if(trim($username)){
    $sql="select id,username,password from users where username='$username' and password='$password'";
    $data = DB('users')->custom($sql,0);
    //print_r($data);
   }
 if($data && is_array($data) && $data['password']==$password){
        Session::set('logindtl',$data);
        redirect('menu');
    }
    else{
        $error= "enter valid username and pass";
    }
}else{
    $error= "enter username and pass both";
// }
}
?>
<form method="post">
    <div class="cont">
    <div class="pagetitle">
        
        Login <span>Form</span>
    </div>
    <?php if($error){ ?>
        <?=$error;?>
        <div class="alert alert-danger">
    </div>

    <?php }?>
    <div class="mb-3">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required>
    </div>
    <div class="mb-3">
        <label for="password">password:</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
    </div>
    <div class ="mb-3 text-center">
        <button class="btn btn-success">Login </button>
   </div>
</div>
</form>
 