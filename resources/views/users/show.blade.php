@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container">
        
        <h1 class="title">Data Diri</h1>
        <div class="box">
            <!-- can edit if their own profile or has admin role (role with id 1) -->
            @if(Auth::user()->id == $user->id || Auth::user()->role_id == 1)
            <div class="is-flex justify-content-end">
                <a href="/users/{{$user->id}}/edit" class="button is-primary">Edit</a>
            </div>
            @endif
            <div class="columns mt-1">
                <div class="column is-2 has-text-weight-bold">Nama</div>
                <div class="column">{{$user->name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Email</div>
                <div class="column">{{$user->email}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Tempat & Tanggal Lahir</div>
                <div class="column">{{$user->birth_place}}, {{ \Carbon\Carbon::parse($user->birth_date)->format('d F Y')}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Jenis Kelamin</div>
                <div class="column">
                    @if($user->gender == 1)
                        Laki-Laki
                    @else
                        Perempuan
                    @endif
                </div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Alamat</div>
                <div class="column">{{$user->address}}</div>        
            </div>
        </div>
    </div>
    
@endsection
