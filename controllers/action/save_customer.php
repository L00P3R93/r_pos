<?php
require '../../config.php';
if($_POST){
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $section = $_POST['section'];
    $status = $_POST['status'];
    $user_id = $UT::decurl($_SESSION['pos_']);

    /**Validate First Name*/
    $first_nameOK = $UT::input_length($first_name, 2);
    if($first_nameOK == 0)
        echo $UT::error("First name needed");

    /**Validate Last Name*/
    $last_nameOK = $UT::input_length($last_name, 2);
    if($last_nameOK == 0)
        echo $UT::error("Last name needed");
    /**Validate Email*/
    $emailOK = $UT::validate_email($email);
    if($emailOK == 0)
        echo $UT::error("Invalid Email");
    /**Validate Phone*/
    $phoneOK = $UT::validate_phone($phone);
    if($phoneOK == 0)
        echo $UT::error("Invalid Phone");

    /**Validate User section*/
    if($section > 0)
        $sectionOK = 1;
    else
        echo $UT::error("Select User Section");
    /**Validate User Status*/
    if($status > 0)
        $statusOK = 1;
    else
        echo $UT::error("Select User Status");
    $valid = array_sum(array($first_nameOK, $last_nameOK, $emailOK, $phoneOK, $statusOK, $sectionOK));
    if($valid == 6){
        $fields = array('user_id','section_id','first_name','second_name','last_name', 'phone', 'email', 'status');
        $values = array("$user_id","$section","$first_name","$second_name","$last_name","$phone","$email","$status");
        if($DB::insert('r_customers', $fields, $values)){
            echo $UT::success("Customer Added Successfully");
        }else{
            echo $UT::error("Error Creating Customer");
        }
    }
}else{
    echo $UT::error("Oops! Something went wrong!");
}