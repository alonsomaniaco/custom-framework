<?php

require_once 'vendor/autoload.php';

$dbObject = new mysqli('db', 'root', '123', 'customFramework');

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listado de personas</title>
</head>
<body>
<h1>Listado de personas</h1>
<ul>
  <?php
  $result = $dbObject->query('select * from Persons;');
  foreach ($result as $row) {
    echo "<li><a href='persons.php?person=" . $row['id'] . "'>" . $row['name'] . "</a></li>";
  }
  ?>
</ul>
</body>
</html>
