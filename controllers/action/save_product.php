<?php
    require '../../config.php';
    if($_POST){
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $item_description = $_POST['item_description'];
        $item_category = $_POST['item_category'];
        $status = $_POST['status'];
        $user_id = $UT::decurl($_SESSION['pos_']);

        $image_name = $_FILES['item_image']['name'];
        $image_size = $_FILES['item_image']['size'];
        $image_tmp = $_FILES['item_image']['tmp_name'];

        /*Section Item Quantitites*/
        $sections = $DB::getQ('r_user_sections',"status=1");


        $allowed_formats = array('jpg','jpeg','png');

        $item_nameOK = $UT::input_length($item_name, 2);
        if($item_nameOK == 0)
            echo $UT::error("Product Name required");
        if($item_price >= 0)
            $item_priceOK = 1;
        else
            echo $UT::error("Invalid Product Price");
        if($item_category>0)
            $item_categoryOK = 1;
        else
            $UT::error("Product Category Required");
        if($status > 0)
            $statusOK = 1;
        else
            $UT::error("Product Status Required");

        $formatOK = $UT::file_type($image_name, $allowed_formats);
        if($formatOK == 0)
            echo $UT::error('Invalid File Format');
        $valid = array_sum(array($item_nameOK, $item_priceOK, $item_categoryOK, $statusOK, $formatOK));
        if($valid==5){
            $upload = $UT::upload_file($image_name, $image_tmp, '../../uploads/products/');
            if($upload===0){echo $UT::error("Error Uploading File $image_name, $image_tmp, $upload");}
            else{
                $fields = array('category_id','user_id','item_name','item_price','item_description','item_image','status');
                $values = array("$item_category","$user_id","$item_name","$item_price","$item_description","$upload","$status");
                if($DB::insert('r_items',$fields, $values)){
                    $item_id = $DB::get_value('r_items',"item_image='$upload'", "uid");
                    $category_name = $DB::get_value('r_categories', "uid='$item_category'","category_name");
                    $sku_prefix = $DB::get_value('r_categories', "uid='$item_category'","sku_prefix");
                    // Possible variants
                    $variants = array(
                        'brand' => array(
                            // the first value in our array is our SKU identifier, this will be used to create our unqiue SKU code
                            // the second value is a nice name, description if you will
                            array(strtoupper($sku_prefix), $UT::uni_name($category_name)),
                            /*array('BA', 'Banana'),
                            array('PE', 'Pear'),*/
                        )/*,
                        'color' => array(
                            array('RE', 'Red'),
                            array('GR', 'Green'),
                            array('BL', 'Blue'),
                        ),*/
                    );
                    // Rules for combinations I dont want
                    $disallow = array(
                        /*array('brand' => 'AP', 'color' => 'GR'), // No green apples
                        array('brand' => 'AP', 'color' => 'RE'), // No red apples
                        array('brand' => 'PE', 'color' => 'BL'), // No blue pears*/
                    );
                    $skus = $SKU::generate($item_id, $variants, $disallow);
                    $item_sku = array_keys($skus)[0];
                    if(!empty($item_sku) and isset($item_sku)){
                        $update = $DB::update('r_items',"item_sku='$item_sku'","uid='$item_id'");
                        while($s = mysqli_fetch_assoc($sections)){
                            $quantity = $_POST[$s["section_name"]];
                            $flds = array('item_id','section_id','quantity');
                            $vls = array("$item_id","$s[uid]","$quantity");
                            $insert_qty = $DB::insert('r_section_quantity',$flds,$vls);
                        }
                        if($update){
                            $refresh = 1;
                            echo $UT::success("Item Created with SKU: $item_sku");
                        }else{
                            echo $UT::error("Error Creating Item SKU. Manually Set Item SKU");
                        }
                    }else{
                        echo $UT::error("Error Generating Item SKU");
                    }
                }else{
                    echo $UT::error('Error Creating Item');
                }
            }

        }
    }else{
        echo $UT::error("Oops! Something went wrong");
    }

?>

<script>
    let refresh = "<?php echo $refresh ?>";
    if(refresh === "1")
        setTimeout(function(){reload()},2000);

</script>
