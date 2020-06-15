@if (Route::has('login'))
    Add a new subject service element
    @auth
        <th scope="col">
            <a class="btn btn-primary" href="{{ url('/services/create') }}">
                <span class="">{{ __('Добавить') }}</span>
            </a>
        </th>
    @endauth
@endif
