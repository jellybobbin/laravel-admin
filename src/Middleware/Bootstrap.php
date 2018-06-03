<?php

namespace JellyBobbin\Admin\Middleware;

use JellyBobbin\Admin\Form;
use JellyBobbin\Admin\Grid;
use Illuminate\Http\Request;

class Bootstrap
{
    public function handle(Request $request, \Closure $next)
    {
        Form::registerBuiltinFields();
        if (file_exists($bootstrap = config('admin.bootstrap'))) {
            require $bootstrap;
        }

        Form::collectFieldAssets();

        Grid::registerColumnDisplayer();

        return $next($request);
    }
}
