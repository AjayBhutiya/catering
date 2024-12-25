<?php
$allitems=DB('menu')->all('id,item');
?>
    <div class="container my-5">
        <h2 class="text-center text-primary mb-4">Booking Form</h2>

        <div class="form-container">
            <!-- General Information Section -->
            <div class="form-section">
                <h5>General Information</h5>
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" id="mobile" class="form-control" placeholder="Enter your mobile number" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="purpose" class="form-label">Purpose</label>
                        <textarea id="purpose" class="form-control" rows="3" placeholder="Enter the purpose of booking"></textarea>
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
                        <select id="item" class="form-select" onchange="setPrice(this.value,'<?=root;?>',1)">
                            <option value="" selected disabled>Select an item</option>
                            <?php foreach($allitems as $item){?>
                            <option value="<?= $item['id'];?>"><?= $item['item'];?></option>
                           <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2" id="dprice1">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" id="price" class="form-control"  placeholder="Price">
                    </div>
                    <div class="col-md-2">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" id="quantity" class="form-control"   placeholder="Quantity" min="1" required>
                    </div>
                    <div class="col-md-2" >
                        <label for="after discount" class="form-label">Final Price</label>
                        <input type="text" id="after discount" class="form-control" placeholder="value after discount" >
                    </div>
                <div class="col-md-2" >
                        <label for="discount" class="form-label">Discount</label>
                        <input type="text" id="discount" class="form-control" placeholder="discount"  readonly>
                    </div>

                    <div class="col-md-2" >
                        <label for="total" class="form-label">Total</label>
                        <input type="text" id="total" class="form-control" placeholder="total" readonly>
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
    </div>
    <script>
        function setPrice(id,root,elno){
            $.ajax({
               url: root + "menu/loaditem",
               type: "get",
               data: "id=" + id,
               success: function(r) {
                document.getElementById('dprice' + elno).innerHTML = r;
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

        })
        x.id = "childiv"+ totnode.value;
        parentdiv.appendChild(x);

        }
    </script>