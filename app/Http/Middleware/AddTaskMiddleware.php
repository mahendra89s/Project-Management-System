<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AddTaskMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->id == Session::get('project_id'))
        {
            return $next($request);
        }
        else{
            toastr()->warning('Access denied!!!');
            return redirect()->back();
        }
    }
}
