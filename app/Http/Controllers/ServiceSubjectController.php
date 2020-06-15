<?php

namespace App\Http\Controllers;

use App\ServiceSubject;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
//use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Database\Eloquent\Collection;

class ServiceSubjectController extends Controller
{
    private array $dump;

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::FRONT;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = ServiceSubject::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'amount' => 'required',
            'dimension' => 'required',
        ]);

        ServiceSubject::create( $request->all() );

        return redirect()->route('frontpage')
            ->with('success', 'Добавлено');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceSubject $service
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceSubject $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceSubject $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(ServiceSubject $service)
    {
        $dimensions = $this->getAllUniqAttributes('dimension');
        return view('services.edit')
            ->with('service', $service)
            ->with('dimensions', $dimensions);


//        return view('services.edit', ['service' => $service,])->with($uniqDimensions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\ServiceSubject $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ServiceSubject $service)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'amount' => 'required',
            'dimension' => 'required',
        ]);

        $service->update($request->all());

        return redirect()->route('frontpage')
            ->with('success','Правки внесены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ServiceSubject $service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(ServiceSubject $service)
    {
        $service->delete();

        return redirect()->route('frontpage')
            ->with('success','Удалено');
    }


    /**
     * Return all uniq dimensions from storage.
     *
     * @param string $columnName
     * @return ServiceSubject[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllUniqAttributes( string $columnName)
    {
        $unique = [];
        //$collection = ServiceSubject::all($columnName);

        foreach ( ServiceSubject::all($columnName) as $attr) {
            $unique[] = $attr->dimension;
        }

        return array_unique($unique);
    }


    /**
     * Import services data to DB
     *
     * @param string $names
     * @param string $prices
     * @param string $dimensions
     * @return array
     */
    public function import(
//        string $names, string $prices, string $dimensions
    )
    {
$names = "установка батареи отопления
подключение батареи
прокладка металлопластиковых труб отопления
прокладка полипропиленовых труб отопления
прокладка медных труб отопления
устройство стояков
монтаж коллектора
испытание системы давлением
установка настенного двухконтурного котла
установка настенного одноконтурного котла с бойлером
установка конденсационного котла
установка твердотопливного котла (согласно проекту)
установка пеллетного котла (со сборкой бункера)
установка электрокотла
запуск котла
монтаж насоса
монтаж автоматики для насосной станции
промывка батареи отопления
запуск системы отопления
сборка дымохода котла в котельной
установка электро датчика (бойлер, наружный, температур)
установка контролера или комнатного термостата
установка дополнительного термостата в бойлер
прокладка труб сшитый полиэтилен
опрессовка фитингов сшитый полиэтилен
монтаж газовой колонки
перенос радиатора отопления
монтаж гидрострелки отопления
монтаж бойлера косвенного нагрева до 300 л.
обвязка котельной медью
монтаж насосной группы
монтаж колектора отопления
монтаж трубы дымохода турбированого (без отверстия)
обвязка котельной до 40 квт (под ключ)
изготовление и подключение гребенки отопления до 5 контуров
установка и подключение гребенки свыше 5 контуров
прокладка металлопластиковых труб отопления ø55-63
прокладка полипропиленовых труб отопления ø55-63
установка настенного двухконтурного газового котла 32 -100 квт
монтаж котла напольного газового 55 -100квт
установка электрокотла 28-60 квт
установка твердотопливного котла 55-100 квт
монтаж бойлера косвенного нагрева свыше 300 л.
монтаж буферной емкости длятт котла
изготовление сложного узла, полипропилен
сверление отверстия d20
перепаковка батарей";

$prices = "1030
502
66
76
102
948
1326
801
1982
2986
2470
4885
6981
1926
805
700
595
280
935
1202
397
423
390
42
78
1146
1047
1281
2284
44000
1500
1106
497
49278
1373
2162
92
97
3315
6657
3805
7942
4002
3725
1020
720
320";

$dimensions="шт.
 шт.
 м.пог.
 м.пог.
 м.пог.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 м.пог.
 м²
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
 м.пог.
 м.пог.
 шт.
 шт.
 шт.
 шт.
 шт.
 шт.
шт
шт
шт";

$fix = "UPDATE service_subjects SET `dimension` = `шт.` WHERE (`dimension` like `шт`);";
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
                ServiceSubject::create([
                    'name' => trim($nameArr[$i]),
                    'amount' => floatval($priceArr[$i]),
                    'dimension' => trim($dimensionArr[$i]),
                ]);
            }

            var_dump($dump);die();
        }
    }












}
