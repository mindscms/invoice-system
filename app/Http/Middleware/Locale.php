<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Locale
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
        if (config('locale.status')) {

            if (Session::has('locale') && array_key_exists(Session::get('locale'), config('locale.languages'))) {

                App::setLocale(Session::get('locale'));

            } else {

                $userLanguages = preg_split('/[,;]/', $request->server('HTTP_ACCEPT_LANGUAGE'));
                foreach ($userLanguages as $language) {

                    if (array_key_exists($language, config('locale.languages'))) {
                        App::setLocale($language);

                        setlocale(LC_TIME, config('locale.languages')[$language][2]);

                        Carbon::setLocale(config('locale.languages')[$language][0]);

                        if (config('locale.languages')[$language][2]) {
                            \session(['lang-rtl' => true]);
                        } else {
                            Session::forget('lang-rtl');
                        }

                        break;
                    }

                }

            }

        }

        return $next($request);
    }
}
