<?php
mustlogin();
$data = DB('menu')->all();
if(isset($_POST['del'])){
    $delid=implode(",",$_POST['del']);
    foreach($_POST['del'] as $did){
        if($pn=(DB('menu')->find($did,'picture')['picture']));
        unlink("public/image/$pn");
    }
    DB('menu')->delete($delid);
    Session::set('get',"delete successfully!");
    redirect('menu');
    exit;
}
?>
<div>
<a href="<?=root;?>menu/form" class="btn btn-primary"> Add Item</a>
</div>
<?php
echo $msg=Session::get('get');
if($msg=Session::get('get')){
    echo $msg;
    ?>
    <div class="alert alert-success text-center h3"><?=$msg;?></div>
    <?php
     Session::delete('get');
}
?>
<form method="post"> 
<table class="table table-stripted border" id="list">
    <thead class="table-dark">
        <tr>
            <th>S.NO</th>
            <th><input type="checkbox" id="all" onclick="checkdel(this)"><lable for="all">All</lable></th>
            <th>Item Name</th>
            <th> picture</th>
            <th>Category</th>
            <th>Status</th>
            <th>item Inser</th>
            <th>Item Updated</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $index = 0;
        foreach ($data as $info){?>
        <tr>
            <td><?= ++$index; ?></td>
            <td><input type="checkbox" onclick="displaybtn()" name="del[]" class="delc" value="<?=$info['id']; ?>" </td>
            <td>
            <a href="<?=root;?>menu/form/<?=$info['id'];?>" 
                title="Click for edit">
                <?= $info['item']; ?>
           </a>
            </td>
            <td>
                <?php if($info['picture']){ ?>
            <img class="rounded-circle" src="<?=root.'public/image/'.$info['picture'];?>" height="150px"> 
            <?php }
            else {
                  echo "<span class='text-muted'>N/A</span>";
            } ?>

            </td>
            <td><?=$info['category'];?></td>
            <td><?=$info['status'];?></td>
            <td><?= date('d-M-Y h:i:s A',strtotime($info['created_at']));?></td>
            <td><?= date('d-M-Y h:i:s A',strtotime($info['updated_at']));?></td>
            </tr>
        <?php } ?>
        
    </tbody>
</table>
<div id="ditem" style="display:none;">
<button class="btn btn-danger" onclick="return confirm('Do you relly want to Deleted this?')">Delete Selected Item(s)</button>
</div>
        </form>
        