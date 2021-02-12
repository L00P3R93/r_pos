<?php
require '../../config.php';

if($_POST){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_name = $_POST['user_name'];
    $user_group = $_POST['user_group'];
    $section = $_POST['section'];
    $status = $_POST['status'];
    $sid = isset($_POST['sid']) and !empty($_POST['sid']) ? $_POST['sid'] : 0;

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
    /**Validate Username*/
    $user_nameOK = $UT::input_length($user_name, 5);
    if($user_nameOK == 0)
        echo $UT::error("Username is too short");
    /**Validate User Group*/
    if($user_group > 0)
        $user_groupOK = 1;
    else
        echo $UT::error("Select User Group");
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

    $valid = array_sum(array($first_nameOK, $last_nameOK, $emailOK, $phoneOK, $user_groupOK, $statusOK, $user_nameOK, $sectionOK));
    if($valid == 8){
        if($sid > 0){
            /**Update*/
            $update_string = "first_name='$first_name', last_name='$last_name', primary_email='$email',primary_phone='$phone',user_group='$user_group', section='$section',status='$status'";
            if($DB::update('r_staff', $update_string, "uid='$sid'")){
                echo $UT::success("User Updated");
                $proceed = 1;
            }else{
                echo $UT::error("Oops! Update Error");
            }
        }else{
            /**Create*/
            $email_exists = $DB::check_row_exists('r_staff', "primary_email='$email'");
            if($email_exists > 0){
                echo $UT::error('Email Already Exists');
            }else{
                $password = $user_name;
                $enc_pass = $UT::passencrypt($password);
                $hash = substr($enc_pass, 0, 64);
                $salt = substr($enc_pass, 64, 96);
                $fields = array('first_name', 'last_name', 'primary_email', 'primary_phone', 'user_name', 'pass', 'added_date', 'added_by', 'user_group', 'section', 'status');
                $values = array("$first_name","$last_name","$email","$phone","$user_name","$hash",FULL_DATE, "1","$user_group", "$section", "$status");
                $create = $DB::insert('r_staff', $fields,$values);
                if($create){
                    echo $UT::success('User added successfully');
                    $user_id = $DB::get_value('r_staff', "primary_email='$email'","uid");
                    $proceed = 1;
                    $fields_ = array('user', 'pass'); $values_ = array("$user_id", "$salt");
                    if($DB::insert('r_passes', $fields_, $values_)){
                        echo $UT::success('Account Created. Check Email For Login Details');
                        /**Send Email with Credentials*/
                        $to = $email;
                        $from = ADMIN_MAIL;
                        $subject = "SHOPE USER ACCOUNT CREDENTIALS";

                        /**HTML Content-type header*/
                        $headers = "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";

                        /**Email Headers*/
                        $headers .= "From: $from\r\nno-Reply-To: $from\r\n";

                        /**HTML email message body*/
                        $message = "<html>
                                        <body>
                                            <h3>Hello $first_name $last_name,</h3><br />
                                            <p>Your User Account for the ShopE POS has been created successfully.</p>
                                            <br/>
                                            <p>A default password has been created, use it to Sign in thereafter change it to your most preferred one.</p>
                                            <p>
                                                <strong>USERNAME:</strong> $user_name <strong>OR</strong> $email 
                                                <br/><br/> 
                                                <strong>DEFAULT PASSWORD: </strong>$user_name 
                                                <br/>
                                                <strong>SITE-URL: </strong> <a target='_blank' href='#'>Some Link Here</a>
                                            </p>
                                            <br/>
                                            <p>
                                                <strong>Best Regards,</strong>
                                                <br/>
                                                ShopE Account Management Team
                                            </p>
                                        </body>
                                    </html>";
                        //$mail_sent = mail($to, $subject, $message, $headers);
                    }else{
                        echo $UT::error("Unable to Create Password");
                    }
                }
            }
        }
    }


}else{
    echo $UT::error("Oops! Something went wrong!");
}

?>
<script>
    let proceed = "<?php echo $proceed; ?>";
    if(proceed === '1'){
        setTimeout(function () {
            reload();
        }, 3000);
    }
</script>
