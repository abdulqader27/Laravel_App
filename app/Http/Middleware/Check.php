<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Check
{

    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->Admin == "1")
        {
            return $next($request);
        }else
        {
            return \response('something went error');
        }


    }
}
