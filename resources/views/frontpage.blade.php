@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="front-title text-center">
                    {{ __('Прайс строительных работ') }}
                </h1>

                <h2 class="second-front-title text-center">
                    {{ __('Сантехника, отопление, фильтра') }}
                </h2>

                @if ($message = Session::get('success'))
                    <div style="width: 25%;" class="alert alert-success text-center">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <!-- Draw the table of ServiceSubjects -->
                <div class="table-responsive">
                <table id="service-subjects-table" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th class="align-middle text-center" scope="col">
                                <span class="table-content-text">
                                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                                </span>
                            </th>
                            <th class="align-middle text-center" scope="col">
                                <span class="table-content-text">{{ __('Наименование') }}</span>
                            </th>
                            <th class="align-middle text-center" scope="col">
                                <span class="table-content-text">{{ __('Цена') }}</span>
                            </th>
                            @if (Route::has('login'))
                                @auth
                                    <th scope="col">
                                        <div>
                                            <a class="btn btn-primary" href="{{ url('/services/create') }}" title="{{ __('Добавить услугу') }}">
                                                <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </th>
                                @endauth
                            @endif
                        </tr>
                    </thead>

                    <tbody class="">
                    @foreach ($services as $service)
                        <tr class="table-row">
                            <th scope="row" class="align-middle text-center">
                                <span class="table-number-text">
                                    {{ $service->id }}
                                </span>
                            </th>
                            <td class="align-middle">
                                <div>
                                    <span class="table-content-text">
                                        <i style="color: #f9c00c;" class="fa fa-folder-open" aria-hidden="true"></i>
                                        {{--First letter to upper ucfirst() analog--}}
                                        {{ mb_strtoupper(mb_substr($service->name, 0, 1)).mb_strtolower(mb_substr($service->name, 1)) }}
                                    </span>
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <span class="table-content-text">
                                    <span class="price-text">{{ $service->amount }}</span><br>
                                    <span class="dimension-text text-muted">{{ __('грн') }}&nbsp;/&nbsp;{{ $service->dimension }}</span>
                                </span>
                            </td>
                            @if (Route::has('login'))
                                @auth
                                    <td class="align-middle text-center">
                                        <div>
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <a class="btn btn-primary" href="{{ route('services.edit', $service->id) }}">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
