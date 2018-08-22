<?php include "includes/config_connection.php"; 

    $tmp=trim(strip_tags($_FILES['voucher']['tmp_name']));
	$voucher=$_FILES['voucher']['name'];
	move_uploaded_file($tmp,"dist/voucher/".$voucher);

	$update_data ="UPDATE booking SET voucher='".$voucher."', status='1' WHERE book_id=".$_POST['book_id']." ";

	if($conn->query($update_data) === TRUE)
	{
		echo 'Voucher is Uploaded';
	}
	else{
		echo "Some error";
		}

?>