<?php
// function OpenCon()
// {
// $dbhost = "localhost";
// $dbuser = "pguser"; 
// $dbpass = "pgpwd";
// $dbname = "first";
// $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connect failed: %s\n". $conn -> error);
// return $conn;
// }
// function CloseCon($conn)
// {
// $conn -> close();
// }
// 
// $dbconn3 = pg_connect("host=localhost port=5432 dbname=first user=pguser password=pgpwd");

$conn_string = "host=localhost port=5432 dbname=first user=pguser password=pgpwd";
$dbconn4 = pg_connect($conn_string);