<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require_once('includes/config_connection.php');
require_once('includes/mysqli_connection.php');
//require_once('includes/Email.php');

class Action extends MysqlDB
{
   
    function __construct($data)
    {  
        parent::__construct();

        $this->init($data);
        
    }

    function init($data) {

        switch ($data['action']) {
            case "automatic_login":
            case "login":
                $this->login($data);
                break;
            case "reset_password":
                $this->resetPassword($data);
                break;
            case "change_password":
                $this->change_password($data);
                break;
            case "update_profile":
                $this->update_profile($data);
                break; 
            case 'delete_record':
                $this->delete_record($data);
                break; 
            case "change_status":
                $this->change_status($data);
                break; 
            case "booking":
                $this->booking($data);
                break;  
            case "update_category":
                $this->update_category($data);
                break; 
            case "update_business_name":
                $this->updateBusinessData($data);
                break;
            case "add_product":
                $this->addProduct($data);
                break;
            case "update_product";
                $this->updateProduct($data);
                break;
            case "signup":
                $this->addUser($data);
                break;
            case "clearCookies":
                $this->clearCookies();
                break; 
           case "uploadVoucher":
                $this->uploadVoucher($data);
               break;
               case "bookingupdate":
                $this->bookingupdate($data);
               break;
               case "confirm_record":
                $this->confirm_record($data);
               break;
                  
            default:
                break;
        }

    }


    function login($data) {
        
    	$password = ($data['action'] == "automatic_login" ? $data['password'] : md5($data['password']));
        $username = $data['username'];
        $role = $data['role'];
        
        $this->connect();
        if ($role==1) {
          $chk_admin = $this->select('*', ADMIN, "username='".$data['username']."' && password='".$password."' && role=1 ");
        }else if ($role==2) {
          $chk_admin = $this->select('*', ADMIN, "username='".$data['username']."' && password='".$password."' && role=2 ");
        }else if ($role==3) {
          //$chk_user = $this->select('*', USER, "username='".$data['username']."' && password='".$password."' && role=3 && status=1");
         $chk_user = $this->select('*', USER, "username='".$data['username']."' && password='".$password."'");
        $chkUrSts = $this->select('*', USER, "username='".$data['username']."' && password='".$password."' && status=1");
        if((!empty($chk_user)) && (!$chkUrSts)) {
            echo "Please wait approvel by admin."; return;
        }
            
        }

       

        
        if ((!empty($chk_admin)) || (!empty($chk_user))) {
            $_SESSION['username'] = $data['username'];
            
            if (!empty($chk_admin['role'])) {
               $_SESSION['role'] = $chk_admin['role'];
               $_SESSION['uid'] = $chk_admin['id']; 
               setcookie("role", $chk_admin['role'], time()+2592000,'/','localhost');
            }
            if (!empty($chk_user['role'])) {
               $_SESSION['role'] = $chk_user['role'];
               $_SESSION['uid'] = $chk_user['id']; 
               setcookie("role", $chk_user['role'], time()+2592000,'/','localhost');
            }
            //pr($_SESSION['role']);
            if($data['remember_user'] == "true") {
                $_SESSION['user_is_loggedin'] = 1;

                $cookiehash = $username;//md5(sha1($username . user_ip));
                setcookie("uname",$cookiehash,time()+3600*24*365,'/','localhost');
                setcookie("pwd", $password, time()+3600*24*365,'/', 'localhost');
            } else {
                unset($_COOKIE["uname"]);
                setcookie("uname",'', time() - 2592100, '/');
                setcookie("pwd", '', time() - 2592100, '/');
            }
            
            echo "true";
        }else{
        	echo "Username or Password is wrong.";
        }    
        
        $this->disconnect();
    }

