<?php 
ob_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once("./connection.php");

    $id = $_POST["id"] ?? null;
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $year = $_POST["year"];

    // TODO: add validation

    $result = pg_query($conn, "UPDATE new_cars SET brand = '$brand', model = '$model', year = $year WHERE id = '$id'");

}
ob_end_clean();
header("Location: http://localhost:8080/home.php");
die();

?>