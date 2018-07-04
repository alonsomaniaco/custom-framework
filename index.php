<?php

use customFramework\helper\twig\TwigHelper;
use customFramework\kernel\CustomFrameworkHttpKernel;
use Symfony\Component\HttpFoundation\Request;

require_once 'vendor/autoload.php';

try {
  $request = Request::createFromGlobals();
  $kernel = CustomFrameworkHttpKernel::getInstance();
  $response = $kernel->handle($request);
  $response->send();
} catch (Exception $e) {
  echo TwigHelper::renderTemplate('error', array(
    'message' => $e->getMessage(),
    'stackTrace' => $e->getTraceAsString(), $e->getTrace()
  ));
}

