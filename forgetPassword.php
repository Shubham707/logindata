<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forget Password</title>
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
                    <img class="align-content" src="images/logo.png" alt="">
                    <form method='post' action='' id="forgorPassword">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
<!--                        <button type="submit" class="btn btn-primary btn-flat m-b-15">Submit</button>-->
                        <input type="hidden" name="action" value="reset_password">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript">
        
        $(document).ready(function (e) {
            $("#forgorPassword").on('submit', (function (e) {
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
                        if (returndata=='true2') {
                          $("#alert").show();
                          $("#alert").html('Your reset password link has been sent to your registered email id,  Plz check your mail.').addClass('alert alert-success');
                          setTimeout(function(){ window.location = 'index.php'; }, 5000);
                        }else if (returndata=='true') {
                          $("#alert").show();
                          $("#alert").html('Password is updated. Plz Login with new password.').addClass('alert alert-success').fadeOut(2000);
                          setTimeout(function(){ window.location = 'index.php'; }, 3000);
                        }else{
                          $("#alert").show();
                          $("#alert").html('some error').addClass('alert alert-danger').fadeOut(3000);  
                        }
                        
                    },
                    error: function () {
                    }
                });
            }));
        });
    </script>

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
