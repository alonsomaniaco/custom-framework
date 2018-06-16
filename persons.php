<?php

use customFramework\helper\doctrine\DoctrineHelper;
use customFramework\model\Person;

require_once 'vendor/autoload.php';

$idSelected = $_GET['person'];
$personRepository = DoctrineHelper::getRepository(Person::class);
$person = $personRepository->find($idSelected);
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Datos de la persona</title>
</head>
<body>
<a href="index.php">Volver</a>
<h1>Datos de <?= $person->getName(); ?></h1>
<ul>
    <li>Lastname: <?= $person->getLastName(); ?></li>
    <li>Age: <?= $person->getAge(); ?></li>
    <li>Address: <?= $person->getAddress(); ?></li>
    <li>Telephone: <?= $person->getTelephone(); ?></li>
</ul>
</body>
</html>
