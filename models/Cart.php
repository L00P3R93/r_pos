<?php

namespace POS\Cart;
use POS\Db\Db;
use POS\Util\Util;

class Cart{
    private $db;
    public $cart_count = 0;
    public $cart_total = 0;

    public function __construct(){
        $this->db = new Db();
        if(!empty($_SESSION["cart_item"]) and is_array($_SESSION["cart_item"])){
            $this->cart_count = count($_SESSION["cart_item"]);
            foreach($_SESSION["cart_item"] as $item){
                $this->cart_total += ($item["item_price"] * $item["quantity"]);
            }
        }
    }

    public function add_to_cart(){
        $item = $this->db::get("r_items","uid='$_POST[product_id]'");
        $item_array = array(
            $item['uid'] => array(
                "item_id"=>$item['uid'],
                "item_name"=>$item["item_name"],
                "item_sku" =>$item['item_sku'],
                "quantity"=>1,
                'item_price'=>$item['item_price'],
                "item_image"=>$item["item_image"]
            )
        );

        if(!empty($_SESSION["cart_item"])){
            if(Util::in_array_r($_POST['product_id'], $_SESSION["cart_item"])){
                foreach($_SESSION["cart_item"] as $k => $v){
                    if($_POST['product_id'] === $v["item_id"])
                        $_SESSION["cart_item"][$k]["quantity"] += 1;
                }
            }else{
                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $item_array);
            }
        }else{
            $_SESSION["cart_item"] = $item_array;
        }

        if(!empty($_SESSION["cart_item"]) and is_array($_SESSION["cart_item"])){
            $this->cart_count = count($_SESSION["cart_item"]);
            $this->cart_total = 0;
            foreach($_SESSION["cart_item"] as $item){
                $this->cart_total += ($item["item_price"] * $item["quantity"]);
            }
        }
    }

    public function minus_from_cart(){
        if(!empty($_SESSION["cart_item"])){
            foreach($_SESSION["cart_item"] as $k=>$v){
                if($_POST["product_id"] == $v["item_id"]){
                    $_SESSION["cart_item"][$k]["quantity"] -= 1;
                    if($_SESSION["cart_item"][$k]["quantity"] <= 0){
                        unset($_SESSION["cart_item"][$k]);
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                    }
                }
            }
        }

        if(!empty($_SESSION["cart_item"]) and is_array($_SESSION["cart_item"])){
            $this->cart_count = count($_SESSION["cart_item"]);
            $this->cart_total = 0;
            if($this->cart_count > 0){
                foreach($_SESSION["cart_item"] as $item){
                    $this->cart_total += ($item["item_price"] * $item["quantity"]);
                }
            }
        }else{
            $this->cart_count = 0;
            $this->cart_total = 0;
        }
    }

    public function edit_cart(){
        $total_price = 0;
        if(!empty($_SESSION["cart_item"])){
            foreach($_SESSION["cart_item"] as $k=>$v){
                if($_POST["product_id"] == $k)
                    $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
                $total_price += $_SESSION["cart_item"][$k]["price"] * $_SESSION["cart_item"][$k]["quantity"];
            }
        }

        if(!empty($_SESSION["cart_item"]) and is_array($_SESSION["cart_item"]))
            $this->cart_count = count($_SESSION["cart_item"]);

        return $total_price;
    }

    public function remove_from_cart(){
        if(!empty($_SESSION["cart_item"])){
            foreach ($_SESSION["cart_item"] as $k=>$v){
                if($_POST["product_id"] == $v["item_id"]){
                    unset($_SESSION["cart_item"][$k]);
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
        }
        if(!empty($_SESSION["cart_item"]) and is_array($_SESSION["cart_item"])) {
            $this->cart_count = count($_SESSION["cart_item"]);
            $this->cart_total = 0;
            if($this->cart_count > 0){
                foreach($_SESSION["cart_item"] as $item){
                    $this->cart_total += ($item["item_price"] * $item["quantity"]);
                }
            }
        }else{
            $this->cart_count = 0;
            $this->cart_total = 0;
        }

    }

    public function empty_cart(){
        unset($_SESSION["cart_item"]);
        unset($_SESSION["cart_customer"]);
        $this->cart_count = 0;
        $this->cart_total = 0;
    }

    public function add_customer_to_cart(){
        $customer = $this->db::get('r_customers',"uid='$_POST[customer_id]'");
        $customer_array = array(
            $customer["uid"] => array(
                "customer_id"=>$customer['uid'],
                "customer_name"=>"$customer[first_name] $customer[second_name] $customer[last_name]",
                "customer_phone"=>$customer["phone"]
            )
        );
        if(!empty($_SESSION["cart_customer"])){
            if(Util::in_array_r($_POST['customer_id'], $_SESSION["cart_customer"])){
                foreach($_SESSION["cart_customer"] as $k => $v){
                    if($_POST['customer_id'] === $v["customer_id"]){continue;}
                }
            }else{
                $_SESSION["cart_customer"]= array_merge($_SESSION["cart_customer"], $customer_array);
            }
        }else{
            $_SESSION["cart_customer"] = $customer_array;
        }
    }

    public function remove_customer_from_cart(){
        if(!empty($_SESSION["cart_customer"])){
            foreach ($_SESSION["cart_customer"] as $k=>$v){
                if($_POST["customer_id"] == $v["customer_id"]){
                    unset($_SESSION["cart_customer"][$k]);
                    if(empty($_SESSION["cart_customer"]))
                        unset($_SESSION["cart_customer"]);
                }
            }
        }
    }

}