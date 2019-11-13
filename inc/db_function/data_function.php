<?php
function counting_rating($product_id,$c_id,$conn){
    $output = 0;
    $rate = mysqli_query($conn,"SELECT AVG(rating) AS prod_rate FROM rating WHERE product_fk = '$product_id'");
    $result = mysqli_num_rows($rate);
    $row = mysqli_fetch_assoc($rate);
    if ($result > 0) {
        foreach ($row as $value) {
            $output = round($value["prod_rate"]);
        }
    }

    return $output;
}

function counting_row($product_id,$c_id,$conn){
    $output = 0;
    $rate = mysqli_query($conn,"SELECT * FROM rating WHERE product_fk = '$product_id'");
    return mysqli_num_rows($rate);

}
?>