<?php 
echo "echo";
// $conn_string = "host=localhost port=5432 dbname=first user=pguser password=pgpwd";
// $dbconn4 = pg_connect($conn_string);



// 
// if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
//     echo 'We don\'t have mysqli!!!';
// } else {
//     echo 'Phew we have it!';
// }
// if ($mysqli->ping()) {
//     printf ("Our connection is ok!\n");  
//   } else {
//     printf ("Error: %s\n", $mysqli->error); 
//   }
// include 'db_connection.php';
// $conn = OpenCon();
// echo "Connected Successfully";
// CloseCon($conn);
// Database connection parameters
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
} else {
    echo nl2br("\nConnected successfully to the PostgreSQL database!\n");
}

$result = pg_query($conn, "SELECT * FROM cars");
if (!$result) {
    echo "An error occurred.\n";
    exit;
}

$arr = pg_fetch_all($result);

print_r($arr);

//Close the connection when done
pg_close($conn);
//  pg_close() and $sql_varialbe -> close() has the some purpose, after making connection, close the connection to database 
//  after a specific line/chunk of code
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>Cars Trial Data</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <!-- <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style> -->
</head>
 
<body>
    <section>
        <h1>Cars</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php 
                // LOOP TILL END OF DATA
                $host = "db_postgres_lab";   // Hostname of the database server/database container name
                $port = "5432";        // Default port for PostgreSQL
                $dbname = "first";  // Database name
                $user = "pguser";  // Database username
                $password = "pgpwd";  // Database password
                $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
                $conn = pg_connect($conn_string);
                $result = pg_query($conn, "SELECT * FROM cars");
                while($rows=pg_fetch_all($result))
                {

            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows ?></td>
                <td><?php echo $rows ?></td>
                <td><?php echo $rows ?></td>
            </tr>
            <?php
                }
                pg_close($conn);
            ?>
        </table>
        <p><?php  ?></p>
    </section>
</body>
 
</html>