    function resetPassword($data) {
      
        $email = $data['email'];
 
        $this->connect();
 
        if($result = $this->select('*', USER, "username='".$email."' ")) {
            $name = $result['name'];
            $role = $result['role'];
            
            $from = $email;
            include 'send_mail.php';
            die;
            $this->sendResetPasswordMail($email, $fullName, $from);

//            $recipient = $email;
//            $subject = "New contact from $name";
//            $email_content = "Name: $fullName\nEmail: $email\n\nMessage: \nThis is a message.\n";
//            $email_headers = "From: JS <$from>";
//            mail($recipient, $subject, $email_content, $email_headers);
          
        } else {
            echo "No user account found.";
        }
    }
    function sendResetPasswordMail($to, $recepientName, $from) {
        //PHPMailer Object
        try { 
            $mail = new PHPMailer();
          //  pr($mail);
            $mail->isMail();
            
//            $mail->Host = "pearlorganisation.com";
//
//            $mail->SetFrom("$from", "$from");
//            $mail->AddAddress("$to");
//
//            $mail->Subject = "Reset Password";
//            $mail->Body = "This is a message";
            
            //From email address and name
            $mail->From = $from;
            $mail->FromName = "Pearl Organisation";

            //To address and name
            $mail->addAddress($to, $recepientName);

            //Address to which recipient will reply
            $mail->addReplyTo($from, "Reply");

            //CC and BCC
        //        $mail->addCC("cc@example.com");
        //        $mail->addBCC("bcc@example.com");

            //Send HTML or Plain Text email
            $mail->isHTML(true);

            $mail->Sender = $from;
            $mail->Subject = "Reset Password";
            $mail->Body = "<i>Please follow this link to reset passord: http://pearlorganisation.com</i>";
            $mail->AltBody = "Please follow this link to reset passord: http://pearlorganisation.com"; 
            
            pr($mail->send());
            
            if(!$mail->send()) {
                echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message has been sent.<br>";
                echo "Please check your email: $to. and follow the link to reset the password<br>";   
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
    
    function change_password($data) {   
      
      if (!empty($data['link'])) { 
        $email = hex2bin($data['link']);
        $role = $data['role'];
      }else{ 
        $email = $_SESSION['username'];
        $role = $_SESSION['role'];
      }
      $password = md5($data['password']);

      $this->connect();
      if ($data['role']==3) {
        $update = $this->update(USER, array('password' => $password), " username='".$email."' && role='".$role."' ");
      }else{
        $update = $this->update(ADMIN, array('password' => $password), " username='".$email."' && role='".$role."' ");
      }
        
        if ($update) {
               echo "true";
        }
    }

    function update_profile($data)
    {
        if ($_SESSION['role']=='1') {
            $table = ADMIN;
        }else{
            $table = USERS;
        }
        $this->connect();
        $chekdata = $this->select('*', $table, "username='".$_SESSION['username']."' ");
        if ($chekdata) { 
            $old_image = $chekdata['image']; 
        }

        if (!empty($_FILES['image']['name'])) {
            $uploadDir = "dist/profile/";
            $filename = $_FILES['image']['name'];
            if (file_exists($uploadDir . $filename)) {
               $ext = end(explode('.', $filename));
               $filename = time().".".$ext;
            }
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $filename)) {
                unlink($uploadDir . $old_image);
            }
        }

        $formdata = array(
        'first_name' => $data['first_name'], 
        'last_name' => $data['last_name'], 
        'image' => $filename,
        );

        $save = $this->update($table, $formdata, "username='".$_SESSION['username']."' ");
        if ($save) {
            echo "Record is Successfully Update.";
        }
    }

    
    function change_status($data)
    {  
        $this->connect(); 
        $update = $this->update($data['t'], ['status' => $data['status']], "user_id=" . $data['id']);
        
        if ($update) {
            
            if ($data['status']==1) {
               $user = $this->select('*', USER, 'user_id='.$data['id']);
               $name = $user['name'];
               $role = $user['role'];
               $email = $user['username'];
               $message = "Congratulations! You are now an active user. Kindly login through your registered email Id & password to enjoy our service. <br><br>
                 Regards, <br>Sewells Groups.";
                
               include 'mail_approvel.php';
          } 
            
           echo 'ok';
        }   
    }

    function booking($data) {

        unset($data['action']);
        $bookingdata = array(
            'email' => $_SESSION['username'],
            'name' => $data['name'],
            'city'=> $data['city'],
            'check_in'=> $data['check_in'],
            'check_out'=> $data['check_out'],
            'venue_location'=> $data['venue_location'],
            'arrival_date'=> $data['arrival_date'],
            'booking_msg'=> $data['booking_msg'],
            'city'=> $data['city']
          );
        //pr($bookingdata); die;
        $this->connect(); 
        //$check_duplicacy = $this->select('*', , " email='".$data['email']."' && email='".$data['email']."' ");
       
            $save = $this->insert('booking', $bookingdata);
            
            $userData = $this->select('*','user', '1');

            $name = $userData['name'];
            $role = $userData['role'];
            $message = $data['booking'];
            
            $from = 'mail@iflex-tech.com';
            include 'send_mail2.php';
            $from = 'sumit.nath@iflextech.in';
            include 'send_mail2.php';
            
            $this->disconnect();
            if ($save) {
                echo "true";
            }

    }

    function update_category($data)
    {  
        $formdata = array(
            'mid' => $data['mid'],
            'sid' => $data['sid'],
            'category' => $data['category'],
            'description' => $data['desc']
        );

       $this->connect();
       $update = $this->update($data['t'], $formdata, "id=".$data['id']."' && username='".$_SESSION['username']."' && uid='".$_SESSION['uid']."' ");
       if ($update) {
           $returnMessage .= "The Category is Successfully Updated";
           echo $returnMessage;
       }
    }
    
    function updateBusinessData($data) 
    {
       $this->connect();
       $update = $this->update($data['table_name'], $updateData, "id=".$data['id']);
       $this->disconnect();
        
       if ($update) {
           $returnMessage .= "<br>The Category is Successfully Updated";
           echo $returnMessage;
       } else {
           echo "false";
       }
    }
    
function addProduct($data) {
//    pr($data); die;
        
    $this->connect();
    $filename = "";
    
    if (!empty($_FILES['image']['name'])) {
       $uploadDir = "dist/products/";
       $filename = $_FILES['image']['name'];
       if (file_exists($uploadDir . $filename)) {
          $ext = end(explode('.', $filename));
          $filename = time().".".$ext;
       }
       if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $filename)) {

       }else{
        echo "file error";
       }
       // Date
    }

//    $currDate = date('Y-m-d H:i:s');

