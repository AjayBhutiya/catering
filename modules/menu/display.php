<?php
$ddata = DB('menu')->filter(['status'=>'yes']);

$finaldata = [];
$size = 0;
$categories =[];
foreach ($ddata as $info) {
  $cats = explode(',', $info['category']);
  if($categories){
    foreach($cats as $v){
      if(!in_array($v,$categories)){
         $categories[]=$v;
      }
    }
  }else{
    $categories = $cats;
  }
}
//print_r(($categories));
foreach($ddata as $info){
  $cats =explode(',',$info['category']);
  foreach($cats as $val){
    if(in_array($val,$categories)){
      $finaldata[$val][]=$info;
    }
  }
}

?>
<form method="post"> 
  
    <body>
  <div class="container py-5">
    <h1 class="text-center mb-5">Menu</h1>
    <div class="row">
    <?php foreach($finaldata as $category=>$data){?>
    <h1><div class="text-center mb-4"><?=$category;?>
      <?php
            $index = 0;
            foreach ($data as $info) { ?>
      <div class="col-md-4">
        <div class="product-card">
          <img src="<?=root."public/image".(($info['picture'])?$info['picture']:"notfound.jpeg");?>" alt="Product 1" class="w-100 product-image">
          <div class="product-details">
            <h2 class="product-title"><?=$info['item'];?></h2>
            <p class="product-description"><?=$info['decription'];?></p>
            <p class="product-price">$29.99</p>
            <a href="#" class="btn btn-primary w-100">Buy Now</a>
          </div>
        </div>
        
      </div>
      <?php } ?>
      <!-- Product 2 -->
      
      </div>
      <hr>
      <?php } ?>
      
    </div>
            </div>
    
  </div>
  

</body>
</html>



