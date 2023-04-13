<?php

namespace PwaBlui\Middleware;

use Illuminate\Http\Request;

class CheckTokenAndAddToHeaderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, \Closure $next)
    {
        $all = $request->all();

        if (isset($all['_token'])) {
            $request->headers->set('Authorization', sprintf('%s %s', 'Bearer', $all['_token']));
        }

        return $next($request);
    }
}
