<?php


namespace customFramework\helper\twig;


class TwigHelper {

  /**
   * @var \Twig_Environment $twigRender
   * Singleton var to avoid multiple twigrender instances.
   */
  protected static $twigRender = NULL;

  /**
   * Initialize twigRender if is not created before.
   *
   * @return \Twig_Environment
   */
  public static function getTwigRender() {
    // Check if render exists.
    if (empty(self::$twigRender)) {
      // Load directory of templates.
      $loader = new \Twig_Loader_Filesystem(getcwd() . '/src/templates');
      // Initialize environment with custom configurations.
      self::$twigRender = new \Twig_Environment($loader, array(
        'cache' =>  getcwd() . '/src/cache',
        'autoescape' => TRUE,
      ));
    }
    return self::$twigRender;
  }

  /**
   * Render template and returns it content.
   *
   * @param $templateName
   *   Template file name.
   * @param array $variables
   *   Variables to include on template.
   *
   * @return string
   *  Template content.
   */
  public static function renderTemplate($templateName, $variables = array()) {
    $twigRender = self::getTwigRender();
    $renderedContent = '';
    try {
      $renderedContent = $twigRender->render($templateName . '.twig', $variables);
    } catch (\Twig_Error $e) {
      // we can include any php log for our application.
    }
    return $renderedContent;
  }
}