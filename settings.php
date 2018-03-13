<?php
$username = "root";
$password = "T4k3 0ff, eh?";
$database = "BlazeCoin";
$server = "localhost";
$table = "Admin";
/*root pw for phpmyadmin is root and VM password
T4k3 0ff, eh? for root user
*/
$db = mysqli_connect($server, $username, $password, $database);
if(!$db){
	die("Database Connection Failed".mysqli_error($db));
}
?> 