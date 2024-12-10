<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyUpdatedPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $teacher = Auth::user();
    
        if ($teacher && $teacher->precisa_atualizar_senha) {
            return redirect('/teacher/atualizar-senha');
        }
    
        return $next($request);
    }
    
}
