<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUserIncomplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $isContactModelVol=Auth::user()->documents
                ->where('isContactModelVol','=',1)
                ->count();
        $isInscripModelVol=Auth::user()->documents
                    ->where('isInscripModelVol','=',1)
                    ->count();
        if ($isInscripModelVol == 0 || $isContactModelVol == 0 || Auth::user()->isRegisterComplete == 0 ){
            return $next($request);
        }

        return redirect('home')->with('error','Tu perfil no está completo.');
    }
}
