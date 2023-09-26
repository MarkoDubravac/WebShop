<?php

namespace database;

use http\Params;

class Cart
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    public function insertIntoCart($params = null, $table = "cart") {
        if($this->db->con != null) {
            if($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));

                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)",$table, $columns, $values);

                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    public function addToCart($userId, $itemId) {
        if(isset($userId) && isset($itemId)) {
            $params = array(
                "user_id"=>$userId,
                "item_id"=>$itemId
            );

            $result = $this->insertIntoCart($params);

            if ($result) {
                //reload
                header("Location: " . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
            }
        }
    }

    public function getSum($arr) {
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    public function deleteCart($itemId = null, $table = 'cart') {
        if ($itemId != null) {
            $result = $this->db->con->query("DELETE FROM $table WHERE item_id = $itemId");
            if ($result) {
                header("Location: " . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    public function getCartId($cartArray = null, $key = "item_id") {
        if($cartArray != null) {
            $cart_id = array_map(function ($value) use($key) {
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
        if ($item_id != null){
            $query = "INSERT INTO $saveTable SELECT * FROM $fromTable WHERE item_id=$item_id;";
            $query .= "DELETE FROM $fromTable WHERE item_id=$item_id;";

            // execute multiple query
            $result = $this->db->con->multi_query($query);

            if($result){
                header("Location: " . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

}