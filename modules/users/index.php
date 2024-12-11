<?php
if(isset($_POST['username'])){
    extract($_POST);
    $username=addslashes($username);
    $password=md5($password);
    if(trim($username)){
    $sql="select id,username,password from users where username='$username'";
    $data = DB('users')->custom($sql,0);
    if($data && is_array($data) && $data['password']--$password){
        echo "login success";
    }
    else{
        echo "enter valid username and pass";
    }
}else{
    echo "enter username"
}
}
?>
<form method="post">
    <div class="cont">
    <div class="pagetitle">
        
        Login <span>Form</span>
    </div>
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
