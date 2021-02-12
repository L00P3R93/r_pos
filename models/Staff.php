<?php

namespace POS\Staff;

use POS\Db\Db;
use POS\Util\Util;

class Staff{
    protected $con;
    protected $table = 'r_staff';
    public $id;
    public $staff_details;
    public function __construct($id=null){
        if($id){
            $this->id=$id;
            $this->staff_details = $this->get_staff($id);
        }
    }
    public function get_staff($id){
        return Db::get($this->table,"uid='$id'");
    }
    public function get_staff_names($enc_id){
        $id = Util::decurl($enc_id);
        $d = Db::get($this->table, "uid='$id'");
        return $d['first_name'].' '.$d['last_name'];
    }
    public function get_username($id){
        return Db::get_value($this->table, "uid='$id'", 'user_name');
    }
    public function get_staff_status($id){
        return Db::get_value($this->table, "uid='$id'", 'status');
    }
    public function get_user_group($id){
        return Db::get_value($this->table, "uid='$id'", 'user_group');
    }
    public function group_permission_check($group, $module, $action){
        $gp = Db::get('s_group_permissions', "user_group='$group' AND permission_name='$module'");
        $view = $gp['p_view']; $add = $gp['p_add'];
        $edit = $gp['p_edit']; $delete = $gp['p_del'];
        switch($action){
            case 'view':
                return $view;
                break;
            case 'add':
                return $add;
                break;
            case 'edit':
                return $edit;
                break;
            case 'delete':
                return $delete;
                break;
            default:
                return 0;
                break;
        }
    }
    public function user_permission_check($user, $module, $action){
        $group = self::get_user_group($user);
        return self::group_permission_check($group, $module, $action);
    }

}