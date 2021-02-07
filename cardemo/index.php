<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>eg_php-basic</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div>
      <h2>Have We DB?</h2>
      <?php include "config.php" ?>
      <hr />
    </div>
    <div>
      <h2>Display One Entry</h2>
      <?php
        $query = "SELECT make, model, year FROM cars";
        $result = $mysqli->query($query);
        /* associative array */
        $row = $result->fetch_array(MYSQLI_ASSOC);
        printf ("%d %s %s\n", $row["year"], $row["make"], $row["model"]);
        echo "<p>My top pick is a " . $row["year"] . " " . $row["make"] . " " . $row["model"] . ". </p>";
        $mysqli -> close();
      ?>
      <hr />
    </div>
    <div>
      <h2>Display All Entries</h2>
      <ul>
        <?php
          $con = new mysqli("localhost", $dbuser, $dbpass, $dbname);
          $call = "SELECT make, model, year FROM cars";
          $answer = $con->query($call);
          while ($line = $answer->fetch_array(MYSQLI_ASSOC)) {
            echo "<li><strong>" . $line["make"] . " " . $line["model"] . "</strong> (" . $line["year"] . ")" . ". </li>";
          }
          $con -> close();
        ?>
      </ul>
      <hr />
    </div>
  </body>
</html>
