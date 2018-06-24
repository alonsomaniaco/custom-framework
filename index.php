<?php

use customFramework\helper\doctrine\DoctrineHelper;
use customFramework\helper\twig\TwigHelper;
use customFramework\model\Person;

require_once 'vendor/autoload.php';

$personRepository = DoctrineHelper::getRepository(Person::class);
// Get an array of Person to use on foreach.
$allPerson = $personRepository->findAll();
TwigHelper::renderTemplate('index', [
  'Persons' => $allPerson,
]);

