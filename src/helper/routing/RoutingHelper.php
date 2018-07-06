<?php


namespace customFramework\helper\routing;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Routing\Loader\YamlFileLoader;
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
    $routes = new RouteCollection();

    $yamlLocations = [
      getcwd() . '/src/routing'
    ];

    // Initialize components to load Yamls.
    $fileLocator = new FileLocator();
    $yamlFileLoader = new YamlFileLoader($fileLocator);

    // Filter directories to only use Yamls.
    $finder = new Finder();
    $finder->files()->in($yamlLocations)->name('*.yml');

    // Iterate along the Yaml directory to load each file.
    foreach ($finder as $file) {
      // Load Yaml configuration and getting all routes.
      $newRoutes = $yamlFileLoader->load($file->getRealPath());
      // Add loaded routes to our collection.
      $routes->addCollection($newRoutes);
    }

    return $routes;
  }

}