<?php

	
	define("DATABASE_SERVER","127.0.0.1");
	define("DATABASE_USER","database_user_name");
	define("DATABASE_PASSWORD","mydbpassword!!");
	define("DATABASE_NAME","database_user");
	

	// connecting to database
	$link = mysql_connect(DATABASE_SERVER,DATABASE_USER,DATABASE_PASSWORD);
	mysql_select_db(DATABASE_NAME,$link);
	
	
?>