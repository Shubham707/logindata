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
    <title>Login</title>
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
                    <form  id="loginForm" method="POST">
                        <img class="align-content" src="images/logo.png" alt="">
                        <div class="form-group">
                     
                           <div class="form-check-inline form-check">
                                <label for="inline-radio3" class="form-check-label user_id">
                                  <input type="radio" checked="checked" id="role" name="role" value="3" class="form-check-input">
                                  <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <circle cx="10" cy="10" r="9"></circle>
                                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                  </svg>
                                  <span>User</span>
                                </label>
                                <label for="inline-radio2" class="form-check-label role">
                                  <input type="radio" id="role" name="role" value="2" class="form-check-input">
                                      <svg width="20px" height="20px" viewBox="0 0 20 20">
                                        <circle cx="10" cy="10" r="9"></circle>
                                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                      </svg>
                                      <span>Travel Desk</span>
                                </label>
                                <label for="inline-radio1" class="form-check-label role">
                                  <input type="radio"  id="role" name="role" value="1" class="form-check-input">
                                  <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <circle cx="10" cy="10" r="9"></circle>
                                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                  </svg>
                                  <span>Admin</span>
                                 </label>
                            </div>

                        </div>
                        <div class="form-group">
                            <div id="alert"></div>
                            <label>Username</label>
                            <input type="email" id="username" name="username" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                               <!-- <input type="checkbox" id="remember_user" name="remember_user">Remember Me -->
                            </label>
                            <label class="pull-right forgotPassword">
                                <a method="post" action="forgetPassword.php" href="forgetPassword.php">Forgot Password?</a>
                            </label>

                        </div>
                       <input type="hidden" name="action" value="login" />
                       <input type="submit" value="Login" class="btn btn-success btn-flat m-b-30 m-t-30" />
                        <!-- <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                            </div>
                        </div> -->
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="signup.php"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript">
        //  $('.register-link').hide();
        // $('.user_id').click(function(){
        //     $('.register-link').show();
        // });
        // $('.user_id').click(function(){
        //     $('.register-link').show();
        // });
        // $('.role').click(function(){
        //     $('.register-link').hide();
        // });
        
        $('.user_id').click(function(){
            $('.register-link').show();
            $('.forgotPassword').show();
            
        });
        $('.user_id').click(function(){
            $('.register-link').show();
            $('.forgotPassword').show();
        });
        $('.role').click(function(){
            $('.register-link').hide();
            $('.forgotPassword').hide();
        });


        $(document).ready(function (e) {
            $("#loginForm").on('submit', (function (e) {
                e.preventDefault();
        
                var formData = new FormData($(this)[0]);
                
                //var remember_user = document.getElementById('remember_user').checked;
                var role = $("input[name='role']:checked").val();
               
                var username = $("#username").val();
                var pwd = document.getElementById('password').value;
               
                $.ajax({
                    url: "actions.php",
                    type: "POST",
                    data: {
                        'action': 'login',
                        'username': username,
                        'password': pwd,
                        'role': role
                        //'remember_user': remember_user
                    },
                    
                    success: function (returndata) {
                      //alert(returndata);
                        if (returndata == 'true') {
                          $("#alert").show();
                          //$("#alert").html('Successfully Login').addClass('alert alert-success').fadeOut(3000);
                          setTimeout(function(){ window.location = 'dashboard.php'; }, 3000);
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
