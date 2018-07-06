<?php

namespace customFramework\helper\config;


use Symfony\Component\Yaml\Yaml;

/**
 * Manage system configurations.
 *
 * Class ConfigHelper.
 *
 * @package customFramework\helper\config
 */
class ConfigHelper {

  /**
   * Return values for specific configuration.
   *
   * @param string $type
   *
   * @return mixed
   */
  public static function getConfigParameters($type = NULL) {
    $configurations = Yaml::parseFile(getcwd() . '/src/config/parameters.yml');
    if (!empty($type) && isset($configurations[$type])) {
      $configurations = $configurations[$type];
    }
    return $configurations;
  }

}