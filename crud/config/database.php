<?php
$db_name = "grocery";
$username = "cruduser";
$password = "this#is#for#lists";

//opens a new mysqli connection (the preferred method today)
$mysqli = new mysqli("localhost", $dbuser, $dbpass, $dbname);

/* check connection */
if ($mysqli->connect_errno) {
    printf("<p class=\"error\">Connect failed: %s</p>", $mysqli->connect_error);
}
else {}
?>
