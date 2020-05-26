<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private array $dump;
    /**
     * Display a listing of the resource.
     *
//     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services =  Service::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }

    /**
     * Import services data to DB
     *
     * @param string $names
     * @param string $prices
     * @param string $dimensions
     * @return array
     */
    public function import(string $names, string $prices, string $dimensions)
    {
        $nameArr = explode(PHP_EOL, $names);
        $priceArr = explode(PHP_EOL, $prices);
        $dimensionArr = explode(PHP_EOL, $dimensions);

        if (count($nameArr) === count($priceArr) &&
            count($priceArr) === count($dimensionArr)){

            $dump = [];
            $n = count($nameArr)-1;

            for ($i = 0; $i <= $n; $i++) {
                $dump[$i] = [
                    trim($nameArr[$i]),
                    floatval($priceArr[$i]),
                    trim($dimensionArr[$i])
                ];
            }
//            return view('services.create');
            return $this->dump;
        }
    }
}
