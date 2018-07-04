<?php


namespace customFramework\helper\routing;


use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/**
 * Manage routes of the system.
 *
 * Class RoutingHelper.
 *
 * @package customFramework\helper\routing
 */
class RoutingHelper {

  /**
   * Get complete list of routes on website.
   *
   * @return RouteCollection
   */
  public static function getCompleteRouteCollection() {
    $routePerson = new Route('/person/{id}', [
      '_controller' => 'customFramework\controller\PersonsController::getPersonAction',
    ],[
      'id' => '\d+',
    ]);
    $routeIndex = new Route('/', [
      '_controller' => 'customFramework\controller\PersonsController::indexAction',
    ]);
    $routes = new RouteCollection();
    $routes->add('person', $routePerson);
    $routes->add('index', $routeIndex);

    return $routes;
  }

}