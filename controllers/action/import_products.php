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
            for($i = 1; $i<=$sheet_count; $i++){
                $item_sku = $item_name = $item_description = $item_image = "";
                $item_price = $item_category = $item_status = 0;
                if(isset($spreadsheet_array[$i][0]))
                    $item_sku = mysqli_real_escape_string($DB::connect(), $spreadsheet_array[$i][0]);
                if(isset($spreadsheet_array[$i][1]))
                    $item_name = mysqli_real_escape_string($DB::connect(), $spreadsheet_array[$i][1]);
                if(isset($spreadsheet_array[$i][2]))
                    $item_price = mysqli_real_escape_string($DB::connect(), $spreadsheet_array[$i][2]);
                if(isset($spreadsheet_array[$i][3]))
                    $item_description = mysqli_real_escape_string($DB::connect(), $spreadsheet_array[$i][3]);
                if(isset($spreadsheet_array[$i][4]))
                    $item_category = mysqli_real_escape_string($DB::connect(), $spreadsheet_array[$i][4]);
                if(isset($spreadsheet_array[$i][5]))
                    $item_status = mysqli_real_escape_string($DB::connect(), $spreadsheet_array[$i][5]);
                if(isset($spreadsheet_array[$i][6]))
                    $item_image = mysqli_real_escape_string($DB::connect(), $spreadsheet_array[$i][6]);

                $data[] = array(
                    "item_sku"=>$item_sku,
                    "item_name"=>$item_name,
                    "item_price"=>$item_price,
                    "item_description"=>$item_description,
                    "item_category"=>$item_category,
                    "item_status"=>$item_status,
                    "item_image"=>$item_image
                );
            }

            /**
             * Insert the Excel File Data
             */
            foreach($data as $k=>$v){
                $fields = array('item_sku','category_id','user_id','item_name','item_price','item_description','item_image','status');
                $values = array("$v[item_sku]","$v[item_category]","$user_id","$v[item_name]","$v[item_price]","$v[item_description]","$v[item_image]","1");
                $import = $DB::insert('r_items',$fields, $values);
                $total_uploaded += $import;
            }
            $total_records = $sheet_count;
            $total_found = count($data);
            $skipped = $total_records - $total_found;

?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Saved!</strong> <span>Total <?php echo $total_uploaded ?>/<?php echo $total_records; ?> Uploaded. </span><br>
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
    setTimeout(function(){reload()},2000);
</script>
