<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $uri = $request->path(); // returns "home" is current path
//        dd($request);
        $url = $request->url();
//        echo $url;

        $fullurl = $request->fullUrl(); // http://127.0.0.1:8000/home
        $host = $request->host();   // 127.0.0.1
        $hthost = $request->httpHost();  // 127.0.0.1:8000
        $schhost = $request->schemeAndHttpHost();   // http://127.0.0.1:8000
        $method = $request->method();   // GET
        $value = $request->header('X-Header-Name');
        $token = $request->bearerToken();
//        dd($request);


        return view('home');
    }
}
