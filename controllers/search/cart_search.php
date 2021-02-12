<?php
require '../../config.php';
if($_POST){
    $search = $_POST["search"];
    $sql = "SELECT * FROM r_customers WHERE (first_name LIKE '%$search%' OR second_name LIKE '%$search%' OR last_name LIKE '%$search%') OR phone LIKE '%$search%'";
    $q = mysqli_query($DB::connect(), $sql);
    if(mysqli_num_rows($q) > 0){
        while($result = mysqli_fetch_assoc($q)){ ?>
            <li class="search-result">
                <a class="search_link" onclick="cart_action('add_customer','<?php echo $result['uid']; ?>')">
                    <strong><?php echo "$result[first_name] $result[second_name] $result[last_name]"; ?></strong>,<br>
                    <span>Phone: <?php echo $result['phone']; ?></span><br>
                </a>
            </li>
    <?php
        }
    }else{
        echo "<li class='search-result'><a>No Result ...</a></li>";
    }
}
?>
