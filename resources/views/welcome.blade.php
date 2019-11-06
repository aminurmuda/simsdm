@extends('layouts.app')
@section('page-title', 'Welcome')
@section('content')
<div class="container">
    <div class="mt-2">
        <h1 class="title">Welcome to SIMSDM, {{ Auth::user()->name }}</h1>
    </div>
</div>
@endsection
