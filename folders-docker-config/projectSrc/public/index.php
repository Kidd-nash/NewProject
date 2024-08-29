<?php
// TO CHECK IF A FORM IS SUBMITTED
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    // if (!isset($_POST['brand'])) {
        header("Location: http://localhost:8080/crud.html");
        die('test');
}

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
    echo nl2br("Connected successfully to the PostgreSQL database!\n\n");
}

// This result is the data from database front the cars
// $result = pg_query($conn, "SELECT * FROM cars");
// $result = pg_query($conn, "INSERT INTO cars (brand, model, year) VALUES ('brand1', 'model1', 2000)");
// $result = pg_query($conn, "DELETE FROM cars WHERE brand=''");
$brand = $_POST['brand'];

$model = $_POST['model'];

$year = $_POST['year'];

$result = pg_query($conn, "INSERT INTO new_cars (brand, model, year) VALUES ('$brand', '$model', '$year');");
// $result = pg_insert(
//     $conn,
//     'new_cars',
//     ['brand' => $brand, 'model' => $model, 'year' => 2000]
// );
    //"INSERT INTO cars (brand, model, year) VALUES ('$brand', '$model', $year, $arr);");


// die("INSERT INTO cars (`brand`, `model`, `year`) VALUES ('$brand', '$model', $year)");
// $identification = $_DELETE[]

if (!$result) {
    echo "An error occurred.\n";
    exit;
}

$arr = [];
$result = pg_query($conn, "SELECT * FROM new_cars");
$arr = pg_fetch_all($result);


// display object / array variable

echo "<pre>" . print_r($arr) . "</pre>"

// die(print_r($arr, true));

// //Close the connection when done
// pg_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trial Data</title>
    </head>
    <body>
        <p>
            <?php 
                print_r($arr);
            ?> 
        </p>
        
        <pre>
            <?php echo print_r($arr, true) ?>
        </pre>


        <table cellspacing="30">
            <thead>
                <col>model</col>
                <col>year</col>
            </thead>
        <?php

        foreach ($arr as $item) {
            echo '<tr>';
            echo '<td>' . $item['model'] . '</td>';
            echo '<td>' . $item['year'] . '</td>';

            echo '<td><a href="http://localhost:8080/delete.php?id=' . $item['id'] . '">DELETE</a></td>';
            echo '</tr>';

            // print_r($item);
            // echo '<br /><br />';
        }
        

        ?>
        </table>
        <form method="get" action="greet_user.php">
            First Name:
            <input type="text" name="first">
            <br>
            Last Name:
            <input type="text" name="last">
            <br>
            <input type="submit" value="Submit">
        </form>

    </body>
</html>

// C reate - INSERT INTO
// R etrieve - SELECT FROM
// U pdate - UPDATE WHERE
// D elete - DELETE FROM WHERE

<form action="index.php" method="POST">
    <input name="model" />
    <input name="model" />
</form>>

<?php

// $brand = $_POST['brand'];

// $model = $_POST['MODEL'];

// $result = pg_query($conn, "INSERT INTO cars (brand, model) VALUES ('$brand', '$model'");


// user1, post1
// user1, post2


// user2, post3
// user2, post4



// order no. , item name, date, seller name


// order table

// products table


// seller table





// CREATE TABLE new_cars (
//     id serial primary key,
//     brand VARCHAR(255),
//     model VARCHAR(255),
//     year INT
//   );


// user table
// id username, password



// posts table
// id, content, createdAt, user_id

// 1, jkl, fdsfds, 1
// 2, fds, fds, 1


// 3, fds, fds, 2



// SELECT * FROM user;

// SELECT * FROM user WHERE id = 1;


// SELECT user.id, user.username, posts.content FROM users LEFT JOIN posts ON (posts.user_id = user.id);








