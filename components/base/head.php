<?php
require 'config.php';
require 'controllers/session-check.php';
$user_id = $UT::decurl($_SESSION['pos_']);
$user_group = $DB::get_value('r_staff',"uid='$user_id'","user_group");
$user_email = $DB::get_value('r_staff',"uid='$user_id'","primary_email");
$user_names = $ST->get_staff_names($_SESSION['pos_']);
$user = $ST->get_staff($user_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'components/base/meta.php' ?>
    <title>Home | POS</title>
    <?php require 'components/base/css.php'; ?>
</head>