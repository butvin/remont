@extends('frontpage')

@section('services')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{ __('Стоимость строительных работ') }}</h1>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table id="serviceTable" class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">
                            <span>{{ __('Описание услуги') }}</span>
                        </th>
                        <th scope="col">
                            <span>{{ __('Стоимость, грн') }}</span>
                        </th>
                        <th scope="col">
                            <span>
                                {{ __('Управление') }}
                                 <a class="btn btn-primary" href="{{ route('services.create') }}">
                                     <span class="">{{ __('Создать новый вид услуги') }}</span>
                                 </a>
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody class="">
                @foreach ($services as $service)
                    <tr>
                        <th scope="row">{{ $service->id }}</th>
{{--                        <td>{{ $service->id }}</td>--}}
                        <td>{{ $service->name }}</td>
                        <td>
                            <span class="h4">{{ $service->amount }}</span>
                            <span class="h6">{{ __('грн') }}/{{ $service->dimension }}</span>
                        </td>
                        <td>
                            <form action="{{ route('services.destroy',$service->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('services.show',$service->id) }}">Инфо</a>
                                <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Изменить</a>
                                <a class="btn btn-primary" href="{{ route('deactivate',$service->id) }}">Скрыть</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Удалиьт</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
