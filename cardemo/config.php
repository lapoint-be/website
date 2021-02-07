<?php
  // In this example, important values are stored in plaintext.
  // Don't do this in live production! Instead, these values are
  // usually stored as environmental variables some place safe.
  $dbname = "cars";
  $dbuser = "phpdemo";
  $dbpass = "i#like#cars";

  //opens a new mysqli connection (the preferred method today)
  $mysqli = new mysqli("localhost", $dbuser, $dbpass, $dbname);

  /* check connection */
  if ($mysqli->connect_errno) {
      printf("<p class=\"error\">Connect failed: %s</p>", $mysqli->connect_error);
      exit();
  }
  else {
    echo "<p class=\"success\">You've managed to connect to the " . $dbname . " database somehow. Have a nice day!</p>";
  }
?>
