@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="">{{ Auth::user()->name }}</div>
                <div class="">{{ Auth::user()->email }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Hello {{ Auth::user()->name }}</h1>
                    <h2>Profile page</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
