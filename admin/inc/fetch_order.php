<?php
include 'conn_db.php';
// $milliseconds = round(microtime(true) * 1000);
// $timestamp = date('Y-m-d G:i:s');
$q_order = mysqli_query($conn,"SELECT r_timestamp, seen, COUNT(*) AS num_or FROM `reservations` WHERE seen = 0");
$un_notified = mysqli_query($conn,"SELECT COUNT(*) AS notified FROM `reservations` WHERE seen = 0 AND notified = 0");
$num = 0;
// $place = '';
$notify = 0;
if (mysqli_num_rows($q_order) > 0) {
	$r = mysqli_fetch_assoc($q_order);
	$n = mysqli_fetch_assoc($un_notified);
	$num = $r['num_or'];
	$place = $r['r_timestamp'];
	$notify = $n['notified'];
}

$orders=array(
	'unseen' => $num,
	// 'timestamp' => substr($timestamp, 11,-1),
	// 'place' => substr($place, 11,-1),
	'un_notified' => $notify
);
echo json_encode($orders);