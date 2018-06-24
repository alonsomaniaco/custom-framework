<?php

use customFramework\helper\doctrine\DoctrineHelper;
use customFramework\helper\twig\TwigHelper;
use customFramework\model\Person;

require_once 'vendor/autoload.php';

$idSelected = $_GET['person'];
$personRepository = DoctrineHelper::getRepository(Person::class);
$person = $personRepository->find($idSelected);

TwigHelper::renderTemplate('person', [
  'Person' => $person,
]);
