<?php
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $username = $queries['username'];
    $role = $queries['role'];
    $pwd = $queries['pwd'];
    $id = $queries['id'];
    
    $_SESSION['username'] = $id;
    $_SESSION['role'] = $role;
    //print_r($queries);
?>
<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>
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
                <div class="login-logo">
                    <img class="align-content" src="images/logo.png" alt="" style="margin-left: 180px; margin-top: 10px;">
                </div>
                <div class="login-form">
                    <form  id="loginForm" method="POST">
                        <img class="user-avatar rounded-circle" src="dist/profile/1523880934.jpg" style="margin-left: 150px; margin-top: 10px;" alt="User Avatar">
                        <div class="form-group" >
                            <div id="alert"></div>
                            <label style="margin-left: 180px; margin-top: 10px;"><?= $username; ?></label>
                            <input hidden="true" type="email" id="ausername" name="ausername" value="<?= $id; ?>">
                        </div>
                        <div class="form-group">
                            <input hidden="true" type="password" id="apassword" name="apassword" value="<?= $pwd; ?>">
                        </div>
                       <input type="hidden" name="action" value="login" />
                        <input type="hidden" name="role" value="<?= $role; ?>" />
                       <input type="submit" value="Login" class="btn btn-success btn-flat m-b-30 m-t-30" />
                        <br><br>
                       <button type="button" class="btn btn-primary" onclick="signUsingDifferentAccount(this)" id="switch_account">Sign in Using Other Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (e) {
            $("#loginForm").on('submit', (function (e) {
                e.preventDefault();
                 var formData = new FormData($(this)[0]);
                var remember_user = true;
                var username = $("#ausername").val();
                var pwd = document.getElementById('apassword').value;
               
                $.ajax({
                    url: "actions.php",
                    type: "POST",
                    data: {
                        'action': 'automatic_login',
                        'username': username,
                        'password': pwd,
                        'remember_user': remember_user
                    },
                    
                    success: function (returndata) {
                      //alert(returndata);
                        if (returndata=='true') {
                          $("#alert").show();
                          $("#alert").html('Successfully Login').addClass('alert alert-success').fadeOut(3000);
                          setTimeout(function(){ window.location = 'index.php'; }, 3000);
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
        function signUsingDifferentAccount(btn) {
            $.ajax({
                type: 'POST',
                url: 'actions.php',
                data: {
                    'action': 'clearCookies',
                },
                success: function(msg){
                   //alert(msg);
                    setTimeout(function(){ window.location = 'login.php'; }, 100);
                }
            });
                //document.cookie = "";
                //console.log(document.cookie);
            }
    </script>

  <!--   <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script> -->


</body>
</html>
