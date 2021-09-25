@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <img style="width:200px;" src="{{ URL::to('media/user/' . Auth::user() -> photo) }}" alt="">
                    <h1 class="display-4">{{ Auth::user() -> name }}</h1>
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td>{{ Auth::user() -> name }}</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>{{ Auth::user() -> username }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ Auth::user() -> email }}</td>
                        </tr>
                        <tr>
                            <td>Cell</td>
                            <td>{{ Auth::user() -> cell }}</td>
                        </tr>

                        <tr>
                            <td>Location</td>
                            <td>{{ Auth::user() -> location }}</td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
