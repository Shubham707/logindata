<?php
$filename ='dist/voucher/'.$_REQUEST['voucher'];

header("Content-Length: " . filesize($filename));
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.$filename);

readfile($filename);
?>