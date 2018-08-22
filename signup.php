<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
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
                   <form  id="signupForm" method="POST" enctype="multipartform-data">
                        <img class="align-content" src="images/logo.png" alt="">
                        <div class="form-group">
                            
                            <label>Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Please type your name" required>
                            <div id="nameAlert"></div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" id="username" name="username" class="form-control" placeholder="This will be your username." required>
                             <div id="emailAlert"></div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password here." required>

                            <div id="passwordAlert"></div>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" id="confirmpwd" name="confimpwd" class="form-control" placeholder="Enter new password here." required>

                            <span style="color: red;" class="error1"></span>
                        </div>
                        <div class="form-group staticParent">
                            <label>Mobile</label>
                            <input type="text"  id="mobile" name="mobile" maxlength="10" class="child form-control" placeholder="Your mobile no." required>

                            <div id="mobileAlert"></div>
                        </div>
                        <div class="form-group staticParent">
                            <label>Aadhar No.</label>
                            <input type="text" maxlength="12" id="adhar_no" name="adhar_no" class="child form-control" placeholder="Adhar No." maxlength="12" required="Plz filled this field">
                            <div id="adharAlert"></div>
                        </div>
                        <div class="form-group">
                            <label>Pan Card No.</label>
                            <input type="text" name="pancard" class="form-control" id="pancard" maxlength="10" placeholder="Pan Card No" required="Plz filled this field">
                            <div id="pancardAlert"></div>
                        </div>
                         <div class="form-group">
                            <label>Address</label>
                            <input type="text" onKeyPress="return ValidateAlpha(event);" id="department" name="department" class="form-control" placeholder="Department" required>

                             <div id="departmentAlert"></div>
                        </div>
                        <!-- <div class="form-group">
                            <label>Department</label>
                            <input type="text" onKeyPress="return ValidateAlpha(event);" id="department" name="department" class="form-control" placeholder="Department" required>

                             <div id="departmentAlert"></div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label>Designation</label>
                            <input type="text" onKeyPress="return ValidateAlpha(event);" id="designation" name="designation" class="form-control" placeholder="Designation" required>

                             <div id="designationAlert"></div>
                        </div> -->
                        <div class="form-group">
                            <label>User Profile Photo</label>
                            <input type="file" id="image" name="image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label>Upload Proof Id</label>
                            <input type="file" id="id_proof" name="id_proof" class="form-control-file">
                            <span style="color: red;">Upload Your Id (Aadhar,Voter Id, Drivering License,Passport)</span>
                        </div>
                        <div id="alert"></div>
                       <input type="hidden" name="action" value="signup" />
                       <input type="submit" id="Submit" value="Sign Up" class="btn btn-success btn-flat m-b-30 m-t-30" />
                        <div class="register-link m-t-15 text-center">
                            <p>You have account ? <a href="login.php"> Log in</a></p>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#Submit").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#confirmpwd").val();
            if (password != confirmPassword) {
                $('.error1').html('Psaaword did not match');
                return false;
            }
            return true;
        });
    });
</script>
    <script>
  $(function() {
  $('.staticParent').on('keydown', '.child', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
});
</script>
<script type="text/javascript">
  function isNumberKey(evt){ 
  var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 46 && charCode > 31 
  && (charCode < 48 || charCode > 57))
        return false;
        return true;
  }
       
    function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }
</script>
    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (e) {
            $("#signupForm").on('submit', (function (e) {
                
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
                        if (returndata=='true') {
                          $("#alert").show();
                          $("#alert").html('Successfully Signed up, Please check your email. ').addClass('alert alert-success');
                          setTimeout(function(){ window.location = 'index.php'; }, 3000);
                        }else if(returndata === "Exists") {
                            $("#alert").show();
                            $("#alert").html('This email id already exists, please use different one.').addClass('alert alert-danger');
                        }else {
                          $("#alert").show();
                          $("#alert").html('Username or Password is wrong').addClass('alert alert-danger').fadeOut(3000); 
                        }
                    },
                    error: function () {
                    }
                });
            }));
        });
        
        function login(data) {
            $.ajax({
                url: "actions.php",
                type: "POST",
                data: data,

                success: function (returndata) {
                  //alert(returndata);
                    if (returndata=='true') {
                      $("#alert").show();
                      $("#alert").html('Successfully added user. Logging in...').addClass('alert alert-success').fadeOut(3000);
                      setTimeout(function(){ window.location = 'index.php'; }, 3000);
                    }else{
                      $("#alert").show();
                      $("#alert").html('Username or Password is wrong').addClass('alert alert-danger').fadeOut(3000);  
                    }

                },
                error: function () {
                }
            });
        }
    </script>

  <!--   <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script> -->


</body>
</html>
