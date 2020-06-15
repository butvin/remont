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

                <div class="table-responsive">
                <table id="servicesTable" class="table table-bordered table-striped table-hover {{-- table-responsive --}}">
                    <thead class="thead-dark">
                    <tr class="">
                        <th class="align-middle text-center" scope="col">#</th>
                        <th class="align-middle text-center" scope="col">
                            {{ __('Описание услуги') }}
                        </th>
                        <th class="align-middle text-center" scope="col">
                            {{ __('Цена, грн') }}
                        </th>
                        @if (Route::has('login'))
                            {{-- Add a new subject service element--}}
                            @auth
                                <th scope="col">
                                    <a class="btn btn-primary" href="{{ url('/services/create') }}">
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
                            <th class="align-middle text-center" scope="row">{{ $service->id }}</th>
                            <td class="align-middle" >{{ $service->name }}</td>
                            <td class="align-middle text-center">
                                <strong>{{ $service->amount }}</strong><br>
                                <span class="text-muted">{{ __('грн') }}&nbsp;/&nbsp;{{ $service->dimension }}</span>
                            </td>
                            @if (Route::has('login'))
                                @auth
                                    <td class="align-middle text-center">
                                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" class=" ">
                                            <ul class="navbar-nav mr-auto">
                                                <li class="nav-item">
                                                    <div class="">
                                                        <a class="btn btn-primary" href="{{ route('services.edit', $service->id) }}">
                                                            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <div class="">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning" value="{{ route('services.destroy', $service->id) }}">
                                                            <i class="fa fa-digg fa-2x" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <div class="">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                    </td>
                                @endauth
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
