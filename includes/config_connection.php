<?php
error_reporting(1);//Fehlermeldung anzeigen
ini_set('display_errors', TRUE);
ini_set("date.timezone", "Asia/Kolkata");
$dbname = "portal";      // DB Name //cyc_db
$username = "root";    // DB Benutzer//cyc_user123
$password = "password";	// DB Passwort//cyc_user123
$servername = "localhost"; // DB Server

$currency			= '$'; //currency symbol
$shipping_cost		= 0; //shipping cost
$taxes				= array( //List your Taxes percent here.
						'VAT' => 0, 
						'Service Tax' => 0,
						'Other Tax' => 0
					);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
define('DB_USER', $username);
define('DB_PASSWORD', $password);
define('DB_NAME', $dbname);
define('DB_HOST', $servername);

//SMTP
$smtpSetting = [
	'smtp'=>'smtp.gmail.com',
	'username'=>'vipsainisahab@gmail.com',
	'password'=>'sainisahab2018',
	'from'=>'vipsainisahab@gmail.com'
];

$striptTokens = array(
	"testmode"   => "on",
	"private_live_key" => "sk_test_LcpUyyiT2MZh0pKZMsCrzM8H",
	"public_live_key"  => "pk_test_JfKpivBNotsCbZEJ7Pdq27h5",
	//"private_test_key" => "sk_test_XaGwlE7Q81Kuh2zOtsa9ZtLV",
	//"public_test_key"  => "pk_test_04OWOqJ1gZnCS6J6GzJ1HxBW"
	"private_test_key" => "sk_test_LcpUyyiT2MZh0pKZMsCrzM8H",
	"public_test_key"  => "pk_test_JfKpivBNotsCbZEJ7Pdq27h5"  
);

//Check Connection 
if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

 echo "Connection  failed";

}

mysqli_set_charset($conn,'utf8');

session_start();

define("base_url","http://localhost/pearl/woopays/");
define("ADMIN", "admin");
define("USER", "user");
define("BUSINESS", "business");
define("REQUESTS", "requests");
define("PRODUCTS", "products");

define("MS_CAT", "master_category");
define("CAT", "categories");
define("SB_CAT", "sub_categories");
define("PRODUCT", "product");
define("PRODUCT_IMAGES", "product_images");

?>