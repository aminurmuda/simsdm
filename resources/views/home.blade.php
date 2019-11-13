@extends('layouts.app')
@section('page-title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <p class="card-header-title">
                    {{ __('Dashboard') }}
                </p>
                </div>

                <!-- <div class="card-content">
                    <div class="content">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <div class="mt-2 box">
        Saat ini anda memiliki:<br>
        <ul>
            <li>
            {{$divisions}} divisi
            </li>
            <li>
            {{$departments}} departemen
            </li>
            <li>
            {{$projects}} proyek
            </li>
        </ul>
    </div>
</div>
@endsection