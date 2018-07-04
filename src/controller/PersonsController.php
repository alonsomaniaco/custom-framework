<?php

namespace customFramework\controller;


use customFramework\helper\doctrine\DoctrineHelper;
use customFramework\helper\twig\TwigHelper;
use customFramework\model\Person;
use Symfony\Component\HttpFoundation\Response;

/**
 * Contains the Person actions.
 * Class PersonsController.
 *
 * @package customFramework\controller
 */
class PersonsController {

  /**
   * Manage the index route.
   *
   * @return Response
   */
  public function indexAction() {
    $personRepository = DoctrineHelper::getRepository(Person::class);
    // Get an array of Person to use on foreach.
    $allPerson = $personRepository->findAll();
    $templateContent = TwigHelper::renderTemplate('index', [
      'Persons' => $allPerson,
    ]);

    return new Response($templateContent);
  }

  /**
   * Manage the getPerson route.
   *
   * @param integer $id
   *
   * @return Response
   */
  public function getPersonAction($id = NULL) {
    $personRepository = DoctrineHelper::getRepository(Person::class);
    $person = $personRepository->find($id);

    $templateContent = TwigHelper::renderTemplate('person', [
      'Person' => $person,
    ]);

    return new Response($templateContent);
  }

}