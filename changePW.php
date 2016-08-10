<?php
$hostname = "127.0.0.1";
$username = "root";
$password ="123456";
$connection = mysql_connect($hostname, $username, $password) or die ("Could not open connection to database");
mysql_select_db("test", $connection) or die("Could not select database");

$method = $_SERVER['REQUEST_METHOD'];


    parse_str(file_get_contents("php://input"),$post_vars);

   

    $username=$post_vars['username'];
	
	$email=$post_vars['email'];

    $oldpass=$post_vars['oldpass'];

    $newpass=$post_vars['newpass'];

 #echo $username;
 #echo $email;
 #echo $oldpass;

   $checkid=mysql_query("SELECT * from personal WHERE username='$username' and password='$oldpass' and email='$email'") or die("Could not issue MySQL query");

$records = mysql_num_rows($checkid);

if($records>0){
 echo "Update Success";
		$sqlstring="update personal set password='$newpass' where username='$username'";
	
	mysql_query($sqlstring);
	
	
}else{
	 echo "Wrong password or email";
	 return;
}

	?>