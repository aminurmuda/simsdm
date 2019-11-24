@extends('layouts.app')
@section('page-title', 'Welcome')
@section('content')
<div class="container">
    <div class="mt-2">
        @if(Auth::user())
        <h1 class="title">Welcome to SIMSDM, {{ Auth::user()->name }}</h1>
        @endif

        <!-- <button class="button is-link" @click="showModal('haha')">
            Buka
        </button>
        
        <modal :modal-name="'haha'">
            <template v-slot:header>
                Haha
            </template>
            <template v-slot:footer>
                <button type="button" class="button is-danger">
                    Hapus
                </button>
            </template>
        <modal/> -->
    </div>
</div>
@endsection
