<?php
mustlogin();
$data = DB('menu')->all();
?>

<form method="post"> 
<table class="table table-stripted border" id="list">
    <thead class="table-dark">
        <tr>
            <th>S.NO</th>
            <th>Item Name</th>
            <th>Category</th>
            <th>decription</th>

        </tr>
    </thead>
    <tbody>
        <?php 
        $index = 0;
        foreach ($data as $info){?>
        <tr>
            <td><?= ++$index; ?></td>
            
                <?= $info['item']; ?>
            </td>
            <td><?=$info['category'];?></td>
            <td><?=$info['decription'];?></td>
           
            </tr>
        <?php } ?>
        
    </tbody>
</table>
<div id="ditem" style="display:none;">
<button class="btn btn-danger" onclick="return confirm('Do you relly want to Deleted this?')">Delete Selected Item(s)</button>
</div>
        </form>
        