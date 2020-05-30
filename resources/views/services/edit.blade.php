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


                    <div class="form-group col">
                        <div class="">
                            <label for="nnn" class="col-form-label">Название работы</label>
                            <input name="name" value="{{ $service->name }}" type="text" class="form-control" id="nnn" placeholder="доьавьте названиие">
                            <small class="form-text text-muted">Это название для  работы, которое отобразиться в списке</small>
                        </div>
                    </div>


                    <div class="form-group col">
                        <label for="serviceSubjectDesc">Краткое описмание</label>
                        <textarea name="description" class="form-control" id="serviceSubjectDesc" rows="2">{{ $service->description }}</textarea>
                        <small class="form-text text-muted">Это поле для краткого описания работы, ньюансов, преймуществ и недостатков.</small>
                    </div>


                    <div class="form-group col">
                        <div class="form-row">
                            <div class="col-5">
                                <label for="aaa" class="col-form-label">Стоимость</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                    <input name="amount" value="{{ $service->amount }}" type="text" class="form-control" id="aaa" aria-label="Округлите">
                                    <div class="input-group-append"><span class="input-group-text">.00 грн</span></div>
                                </div>
                                <small class="form-text text-muted">Количество денег за эдиницу измерения</small>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                <label for="aaa" class="col-form-label">Эдиницы измерения</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend"><span class="input-group-text"> шт.</span></div>
                                    <div class="input-group-prepend"><span class="input-group-text"> м.пог. </span></div>
                                    <div class="input-group-prepend"><span class="input-group-text"> м² </span></div>
                                    <input name="dimension" value="{{ $service->dimension }}" type="text" class="form-control" id="aaa" aria-label="Округлите">
                                    <div class="input-group-append"><span class="input-group-text">OK</span></div>
                                </div>
                                <small class="form-text text-muted">выберите эдиницы размерности</small>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Добавить</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>

@endsection
