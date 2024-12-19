<?php
mustlogin();
require_once "helper/DB.php";
// print_r($_POST);
$obj = DB('menu');
if($uid){
   $info= $obj->find($uid);
   $picture=$info['picture'];
}
if(isset($_POST['item'])){
    $valid=1;
    if($_FILES['picture']['error']==0){
     if('image'==substr($_FILES['picture']['type'],0,strpos($_FILES['picture']['type'],'/'))){
       if(isset($picture))
       unlink("public/image/$picture");
        $picture=time()."_Axixa_". $_FILES['picture']['name'];
           move_uploaded_file($_FILES['picture']['tmp_name'],'public./image'.$picture);
     }
     else{
            $valid =0;
            $err=  "file type not image type";
     }
    
    }
    if($valid){
    $info=[
        'item'=>$_POST['item'],
        'decription'=>$_POST['decription'],
        'category'=>implode(',',$_POST['category']),
        'status'=>$_POST['status'],
        'picture'=>$picture

    ];
    // $_POST['category']=implode(',',$_POST['category']);
    if($obj->save($info,$uid)){
       Session::set('get',"Data ". ($uid?"Update":"Saved")." Sucessfully");
    redirect("menu");
}else{
      $err= "something went wrong!";
}
    }
}
?>
<div class ="alert alert-primary h3 text-center">
    Item  <?=$uid?"Edit":'Add'?> Form</div>
    <?php
    if(isset($err)){
        ?>
        <div class="alert alert-danger"><?=$err?></div>
        <?php
    }
    ?>
<form method="post" enctype="multipart/form-data">
    <div class ="mb-3">
    <lable for="item"> Item Name</lable>
    <input type="text" class="form-control" placeholder="Enter item name" required name="item" id="item" value="<?=$info['item']??""?>">
</div>

    

    <div class="mb-3">
    <label>Select category<small>(press control for select multiple)</small></label>
    <?php $cats=explode(',',$info['category']??"");?>
    <select name="category[]" class="form-select" multiple>
        <option value="Starter" <?=(in_array('Starter',$cats))? 'selected':'';?>>Starters</option>
        <option value="main cource" <?=(in_array('main cource',$cats))? 'selected':'';?>>Main cource</option>
        <option value="fast food" <?=(in_array('fast food',$cats))? 'selected':'';?>>Fast food</option>
        <option value="deserts" <?=(in_array('deserts',$cats))? 'selected':'';?>>Deserts</option>
        <option value="sweets" <?=(in_array('sweets',$cats))? 'selected':'';?>>Sweets</option>
</select>
</div>
<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-select">
        <option value="yes">Yes</option>
        <option value="no" <?=(isset($info['status'])&&$info['status']=='no')? 'selected':'';?>>No</option>
</select>

</div>
<?php

if ($picture) {
    ?>
    <div class="mb-3">
    <label for ="pic">Upload picture</label>
    <div class="form-control">
<img src="<?=root.'public/image/'.$picture;?>" height="150px">    
</div>

</div>
    <?php
}
?>
<div class="mb-3">
    <label for ="pic">Upload picture</label>
    <input type="file" class="form-control form-control-sm" accept="image/*" name="picture" id ="pic">
    

</div>
<div class ="mb-3">
    <lable for="decription">decription</lable>
    <textarea class="form-control" rows="5" placeholder="decription" required name="decription" id="decription"> <?=$info['decription']??''?></textarea>
</div>
<div class ="mb-3 text-center">
    <button class="btn-success">  <?=$uid?"update":'save'?></button>
</div>

