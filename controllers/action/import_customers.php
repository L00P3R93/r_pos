<?php
require '../../config.php';
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
if($_POST){
    $excel_file_name = $_FILES['excel_file']['name'];
    $excel_file_size = $_FILES['excel_file']['size'];
    $excel_file_tmp = $_FILES['excel_file']['tmp_name'];
    $user_id = $UT::decurl($_SESSION['pos_']);
    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];
    if(in_array($_FILES["excel_file"]["type"], $allowedFileType)){
        $upload_file = $UT::upload_file($excel_file_name, $excel_file_tmp,'../../uploads/imports/');
        if($upload_file === 0){echo $UT::error("Error! Uploading Excel File $upload_file");}
        else{
            $target_path = '../../uploads/imports/'.$upload_file;
            $Reader = new Xlsx();
            $spreadsheet = $Reader->load($target_path);
            $excel_sheet = $spreadsheet->getActiveSheet();
            $spreadsheet_array = $excel_sheet->toArray();
            $sheet_count = count($spreadsheet_array);
            $total_records = $total_uploaded = $total_found = $invalid_phones = 0;
            for($i=1; $i<=$sheet_count; $i++){
                $customer_name = $customer_email = $customer_phone = $customer_branch = $customer_status = "";
                if(isset($spreadsheet_array[$i][0])){
                    $customer_name = mysqli_real_escape_string($DB::connect(), $spreadsheet_array[$i][0]);
                    $name = explode(" ", $customer_name);
                    $first_name = $name[0]; $second_name = $name[1]; $last_name = $name[2];
                }

                if(isset($spreadsheet_array[$i][1]))
                    $customer_email = mysqli_real_escape_string($DB::connect(), $spreadsheet_array[$i][1]);
                if(isset($spreadsheet_array[$i][2]))
                    $customer_phone = mysqli_real_escape_string($DB::connect(), $spreadsheet_array[$i][2]);

                if(!empty($customer_name) and $UT::validate_phone($customer_phone)){
                    $data[] = array(
                        "first_name"=>$first_name,
                        "second_name"=>$second_name,
                        "last_name"=>$last_name,
                        "email"=>$customer_email,
                        "phone"=>$customer_phone
                    );
                }else{$invalid_phones += 1;}
            }

            /**
             * Filter the data
             * Exclude customers already in the system.
             */
            if(count($data) > 0){
                $dt = array();
                $dt_ = $DB::getQ('r_customers',"uid>0","phone");
                while($r=mysqli_fetch_assoc($dt_)){$dt[]=$r;}
                for($i=0;$i<count($data); $i++){
                    if(!$UT::in_array_r($data[$i]["phone"], $dt)){
                        $result[] = array(
                            "first_name"=>$data[$i]["first_name"],
                            "second_name"=>$data[$i]["second_name"],
                            "last_name"=>$data[$i]["last_name"],
                            "email"=>$data[$i]["email"],
                            "phone"=>$data[$i]["phone"]
                        );
                    }
                }

            }

            /**
             * Insert the Excel File Data
             */
            foreach($result as $k=>$v){
                $fields = array('user_id','section_id','first_name','second_name','last_name','phone','email','status');
                $values = array("$user_id","1","$v[first_name]","$v[second_name]","$v[last_name]","$v[phone]","$v[email]","1");
                $import = $DB::insert('r_customers',$fields, $values);
                $total_uploaded += $import;
            }
            $total_records = $sheet_count;
            $total_found = count($data);
            $skipped = $total_records - count($result);
            /*var_dump($data);
            echo "<br>";
            echo "<br>";
            var_dump($result);*/
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Saved!</strong> <span>Total <?php echo $total_uploaded ?>/<?php echo $total_records; ?> Uploaded. Invalid phones <?php echo $invalid_phones ?> </span><br>
                <span>Skipped: <?php echo $skipped; ?></span>
            </div>
            <?php
        }
    }else{
        echo $UT::error("Invalid File Format");
    }
}else{
    echo $UT::error("Oops!Something went Wrong");
}

?>

<script>
    //setTimeout(function(){reload()},3000);
</script>
