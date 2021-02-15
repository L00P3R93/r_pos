<?php
namespace POS\Db;

class Db{

    public static function connect(){
        try{
            $conn = mysqli_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_,_DB_NAME_) or die('Oops! Something went Wrong : '.mysqli_connect_error());
            return $conn;
        }catch (\Exception $e){
            die('Connection Failed: '. $e->getMessage());
        }
    }

    public function __construct(){
        self::connect();
    }

    public static function exec($q){
        $con = self::connect();
        return mysqli_query($con, $q) ? 1 : mysqli_error($con);
    }
    public static function execQ($q){
        $con = self::connect();
        return mysqli_query($con, $q) ? mysqli_query($con, $q) : mysqli_error($con);
    }
    public static function execS($q){
        $con = self::connect();
        return mysqli_fetch_assoc(mysqli_query($con, $q));
    }

    public static function insert($table, $fields, $values){
        $fields = implode(',', $fields);
        $values = implode("','", $values);
        $values = "'$values'";
        $q = "INSERT INTO $table ($fields) VALUES ($values)";
        return self::exec($q);
    }

    public static function update($table, $fields, $where){
        $q = "UPDATE $table SET $fields WHERE $where";
        return self::exec($q);
    }

    public static function get_value($table, $where, $name){
        $q = "SELECT $name FROM $table WHERE $where";
        return self::execS($q)[$name];
    }
    public static function getQ($table, $where, $columns='*', $group_by=null, $order_by=null, $direction='ASC', $limit=null){
        if(!is_null($group_by) and !is_null($order_by) and !is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where GROUP BY $group_by ORDER BY $order_by $direction LIMIT $limit";
        elseif (!is_null($group_by) and is_null($order_by) and is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where GROUP BY $group_by";
        elseif (is_null($group_by) and !is_null($order_by) and is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where ORDER BY $order_by $direction";
        elseif (!is_null($group_by) and !is_null($order_by) and is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where GROUP BY $group_by ORDER BY $order_by $direction";
        elseif(is_null($group_by) and !is_null($order_by) and !is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where ORDER BY $order_by $direction LIMIT $limit";
        else
            $q = "SELECT $columns FROM $table WHERE $where";
        return self::execQ($q);
    }

    public static function get($table, $where, $columns='*', $group_by=null, $order_by=null, $direction='ASC', $limit=null){
        if(!is_null($group_by) and !is_null($order_by) and !is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where GROUP BY $group_by ORDER BY $order_by $direction LIMIT $limit";
        elseif (!is_null($group_by) and is_null($order_by) and is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where GROUP BY $group_by";
        elseif (is_null($group_by) and !is_null($order_by) and is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where ORDER BY $order_by $direction";
        elseif (!is_null($group_by) and !is_null($order_by) and is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where GROUP BY $group_by ORDER BY $order_by $direction";
        elseif(is_null($group_by) and !is_null($order_by) and !is_null($limit))
            $q = "SELECT $columns FROM $table WHERE $where ORDER BY $order_by $direction LIMIT $limit";
        else
            $q = "SELECT $columns FROM $table WHERE $where";
        return self::execS($q);
    }

    public static function get_max($table, $where, $order_by, $columns='*'){
        $q = "SELECT $columns FROM $table WHERE $where ORDER BY $order_by DESC LIMIT 0, 1";
        return self::execS($q);
    }

    public static function get_max_value($table, $where, $column='uid'){
        $q = "SELECT MAX($column) AS $column FROM $table WHERE $where";
        return mysqli_num_rows(self::execQ($q)) > 0 ? self::execS($q)[$column] : 0;
    }

    public static function check_row_exists($table, $where){
        $q = "SELECT * FROM $table WHERE $where";
        $rows = mysqli_num_rows(self::execQ($q));
        return $rows > 0 ? 1 : 0;
    }

    public static function num_rows($table, $where, $columns='*'){
        $q = "SELECT $columns FROM $table WHERE $where";
        return mysqli_num_rows(self::execQ($q));
    }

    public static function sum_rows($table,$where, $column){
        $q = "SELECT SUM($column) FROM $table, WHERE $where";
        return self::execS($q)[0];
    }

    public static function log($content,$user_id){
        $fields = array('activity', 'user_id');
        $values = array("$content", "$user_id");
        return self::insert('r_activity_logs', $fields, $values);
    }

    public static function delete($table, $where){
        return self::exec("DELETE FROM $table WHERE $where");
    }
}