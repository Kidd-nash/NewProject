<?php

$host = "db_postgres_lab";   // Hostname of the database server/database container name
$port = "5432";        // Default port for PostgreSQL
$dbname = "first";  // Database name
$user = "pguser";  // Database username
$password = "pgpwd";  // Database password

// Create a connection string
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Connect to PostgreSQL
$conn = pg_connect($conn_string);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . pg_last_error());
} 
// else {
//     echo nl2br("Connected successfully to the PostgreSQL database!\n\n");
// }

$editId = $_POST['editId'] ?? false;


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? false; 

    $series = $_POST['series'] ?? false;

    $year = $_POST['year'] ?? false;

    if ($name == false || $series == false || $year == false) {

    } else {
        if ($editId !== false) {
            $result = pg_query($conn, "UPDATE RG_Gundam SET name = '$name', series = '$series', year = null WHERE gundamid = '$editId'");
        } else {
            $result = pg_query($conn, "INSERT INTO RG_Gundam (name, series, year) VALUES ('$name', '$series', '$year');");
        }
    }

}

$result = pg_query($conn, "SELECT * FROM RG_Gundam");
if (!$result) {
    echo "An error occurred.\n";
    exit;
}

$arr = [];

$arr = pg_fetch_all($result);



// temp
$gundamId = $_GET['id'] ?? false;

$operation = $_GET['operation'] ?? false;

if ($operation === 'delete' && $gundamId !== false) {
    
    pg_query($conn, "DELETE FROM RG_Gundam WHERE gundamid = $gundamId");
    
}

if ($operation === 'edit' && $gundamId !== false) {
    
   

   $result = pg_query($conn, "SELECT * FROM RG_Gundam WHERE gundamid = $gundamId");

   $gundam = pg_fetch_assoc($result);
    
//     var_dump($gundam);

//    die(print_r($gundam, true));

   $name = $gundam["name"];

   $series = $gundam["series"];

   $year = $gundam["year"];

//    echo $name;
}


include_once('./crud_template.php');

// die($operation);

// pascalb case    PascalCase
// camel case      camelCase
// snake case      snake_case   SNAKE_CASE



