@extends('custom_views/layout')

@section('content')
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <verify-laravel-token>

                    </verify-laravel-token>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <verify-adonis-token>

                    </verify-adonis-token>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <verify-shodan-token>

                    </verify-shodan-token>
                </div>
            </div>
        </div>
    </div>
@endsection
