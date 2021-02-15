<?php
namespace POS\Product;
use POS\Db\Db;

class Product{

    public function get_product_details($item_id=null, $item_sku=null){
        return Db::get('r_items', "uid='$item_id' OR item_sku='$item_sku'");
    }

    public function search_products($keyword){

    }
}