<?php

namespace Step2dev\LazySeoTools\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Step2dev\LazySeoTools\Models\SeoRedirect;
use Symfony\Component\HttpFoundation\Response;

class HandleSeoRedirects
{
    public function handle(Request $request, Closure $next)
    {
        $redirect = SeoRedirect::where('old_url', $request->path())->first();

        if ($redirect) {
            if ($redirect->status_code == 410) {
                abort(410, 'Gone');
            }

            return redirect($redirect->new_url, $redirect->status_code);
        }

        return $next($request);
    }
}
