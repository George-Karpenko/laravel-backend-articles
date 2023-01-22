<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class VerifyArticle
{
    /**
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request    $request
     * @param \Closure   $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request);
        if ($this->auth->user()->author) {
            return $next($request);
        }

        return redirect()->route('home')->with('status', [
            "title" => __('redirection'),
            "text" => __('To go to the page, create an author!')
        ]);
    }
}
