<?php
require "classes/conn.php";
require "classes/meli.php";

$code = mysql_real_escape_string($_GET['code']);


$login = new Authentication();
$login->Login($code);
?>