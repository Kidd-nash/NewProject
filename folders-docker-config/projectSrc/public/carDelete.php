<?php 
    ob_start();

    include_once("./connection.php");

    $deleteId = $_GET["deleteId"] ?? null;

    echo "Deleting Car data id:" . $deleteId;
    
    $result = pg_query($conn, "DELETE FROM new_cars WHERE id = $deleteId");

    ob_end_clean();

    header("Location: http://localhost:8080/home.php");
    die();
?>