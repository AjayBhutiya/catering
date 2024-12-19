<?php
    if(Session::get('logindtl')){
        redirect('menu');
        exit;
    }
$error=null;
if(!isset($_POST['username'])){
    if(Session::get('attempt') && Session::get('attempt') ==BNO){
       // echo "hello daku";
       // print_r($COOKIE);
        if(!isset($COOKIE['isblock'])){
            Session::delete('attempt');
            Session::delete('blockerror');
        }
    }
    ?>
    <?php
}
    if(isset($_POST['username'])){
      //  echo Session::get('attempt');
    if((Session::get('attempt') ?? 0)< BNO){
    
    extract($_POST);
     $username=addslashes($username);
     $password=($password);
     
     if(trim($username)){
    $sql="select id,username,password from users where username='$username'";
    $data = DB('users')->custom($sql,0);
    
    //print_r($data);
   
 if($data && is_array($data) && $data['password'] == $password){
        Session::set('logindtl', $data);
        redirect('menu');
    } else{
        Session::set('attempt', (Session::get('attempt') ? (Session::get('attempt') + 1) : 1));
        $error= "enter valid username and pass";
    }
}

    
// else{
//     $error= "enter username and pass both";
//  }
}else{
   // echo "hello j";
    if(!isset($_COOKIE['isblock'])){
        $tval= time()+10;
        setcookie('isblock',$tval - 1, $tval);
    }
    Session::set('blockerror',"You are Blocked");
   // $counter=TIME;
    echo <<<JS
             <script>
            let i = 10;

            setInterval(() => {
                if (i == 0)
                    location.href = location.href;
                timer.innerHTML = `00:`+i;
                i--;
            }, 1000);
          </script>
        JS;

}
}
//echo Session::get('attempt');




?>

    
    
<form method="post">
    <div class="cont">
    <div class="pagetitle">
        
        Login <span>Form</span>
    </div>
    <?php if ($error or Session::get('blockerror')) { ?>
        
        <div class="alert alert-danger"><?=$error;?>
        <?= Session::get('blockerror') ?> <span id="timer"></span>
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
    