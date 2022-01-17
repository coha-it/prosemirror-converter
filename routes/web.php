<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () {
    // return $renderer->render('<p>Example Text</p>');
    //return $router->app->version();

    $renderer = (new \HtmlToProseMirror\Renderer);
	return $renderer->render(request()->data);
});
