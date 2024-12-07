<?php
//require_once "helper/DB.php";
// print_r($_POST);
$obj = DB('menu');
if($uid){
   $info= $obj->find($uid);
   
}
if(isset($_POST['item'])){
    $info=[
        'item'=>$_POST['item'],
        'decription'=>$_POST['decription'],
        'category'=>implode(',',$_POST['category']),
        'status'=>$_POST['status']

    ];
    // $_POST['category']=implode(',',$_POST['category']);
    if($obj->save($info,$uid)){
    redirect("menu");
}else{
      echo "something went wrong!";
}
}
?>
<div class ="alert alert-primary h3 text-center">
    Item  <?=$uid?"Edit":'Add'?> Form</div>
<form method="post">
    <div class ="mb-3">
    <lable for="item"> Item Name</lable>
    <input type="text" class="form-control" placeholder="Enter item name" required name="item" id="item" value="<?=$info['item']?>">
</div>

    <div class ="mb-3">
    <lable for="decription">decription</lable>
    <textarea class="form-control" rows="10" placeholder="decription" required name="decription" id="decription"> <?=$info['decription']??''?></textarea>
</div>

    <div class="mb-3">
    <label>Select category<small>(press control for select multiple)</small></label>
    <?php $cats=explode(',',$info['category']);?>
    <select name="category[]" class="form-select" multiple>
        <option value="Starter" <?=(in_array('Starter',$cats))? 'selected':'';?>>Starter</option>
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
        <option value="no" <?=($info['status']=='no')? 'selected':'';?>>No</option>
</select>

</div>
<div class ="mb-3 text-center">
    <button class="btn-success">  <?=$uid?"update":'save'?></button>
</div>

