<?php

$title = 'index page';

ob_start();
echo '<h3>heading fro echo</h3>';
?>
<h1>heading one</h1>
<p>this is the page content</p>
<?php
$pageContent = ob_get_clean();


include_once('./layout.php');