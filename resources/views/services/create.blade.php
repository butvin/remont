@extends('layouts.app')

@section('content')
{{--    @parent--}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">
                    <span>Добавить пункт с записью</span>
                </h5>
                <form action="{{ action('ServiceSubjectController@store') }}" method="POST">
                    @csrf

{{--                    <div class="form-group col">--}}
{{--                        <div class="md-form">--}}
{{--                            <label for="nnn" class="col-form-label">Название работы</label>--}}
{{--                            <input name="name" type="text" class="form-control" id="nnn" placeholder="">--}}
{{--                            <small class="form-text text-muted">Это название для  работы, которое отобразиться в списке</small>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group col">
                        <label for="serviceSubjectDesc">Краткое описмание</label>
                        <textarea name="name" class="form-control" id="serviceSubjectDesc" rows="2"></textarea>
                        <small class="form-text text-muted">Это поле для краткого описания работы, ньюансов, преймуществ и недостатков.</small>
                    </div>


                    <div class="form-group col">
                        <div class="form-row">

                            <div class="col-5">
                                <label for="aaa" class="col-form-label">стоимость</label>
                                <div class="input-group">
{{--                                    <div class="input-group-prepend"><span class="input-group-text">$</span></div>--}}
                                    <input name="amount" type="text" class="form-control" id="aaa" aria-label="">
                                    <div class="input-group-append"><span class="input-group-text">грн</span></div>
                                </div>
                                <small class="form-text text-muted">Количество денег за эдиницу измерения</small>
                            </div>

                            <div class="col-2"></div>

                            <div class="col-5">
                                <label class="col-form-label" for="dimension">размерность</label>
                                <div class="input-group btn-group">
                                    <div class="selectWrapper">
                                        <select name="dimension" class="form-control" id="dimension">
                                                <option title="title0" class="" value="none" selected disabled>{{ __('none') }}</option>
                                                <option title="title1" class="" value="шт.">{{ __('шт.') }}</option>
                                                <option title="title2" class="" value="м.пог.">м.пог.</option>
                                                <option title="title3" class="" value="м²">м²</option>
                                        </select>
                                    </div>
                                </div>
                                <small class="form-text text-muted">выберите эдиницы размерности</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    <span>{{ __('Добавить') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </form>



            </div>
        </div>
    </div>

</div>
@endsection
