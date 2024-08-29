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