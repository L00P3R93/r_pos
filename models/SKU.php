<?php
namespace POS\SKU;
class SKU{
    public static function generate($item_id, array $variants, array $disallow){
        $permutations = self::permute($variants);
        $filtered = self::filter($permutations, $disallow);
        $skus = self::sku($item_id, $filtered);
        return $skus;
    }
    public static function permute(array $variants){
        $input = array_filter($variants);
        $result = array(array());
        foreach($input as $key=>$values){
            $append = array();
            foreach ($result as $product){
                foreach($values as $item){
                    $product[$key] = $item;
                    $append[] = $product;
                }
            }
            $result = $append;
        }
        return $result;
    }
    public static function filter(array $permutations, array $rules){
        foreach ($permutations as $per=>$values){
            $valid = true;
            $test = array();
            foreach($values as $id=>$val){
                $test[$id] = $val[0];
            }
            foreach ($rules as $rule){
                if(count(array_diff($rule, $test)) <= 0)
                    $valid = false;
            }
            if(!$valid)
                unset($permutations[$per]);
        }
        return $permutations;
    }

    public static function sku($item_id, array $variants){
        $skus = array();
        foreach($variants as $variant){
            $ids = array();
            foreach($variant as $vals){
                $ids[] = $vals[0];
            }
            $skus[$item_id.'-'.implode('-',$ids)] = $variant;
        }
        return $skus;
    }
}