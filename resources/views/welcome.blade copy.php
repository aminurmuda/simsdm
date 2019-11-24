@extends('layouts.app')
@section('page-title', 'Welcome')
@section('content')
<div class="container">
    <div class="mt-2">
        @if(Auth::user())
        <h1 class="title">Welcome to SIMSDM, {{ Auth::user()->name }}</h1>
        @endif
        
        <modal :modal-name="'haha'">
            <template v-slot:trigger>
                Open Modal Bro
            </template>
            <template v-slot:header>
                <h1>Here might be a page title</h1>
            </template>
            <template v-slot:content>
                <p>A paragraph for the main content.</p>
                <p>haha</p>
            </template>
            <template v-slot:footer>
                <p>Here's some contact info</p>
            </template>
        <modal/>
    </div>
</div>
@endsection
