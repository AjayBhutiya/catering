<?php
$allitems=DB('menu')->all('id,item');

if(isset($_POST['name'])){
    $custdata =[
        'name'=>$_POST['name'],
        'mobile'=>$_POST['mobile'],
        'purpose'=>$_POST['purpose'],
        'place'=>$_POST['place'],
        'dateofevent'=>$_POST['dateofevent'],
    ];
    $cid = DB('customer')->save($custdata);
    if($cid>0){
        $obj=DB('slip');
        $count =( $_POST['itemname']);
      for($i=0;$i<$count;$i++){
             $slipinfo=[
                'customer_id'=>$cid,
                'item'=> $_POST['itemname'][$i],
                'qty'=> $_POST['qty'][$i],
                'price_per_unit'=> $_POST['price_per_unit'][$i],
                'discount_per_unit'=> $_POST['discount_per_unit'][$i],
                'after_discount_price_per_unit'=> $_POST['after_discount_price_per_unit'][$i],
                'total'=> $_POST['total'][$i],
             ];
            $obj->save($slipinfo);
        }
    }
}
?>
    <div class="container my-5">
        <h2 class="text-center text-primary mb-4">Booking Form</h2>
         <form method="post">
        <div class="form-container">
            <!-- General Information Section -->
            <div class="form-section">
                <h5>General Information</h5>
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name"  name="name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dateofevent" class="form-label">Date of Event</label>
                            <input type="date" id="nadateofeventme"  name="dateofevent" class="form-control" placeholder="Enter Event Date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="place" class="form-label">place</label>
                            <input type="teplacext" id="place" name="place" class="form-control" placeholder="Enter Event Place" required>
                        </div>
                    <div class="mb-3">
                        <label for="purpose" class="form-label">Purpose</label>
                        <textarea id="purpose" name="purpose" class="form-control" rows="3" placeholder="Enter the purpose of booking"></textarea>
                    </div>
                </form>
            </div>

            <!-- Item Details Section -->
            <div id="parentdiv">
            <div class="form-section" id="childdiv1">
                <h5>Item Details</h5>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="item" class="form-label">Select Item</label>
                        <select id="item" name="item[]" class="form-select" onchange="setPrice(this.value,'<?=root;?>',1)">
                            <option value="" selected disabled>Select an item</option>
                            <?php foreach($allitems as $item){?>
                            <option value="<?= $item['id'];?>"><?= $item['item'];?></option>
                           <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2" id="dprice1">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" id="price1" name="price_per_unit[]" class="form-control"  placeholder="Price">
                    </div>
                    <div class="col-md-2">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" id="quantity1" name="qty[]" onkeyup="calprice(this)" class="form-control"   placeholder="Quantity" min="1" onchange="calprice(this)" 
                        required>
                    </div>
                    <div class="col-md-2" >
                        <label for="after discount" class="form-label">Final Price</label>
                        <input type="text" id="afterdiscount1" name="after_discount_price_per_unit[]" class="form-control" onkeyup="calprice(this)" 
                        onchange="calprice(this)" placeholder="value after discount" >
                    </div>
                <div class="col-md-2" >
                        <label for="discount" class="form-label">Discount</label>
                        <input type="text" id="discount1"  name="discount_per_unit[]" class="form-control" placeholder="discount"  readonly>
                    </div>

                    <div class="col-md-2" >
                        <label for="total" class="form-label">Total</label>
                        <input type="text" id="total1"  name="total[]" 	class="form-control" placeholder="total" readonly>
                    </div>
                    </div>
              </div>
                </div>
                <div>
                                <input type="hidden" id="totnode" >
                                <button type="button" class="btn btn-success" onclick="creatNodess('<?= root; ?>')">New</button>
                            </div>
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-success" >Submit Booking</button>
            </div>
        </div>
                            </form>
    </div>
    <script>
        function setPrice(set,root,elno){
            let id = sel.value;
            $.ajax({
               url: root + "menu/loaditem",
               type: "get",
               data: "id=" + id + "&eleno=" +elno,
               success: function(r) {
                document.getElementById('dprice' + elno).innerHTML = r;
                let topnode = sel.parentNode.parentNode.parentNode;
                topnode.children[0].children[3].children[1].value = topnode.children[0].children[1].children[1].children[0].value;
                
                calprice(sel);
               },
               error: function(e){
                alert("error");
               }
            });
        }
        function createNodess(){
            totnode.value = Number(totnode.value) +1 ;
        const x = childdiv1.cloneNode(true);
        x.children[0].children[1].id = "dprice" + totnode.value;
        let sel = x.children[0].children[0].children[1];
        sel.removeAttribute('onchange','');

        sel.addEventListener('change', () => {
            setPrice(sel, root, totnode.value);

        })
        x.id = "childdiv"+ totnode.value;
        x.children[0].children[1].children[1].children[0].value = "";
        x.children[0].children[2].children[1].value = "";
        x.children[0].children[3.children[1].value = "";
        x.children[0].children[4].children[1].value = "";
        x.children[0].children[5].children[1].value = "";
        parentdiv.appendChild(x);


        }
        function calprice(obj){
            let topnode = obj.parentNode.parentNode.parentNode;
            let item = topnode.children[0].children[0].children[1];
            let price = topnode.children[0].children[1].children[1].children[0];
            let qty = topnode.children[0].children[2].children[1];
            let fp = topnode.children[0].children[3].children[1];
            let dis = topnode.children[0].children[4].children[1];
            let tot = topnode.children[0].children[5].children[1];
            console.log(price);

            if(price.value){
                if(qty.value && fp.value) {
                    dis.value = price.value-fp.value;
                    tot.value =qty.value * fp.value;
                }
            }else{
                qty.value = fp.value = "";
                alert("first select item");
                item.focus();
            }


    

        }
    </script>