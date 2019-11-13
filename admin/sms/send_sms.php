<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

$response='';
if (isset($_POST['id'])) {
  $number = $_POST['contact_num'];
  $name = $_POST['name'];
  // Your Account SID and Auth Token from twilio.com/console
  $account_sid = 'AC25bff9d003f4daaf21e1a2e4e33d109b';
  $auth_token = 'dc0f576655a4cd444bc0c9e64153dc3d';
  // In production, these should be environment variables. E.g.:
  // $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

  // A Twilio number you own with SMS capabilities
  $twilio_number = "+15155002149";
  // $to = '+639056794750';

  $client = new Client($account_sid, $auth_token);

  $status = '';
  try {
    $message = $client->messages
                    ->create("+63".$number, // to
                             array(
                                 "body" => "Good Day ".$name."! \n\nYour Reservation with BIG-DAY CELEBRATION Catering Services is now confirmed!!",
                                 "from" => $twilio_number,
                                 "statusCallback" => "http://postb.in/1234abcd"
                             )
                    );
      $status = 200;
  } catch (Exception $e) {
    $status = $e->getStatusCode();
  }
}
$status = array('response' => $response );
echo json_encode($response);
