<?php

use customFramework\helper\doctrine\DoctrineHelper;
use customFramework\model\Person;

require_once 'vendor/autoload.php';

$personRepository = DoctrineHelper::getRepository(Person::class);

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
  // Get an array of Person to use on foreach.
  $allPerson = $personRepository->findAll();
  foreach ($allPerson as $person) {
    echo "<li><a href='persons.php?person=" . $person->getId() . "'>" . $person->getName() . "</a></li>";
  }
  ?>
</ul>
</body>
</html>
