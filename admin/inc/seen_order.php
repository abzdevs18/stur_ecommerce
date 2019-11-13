<?php
include 'conn_db.php';

$q_order = mysqli_query($conn,"UPDATE `reservations` SET seen = 1 WHERE seen = 0");
