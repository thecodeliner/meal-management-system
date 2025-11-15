<?php


use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Routing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\isAccountant;
use App\Http\Middleware\isManager;
use App\Http\Middleware\isMember;
use App\Http\Middleware\isOperations;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'isMember' => isMember::class,
            'isAccountant' => isAccountant::class,
            'isManager' => isManager::class,
            'isOperations' => isOperations::class,



        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
