<?php
#FileName="(Connection_php_mysql.htm)"
#Type="MySQL"
#HTTP="true"

$dbConn = new mysqli("localhost","root","","sample");
if ($dbConn->connect_error){
    die("Connection failed: ". $dbConn->connect_error);
}
?>

