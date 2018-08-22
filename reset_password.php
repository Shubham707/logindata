<?php
require_once('includes/config_connection.php');
require_once('includes/mysqli_connection.php');
$db = new MysqlDB;
$db->connect();
?>
<?php
    function CheckCookieLogin() {
        //pr("Checking for login");
        
        $uname = $_COOKIE['uname']; 
        $role = $_COOKIE['role'];
        $pwd = $_COOKIE['pwd'];
        
        if (!empty($uname) && !empty($role) && !empty($pwd)) { 
            $db = new MysqlDB;
            $db->connect();
            $table = ($role == 1 ? 'admin' : 'users');
            //pr($table);
            
            $query = "username="."'$uname'";
            $finalQuery = "SELECT * FROM $table WHERE $query";
            
            //pr($finalQuery);
            
            $result = $db->con->query($finalQuery);
            //pr($result);
            
            if($result->num_rows >= 1) {
                $finalResult = $result->fetch_assoc();
                if($finalResult['password'] == $pwd) {
                    // reset expiry date
                    // setcookie("uname",$uname,time()+3600*24*365,'/','localhost');
                    
                    // Call login function here
                    $username = $finalResult['first_name']." ".$finalResult['last_name'];
                    
                    echo "Cookie Login";
//                    $_SESSION['username'] = $uname;
//                    $_SESSION['role'] = $role;
                    // Can get same stuff back there
                    header("Location: auto_login.php?username=$username&role=$role&pwd=$pwd&id=$uname");
                   //  header("Location: auto_login.php");
                    end();
                    // Can get cookies with javascript as well and can call action.php and ask to process login with given data.
                }
            }
        }
    }
    CheckCookieLogin();
?>

<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body class="bg-dark">
    
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                     <div class="pull-right"><button  onclick="window.history.back();">back</button></div>
                     <img class="align-content" src="images/logo.png" alt="">
                    <form  id="forgotForm" method="POST">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                               <input type="hidden" id="role" name="role" value="<?= $_GET['r']; ?>">
                               <input type="hidden" id="link" name="link" value="<?= $_GET['link']; ?>">
                            </label>

                        </div>
                       <input type="hidden" name="action" value="change_password" />
                       <input type="submit" value="Save" class="btn btn-success btn-flat m-b-30 m-t-30" />
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript">
         $('.register-link').hide();
        $('.user_id').click(function(){
            $('.register-link').show();
        });
        $('.user_id').click(function(){
            $('.register-link').show();
        });
        $('.role').click(function(){
            $('.register-link').hide();
        });


        $(document).ready(function (e) {
            $("#forgotForm").on('submit', (function (e) {
                e.preventDefault();
        
                var formData = new FormData($(this)[0]);
               
                $.ajax({
                    url: "actions.php",
                    type: "POST",
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    
                    success: function (returndata) {
                   
                        if (returndata == 'true') {
                          $("#alert").show();
                          $("#alert").html('Password Successfully updated').addClass('alert alert-success').fadeOut(3000);
                          setTimeout(function(){ window.location = 'login.php'; }, 3000);
                        }else{
                          $("#alert").show();
                          $("#alert").html(returndata).addClass('alert alert-danger').fadeOut(3000);  
                        }
                        
                    },
                    error: function ()
                    {
                    }
                });
            }));
        });
    </script>

  <!--   <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script> -->


</body>
</html>
