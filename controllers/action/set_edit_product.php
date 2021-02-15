<?php
require '../../config.php';
if($_POST){
    $item_id = $UT::decurl($_POST["product_id"]);
    $product = $DB::get('r_items',"uid='$item_id'");
    $section_qty = $DB::getQ('r_section_quantity',"item_id='$item_id'");
    ?>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return update_product(this);">
    <div class="form-horizontal product-form">
        <div class="form-group row">
            <label for="item_name" class="col-sm-4 col-form-label">Item Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" value="<?php echo $product["item_name"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="item_price" class="col-sm-4 col-form-label">Item Price</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="item_price" name="item_price" placeholder="Item Price" value="<?php echo number_format($product["item_price"],2) ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="item_description" class="col-sm-4 col-form-label">Item Description</label>
            <div class="col-sm-8">
                <textarea class="form-control" id="item_description" name="item_description" rows="3" placeholder="Item Description"><?php echo $product["item_description"] ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="item_category" class="col-sm-4 col-form-label">Item Category</label>
            <div class="col-sm-8">
                <select class="form-control" id="item_category" name="item_category">
                    <option>-- Select Category --</option>
                    <?php
                    $category = $DB::getQ('r_categories',"status=1");
                    while($c = mysqli_fetch_assoc($category)){
                        $name = $UT::uni_name($c["category_name"]); ?>
                        <option <?php echo $UT::selected($product["category_id"],  $c["uid"], "selected") ?>  value='<?php echo $c["uid"] ?>'><?php echo $name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label">Status</label>
            <div class="col-sm-8">
                <select class="form-control" id="status" name="status">
                    <option>-- Select Status --</option>
                    <option <?php echo $UT::selected($product["status"], "1", "selected") ?> value="1">In-Stock</option>
                    <option <?php echo $UT::selected($product["status"], "2", "selected") ?> value="2">Out-Of-Stock</option>
                    <option <?php echo $UT::selected($product["status"], "3", "selected") ?> value="3">In-Active</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="user_name" class="col-sm-4 col-form-label">Item Image</label>
            <div class="col-sm-8">
                <input type="file" class="form-control bg-gradient-navy" id="item_image" name="item_image"/>
                <div class="row">
                    <div class="col-sm-6">
                        <div id="preview" class="preview_image card m-t-3" style="display: none">
                            <img class="item_preview" src="#" alt=""/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div id="current" class="current_image card m-t-3">
                            <img class="item_current_img" src="uploads/products/<?php echo $product['item_image'] ?>" alt=""/>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <hr />
        <?php
        while($c = mysqli_fetch_assoc($section_qty)){ ?>
            <div class="form-group row">
                <label for="status" class="col-sm-4 col-form-label"><?php echo $DB::get_value('r_user_sections',"uid='$c[section_id]'","section_name") ?> Quantity</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="<?php $DB::get_value('r_user_sections',"uid='$c[section_id]'","section_name") ?>" name="<?php echo $DB::get_value('r_user_sections',"uid='$c[section_id]'","section_name") ?>" value="<?php echo $c["quantity"] ?>" required>
                </div>
            </div>
        <?php    } ?>
        <hr />
        <input type="hidden" id="item_id" name="item_id" value="<?php echo $product["uid"]; ?>"/>
        <div class="processing"></div>
        <div class="feedback_area"></div>
    </div>
<?php
}
?>

<script>

    $("#item_image").on('change', function(){
        if(this.files && this.files[0]){
            reader.readAsDataURL(this.files[0]);
        }
        reader.onload = (e) => {
            $(".item_preview").attr('src', e.target.result);
            console.log(e.target.result);
        }
        $('#preview').attr('style','');
    })
</script>
