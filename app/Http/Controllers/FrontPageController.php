<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;
//use mysql_xdevapi\Exception;
use function GuzzleHttp\Promise\all;

class FrontPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }
    /**
     * Draw the application front page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = $this->getAllServices();

        return view('frontpage', compact('services'));
    }

    /**
     * Collect the application services.
     *
     * @return Service[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllServices()
    {
       return Service::all();
    }

    public function deactivate()
    {

    }

}
