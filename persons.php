<?php
$dbObject = new mysqli('db', 'root', '123', 'customFramework');
$idSelected = $_GET['person'];
$results = $dbObject->query('select * from Persons where id = ' . $idSelected);
$person = $results->fetch_assoc();
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Datos de la persona</title>
</head>
<body>
<a href="index.php">Volver</a>
<h1>Datos de <?= $person['name']; ?></h1>
<ul>
    <li>Lastname: <?= $person['lastname']; ?></li>
    <li>Age: <?= $person['age']; ?></li>
    <li>Address: <?= $person['address']; ?></li>
    <li>Telephone: <?= $person['telephone']; ?></li>
</ul>
</body>
</html>
