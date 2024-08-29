<?php

$page_title = 'Trial';

ob_start();
?>
    <h1>Trial Heading</h1>
    <p>paragraph trial</p>
    <a href="http://localhost:8080/trial/log_in.php">Log In</a>
<?php
$page_content = ob_get_clean();


include_once('./lay_out.php');