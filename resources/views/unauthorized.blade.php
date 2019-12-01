@extends('layouts.app')
@section('page-title', 'Unauthorized')
@section('content')
<div class="container-custom">
    <div class="mt-2">
        @if(Auth::user())
        <h1 class="is-size-4">Mohon maaf anda tidak memiliki akses untuk halaman ini</h1>
        <p class="is-size-5">Kembali ke halaman <a href="/dashboard">dashboard</a></p>
        @endif

    </div>
</div>
@endsection
