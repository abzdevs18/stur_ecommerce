<?php
include 'conn_db.php';

$q_order = mysqli_query($conn,"UPDATE `reservations` SET notified = 1 WHERE notified = 0");
