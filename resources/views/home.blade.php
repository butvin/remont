@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->id }}</div>
                <div class="card-header">{{ Auth::user()->name }}</div>
                <div class="card-header">{{ Auth::user()->email }}</div>
                <div class="card-header">{{ Auth::user()->created_at }}</div>
                <div class="card-header">{{ Auth::user()->updated_at }}</div>

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
