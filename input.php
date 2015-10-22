<?php

define('DB_NAME', 'beer');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');

$link = mysql_connect (DB_HOST, DB_USER, DB_PASSWORD);

if (!$link) {
  die ('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link);

if (!$db_selected){
  die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
}

$value = $_POST['beer'];
$value2 = $_POST['brewery'];
$value3 = $_POST['city'];
$value4 = $_POST['state_country'];
$value5 = $_POST['type'];
$value6 = $_POST['style'];
$value7 = $_POST['abv'];
$value8 = $_POST['rating'];
$value9 = $_POST['comments'];

$sql = "INSERT INTO beer_table (beer, brewery, city, state_country, type, style, abv, rating, comments) VALUES ('$value' , '$value2' , '$value3' , '$value4' , '$value5' , '$value6' , '$value7' , '$value8' , '$value9')";

if (!mysql_query($sql)) {
  die('Error: ' . mysql_error());
}

mysql_close();

?>