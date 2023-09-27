<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockByIp
{
    protected $blocked = [ '127.0.0.0' ];

    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->getClientIp(), $this->blocked)) {
            abort(403);
        }
        return $next($request);
    }
}
