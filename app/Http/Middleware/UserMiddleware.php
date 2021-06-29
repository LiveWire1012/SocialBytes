<?php

namespace App\Http\Middleware;

use App\Helpers\ResponseHelper;
use App\Models\Users;
use Closure;

class UserMiddleware
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
        $user = Users::where('id',$request->id)->first();
        if(empty($user)) {
            return ResponseHelper::error("User Not Found");
        }
        return $next($request);
    }
}
