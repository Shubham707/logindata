<?php
require_once('includes/config_connection.php');
require_once('includes/mysqli_connection.php');
$db = new MysqlDB;
$db->connect();

if($_REQUEST['confirm'])
{
      
       $update = $db->update('booking', ['cancellation' => '0'], "book_id=" . $_REQUEST['confirm']);
  
        if ($update) {
          header('Location:show_newBooking.php');
        }

   
} 
if($_REQUEST['cancel'])
{
        $update = $db->update('booking', ['cancellation' => '1'], "book_id=" . $_REQUEST['cancel']);
  
        if ($update) {
	    header('Location:show_newBooking.php');
        }
}
?>