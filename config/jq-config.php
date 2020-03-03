<?php
// ** MySQL settings ** //
define('DB_NAME', 'db_dashboard');    // The name of the database
define('DB_HOST', 'localhost');    // 99% chance you won't need to change this value
define('DB_DSN','mysql:host=localhost;dbname=db_dashboard');
define('DB_USER', 'root');     // Your MySQL username
define('DB_PASSWORD', ''); // ...and password

define('ABSPATH', dirname(__FILE__).'/');

$koneksi = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die(mysql_error());
$db_koneksi= @mysql_select_db(DB_NAME) or die(mysql_error());
$conn = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
		    mysql_select_db(DB_NAME);



// Tables Settings
define('MENU_TABLE', 'menu');
define('MENUGROUP_TABLE', 'menu_group_pondok');

// Fields Settings
define('MENU_ID', 'id');
define('MENU_PARENT', 'parent_id');
define('MENU_TITLE', 'title');
define('MENU_URL', 'url');
define('MENU_CLASS', 'class');
define('MENU_POSITION', 'position');
define('MENU_GROUP', 'group_id');

define('MENUGROUP_ID', 'id');
define('MENUGROUP_TITLE', 'title');

// Admin Login
define('ADMIN_USER', '');
define('ADMIN_PASS', '');

?>
