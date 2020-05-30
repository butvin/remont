<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceSubject;



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
        $services = $this->getAllServiceSubjects();
        return view('frontpage', compact('services'));
    }

    /**
     * Collect the application services.
     *
     * @return ServiceSubject[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllServiceSubjects()
    {
       return ServiceSubject::all();
    }

    public function deactivate()
    {

    }

}
