<?php
$hostname = "127.0.0.1";
$username = "root";
$password ="123456";
$connection = mysql_connect($hostname, $username, $password) or die ("Could not open connection to database");
mysql_select_db("test", $connection) or die("Could not select database");

$method = $_SERVER['REQUEST_METHOD'];




$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];

$checkid=mysql_query("SELECT * from personal WHERE username='$username'") or die ("Could not issue MySQL query");

$records = mysql_num_rows($checkid);

if($records>0){
	
	echo "Duplicate Username";
	return;
	
}else{
	echo "Thank you for your registration";
	$sqlstring="insert into personal (username,password,email) values ('$username', '$password','$email')";
	
	mysql_query($sqlstring);
}
?>