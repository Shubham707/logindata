<?php
require_once('includes/config_connection.php');
require_once('includes/mysqli_connection.php');
$db = new MysqlDB;
$db->connect();
$id=$_POST['id'];
    $formdata = array(
        'name' => $_POST['name'], 
        'email' => $_POST['email'], 
        'booking_msg' => $_POST['booking_msg'],
        'arrival_date' => $_POST['arrival_date'],
        'venue_location' => $_POST['venue_location'],
        'check_out' => $_POST['check_out'],
        'check_in' => $_POST['check_in'],
        'city' => $_POST['city'],
        );

    $update = $db->update('booking', $formdata, "book_id='".$id."' ");
    //print_r($update); die;
if ($update) 
{
  header('Location:show_newBooking.php');
}
?>