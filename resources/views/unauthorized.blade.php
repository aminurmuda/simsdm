@extends('layouts.app')
@section('page-title', 'Unauthorized')
@section('content')
<div class="container">
    <div class="mt-2">
        @if(Auth::user())
        <h1 class="is-size-4">Mohon maaf anda tidak memiliki akses untuk halaman ini</h1>
        @endif

    </div>
</div>
@endsection
