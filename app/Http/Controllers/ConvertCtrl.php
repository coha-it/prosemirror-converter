<?php

namespace App\Http\Controllers;

class ConvertCtrl extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function httpRequest() {
        // return $renderer->render('<p>Example Text</p>');
        // return $router->app->version();

        $renderer = (new \HtmlToProseMirror\Renderer);
        return $renderer->render(request()->data ?? '<span></span>');
    }
}
