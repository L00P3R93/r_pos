<?php
require '../../config.php';
if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usernameOk = $UT::input_available($username);
    $passwordOK = $UT::input_available($password);
    if($usernameOk + $passwordOK == 2){
        $email = $username;
        $user_id = $DB::get_value('r_staff',"status='1' AND primary_email='$email' OR user_name='$username'",'uid');
        if($user_id > 0){
            $salt = $DB::get_value('r_passes',"user='$user_id'", 'pass');
            $full_pass = $salt.$password;
            $enc_pass = hash('SHA256', $full_pass);
            $db_pass = $DB::get_value('r_staff', "uid='$user_id'", 'pass');
            $user_group = $DB::get_value('r_staff', "uid='$user_id'", 'user_group');
            if($enc_pass == $db_pass){
                $_SESSION['pos_'] = $UT::encurl($user_id);
                if(isset($_SESSION['pos_'])){
                    echo $UT::success("Successfully Signed In");
                }else{
                    echo $UT::error("Invalid Username/Password");
                }
            }else{
                echo $UT::error("Invalid Password");
            }
        }else{
            echo $UT::error("User not Found");
        }
    }
}else{
    echo $UT::error("Oops! Something went wrong!");
}
?>
<script>
    let proceed = "<?php echo $user_group; ?>";
    if(proceed === "2"){
        redirect("shop");
    }else{
        redirect("shop");
    }
</script>