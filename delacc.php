<?php
$hostname = "127.0.0.1";
$username = "root";
$password ="123456";
$connection = mysql_connect($hostname, $username, $password) or die ("Could not open connection to database");
mysql_select_db("test", $connection) or die("Could not select database");

    parse_str(file_get_contents("php://input"),$post_vars);



      $username=$post_vars['username'];
      $password=$post_vars['password'];
	  $email=$post_vars['email'];
	
#echo $username;
#echo $email;
#echo $password;
 
$checkid=mysql_query("SELECT * from personal WHERE username='$username' and password='$password' and email='$email'") or die("Could not issue MySQL query");
$records = mysql_num_rows($checkid);

if($records>0){
	 echo "Account Delete Success";

	$sqlstring="delete from personal where username='$username'";
	
	mysql_query($sqlstring);
}else{
	
	echo "Fail to DELETE, wrong password or email";
	return;
}

	?>