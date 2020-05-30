@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Контент вьюхи "frontpage"</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>{{ __('Стоимость строительных работ') }}</p>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <!-- Draw table of ServiceSubjects -->
                <table id="servicesTable" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
{{--                        <th scope="col">#</th>--}}
                        <th scope="col">
                            <span>{{ __('Описание услуги') }}</span>
                        </th>
                        <th scope="col">
                            <span>{{ __('Цена, грн') }}</span>
                        </th>
                        @if (Route::has('login'))
                            @auth
                                <th scope="col">
                                    <a class="btn btn-primary" href="{{ url('/services/create') }}">
{{--                                    <a class="btn btn-primary" href="/services/create">--}}
                                        <span class="">{{ __('Добавить') }}</span>
                                    </a>
                                </th>
                            @endauth
                        @endif
                    </tr>
                    </thead>
                    <tbody class="">
                    @foreach ($services as $service)
                        <tr>
{{--                            <th scope="row">{{ $service->id }}</th>--}}
                            <td><span class="">{{ $service->name }}</span></td>
                            <td class="text-center">
                                <span>{{ $service->amount }}</span><br>
                                <span class="text-muted">{{ __('грн') }}&nbsp;/&nbsp;{{ $service->dimension }}</span>
                            </td>
                            @if (Route::has('login'))
                                @auth
                                    <td>
                                        <form action="{{ route('services.destroy', $service->id) }}" method="POST">
{{--                                            <a class="btn btn-primary" href="{{ route('services.show',$service->id) }}">Инфо</a>--}}
                                            <a class="btn btn-primary" href="{{ route('services.edit', $service->id) }}">Изменить</a>
{{--                                            <a class="btn btn-primary" href="{{ route('deactivate',$service->id) }}">Скрыть</a>--}}
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-outline-secondary">Удалиьт</button>
                                        </form>
                                    </td>
{{--                                @else--}}
{{--                                    <a href="{{ route('login') }}">Войти</a>--}}
{{--                                    @if (Route::has('register'))--}}
{{--                                    <a href="{{ route('register') }}">Зарегистрироваться</a>--}}
{{--                                @endif--}}
                                @endauth
                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{{--    @yield('services')--}}
@endsection