    // Sub-cat id
    $result = $this->select('*', CAT, "id=".$data['category']);

    $insertData = array (
       'mid' => $data['ms_category'],
       'sid' => $result['sid'],
       'cat_id' => $data['category'],
       'name' => $data['product_name'],
       'image' => $filename,
       'price' => $data['price'],
       'description' => $data['description'],
       'username' => $_SESSION['username'],
       'tags' => $data['tags']
    );
   
    if($this->insert(PRODUCTS, $insertData)) {
       echo "true";
    } else {
       echo "false";
    }
}

   function updateProduct($data) {
       //pr($data); die;
       $this->connect();
       //$sid = $this->select('sid', CAT, "id='".$data['category']."' ");
        // Sub-cat id
       $result = $this->select('*', CAT, "id=".$data['category']);
       $updateData = array(
            'mid' => $data['ms_category'],
            'sid' => $result['sid'],
            'cat_id' => $data['category'],
            'name' => $data['product_name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'status' => 1,
           'tags' => $data['tags']
       );
       if (!empty($_FILES['image']['name'])) {
           $uploadDir = "dist/products/";
           $filename = $_FILES['image']['name'];
           
           if (file_exists($uploadDir . $filename)) {
              $ext = end(explode('.', $filename));
              $filename = time().".".$ext;
           }
           if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $filename)) {
               unlink($uploadDir . $old_image);
               $updateData['image'] = $filename; 
           }
       }

      $update = $this->update(PRODUCTS, $updateData, "id=".$data['id']);
      $this->disconnect();
       if ($update) {
          echo "true";
      } else {
          echo "false";
      }
   }
    
    function addApprovedBusinessData($data) {     
        $this->connect();
        $insertData = array (
            'id' => $data['id'],
            'buis_name' => $data['buis_name'],
            'mobile' => $data['mobile'],
            'table_name' => $data['table_name'],
            'date_approved' => $data['date'],
            'username' => $data['username']
        );

        if($this->insert('aproved_requests', $insertData)) {
            echo "true";
        } else {
            echo "false";
        }
    }
    
    function addUser($data) {

        $this->connect();
        $email = $data['username'];
        $chkDuplicacy = "SELECT * FROM user WHERE username="."'$email'";
        $result = $this->con->query($chkDuplicacy);
        if($result->num_rows >= 1) {
           echo "Exists";
           return;
        }
    
        $password = md5($data['password']);
        
        $insertData = array (
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => $password,
            'mobile' => $data['mobile'],
            'adhar_no' => $data['adhar_no'],
            'pancard' => $data['pancard'],
            'department' => $data['department'],
            'designation' => $data['designation'],
            'pancard' => $data['pancard']
        );

        if (!empty($_FILES['image']['name'])) {
           $uploadDir = "dist/profile/";
           $filename = $_FILES['image']['name'];
           
           if (file_exists($uploadDir . $filename)) {
              $ext = end(explode('.', $filename));
              $filename = time().".".$ext;
           }
           if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $filename)) {
               unlink($uploadDir . $old_image);
               $insertData['image'] = $filename; 
           }
       }
         if (!empty($_FILES['id_proof']['name'])) {
           $uploadDir = "dist/profile/";
           $filename = $_FILES['id_proof']['name'];
           
           if (file_exists($uploadDir . $filename)) {
              $ext = end(explode('.', $filename));
              $filename = time().".".$ext;
           }
           if (move_uploaded_file($_FILES['id_proof']['tmp_name'], $uploadDir . $filename)) {
               unlink($uploadDir . $old_image);
               $insertData['image'] = $filename; 
           }
       }
       
       $name = $data['name'];
        $role = $data['role'];
        $message = "Thankyou for signing up, You will get a notification mail after activation of your account.";
        
        $from = $email;
        include 'send_mail3.php';

        if($this->insert('user', $insertData)) {
            echo "true";
        } else {
            echo "false";
        }

    }
    
    function clearCookies() {
        session_start();
        unset($_SESSION["username"]);
        $_SESSION["username"] = "";
        unset($_SESSION["role"]);
        $_SESSION["role"] = "";
        
        unset($_COOKIE["uname"]);
        setcookie("uname",'', time() - 2592100, '/');
        setcookie("pwd", '', time() - 2592100, '/');
        setcookie("role", '', time() - 2592100, '/');
        
        session_destroy();
        
        echo "true";
    }
    function uploadVoucher($val)
    {
        echo "hello";
        die();
      
      $this->connect();
      $updateData=array(
        'name' => $data['book_id'],
        'username' => $data['voucher'],
      );
      if (!empty($_FILES['image']['name'])) {
           $uploadDir = "dist/profile/";
           $filename = $_FILES['image']['name'];
           
           if (file_exists($uploadDir . $filename)) {
              $ext = end(explode('.', $filename));
              $filename = time().".".$ext;
           }
           if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $filename)) {
               unlink($uploadDir . $old_image);
               $insertData['image'] = $filename; 
           }
       }

       $update = $this->update($data['table_name'], $updateData, "book_id=".$val['book_id']);
       $this->disconnect();
        
       if ($update) {
           $returnMessage .= "<br>The Voucher is Successfully Uploaded";
           echo $returnMessage;
       } else {
           echo "false";
       }
    }

    function bookingupdate($value)
    {
       //pr($value); die();
      $id=$value['id'];
      $formdata = array(
        'name' => $value['name'], 
        'email' => $value['email'], 
        'booking_msg' => $value['booking_msg'],
        'arrival_date' => $value['arrival_date'],
        'venue_location' => $value['venue_location'],
        'check_out' => $value['check_out'],
        'check_in' => $value['check_in'],
        'city' => $value['city'],
        );

        $save = $this->update('booking', $formdata, "id='".$id."' ");
        if ($save) {
            echo "true";
        }
    }
    
   

}

new Action($_REQUEST);
