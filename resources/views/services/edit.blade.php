@extends('layouts.app')

@section('content')
    {{--    @parent--}}

    <div class="container">
        <div class="row">
            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Пиздец!</strong> Хюстон-Хюстон!!! У нас проблемы...<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="">
                <form action="{{ route('services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group ">
                        <label for="serviceSubjectName">Название деятельности</label>
                        <textarea name="name" class="form-control" id="serviceSubjectName" rows="3" >{{ $service->name }}</textarea>
                        <small class="form-text text-muted">Краткое описмание работы, ньюансов и преймуществ</small>
                    </div>

                    <div class="form-group ">
                        <div class="form-row">
                            <div class="col-5">
                                <label for="aaa" class="col-form-label">Цена</label>
                                <div class="input-group">
{{--                                    <div class="input-group-prepend"><span class="input-group-text">грн</span></div>--}}
                                    <input name="amount" value="{{ $service->amount }}" type="text" class="form-control" id="aaa" aria-label="Округлите">
{{--                                    <div class="input-group-append"><span class="input-group-text">.00 грн</span></div>--}}
                                    <div class="input-group-apppend"><span class="input-group-text">грн</span></div>
                                </div>
                                <small class="form-text text-muted">Стоимость выполненой работы в грн</small>
                            </div>

                            <div class="col-2"></div>

                            <div class="col-5">
                                <label class="col-form-label" for="dimension">Размерность</label>
                                <div class="input-group btn-group">
                                        <select name="dimension" class="form-control" id="dimension">
                                            <option value="undefined" selected disabled>--</option>
                                            @foreach($dimensions as $key => $dimension)
                                                <option value="{{$dimension}}"
                                                @if ($service->dimension == $dimension)
                                                    selected="selected"
                                                @endif
                                                >{{$dimension}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <small class="form-text text-muted">Выберите эдиницы размерности</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">
                                    Редактировать
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
