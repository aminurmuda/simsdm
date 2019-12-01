@extends('layouts.app')
@section('page-title', 'Welcome')
@section('content')
<div class="container-custom">
    <div class="mt-2">
        @if(Auth::user())
        <h1 class="title">Welcome to SIMSDM, {{ Auth::user()->name }}</h1>
        @endif

        <!-- <button class="button is-link" @click="showModal('modal-info')">
            Buka Modal
        </button>
        
        <modal :name="'modal-info'">
            <div class="box p-1" slot="main-content">
                <p class="title is-6 mb-0-5">Informasi</p>
                <button class="button is-primary is-small is-fullwidth" @click="hideModal('modal-info')">Tutup</button>
            </div>
        </modal> -->
    </div>
</div>
@endsection
