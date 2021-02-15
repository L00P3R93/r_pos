<?php
require '../../config.php';
    if($_POST){
        $keyword = $_POST["search"];
        $q = "SELECT * FROM r_items WHERE item_name LIKE '%$keyword%' OR item_sku LIKE '%$keyword%' OR item_description LIKE '%$keyword%'";
        $search_query = $DB::execQ($q);
        if(mysqli_num_rows($search_query) > 0){
            while($s = mysqli_fetch_assoc($search_query)){ ?>
                <li class="search-result ">
                    <a class="clearfix float-my-children" target="_blank" href="http://localhost/pos/<?php echo $UT::encurl($s["uid"]); ?>">
                        <img src="uploads/products/<?php echo $s["item_image"] ?>" width="70" height="50">
                        <div><strong><?php echo $s["item_name"] ?></strong></div><br />
                        <div><?php echo "Kes. ".number_format($s["item_price"], 2) ?></div>
                        <div></div>
                    </a>
                </li>
<?php       }
        }else{
            echo "<li class='search-result'><a>No Result ...</a></li>";
        }
    }
?>