<?php
require '../../config.php';
if($_POST){
    $category_name = $_POST['category_name'];
    $status = $_POST['status'];
    $user_id = $UT::decurl($_SESSION['pos_']);

    /**Validation*/
    $category_nameOK = $UT::input_length($category_name, 2);
    if($category_nameOK == 0)
        echo $UT::error('Category Name Needed');
    if($status > 0)
        $statusOK = 1;
    else
        echo $UT::error('Category status needed');
    $valid = $category_nameOK + $statusOK;
    if($valid == 2){
        /**Insert New Category*/
        $fields = array('category_name','status', 'user_id');
        $values = array("$category_name","$status","$user_id");
        if($DB::insert('r_categories', $fields, $values)){
            $refresh = 1;
            echo $UT::success('Category Created Successfully');
        }else{
            echo $UT::error('Error! Category not Added');
        }
    }
}else{
    echo $UT::error("Oops! Something went wrong.");
}
?>

<script>
    let refresh = "<?php  echo $refresh; ?>";
    if(refresh === "1")
        setTimeout(function () {reload()},2000);
</script>
