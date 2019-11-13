@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container">
        
        <div class="is-flex justify-content-between">
            <h1 class="title">Data Diri</h1>
            @if(Auth::user()->id == $user->id || Auth::user()->role_id == 1)
            <div class="is-flex justify-content-end">
                <a href="/users/{{$user->id}}/edit" class="button is-primary">Edit</a>
                <a href="/users/{{$user->id}}/add-skill" class="button is-link ml-0-5">Tambah Skill</a>
            </div>
            @endif
        </div>
        <div class="box">
            <!-- can edit if their own profile or has admin role (role with id 1) -->
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

        <div class="box">
            <p class="has-text-weight-bold">Skill Saya</p>
            @if(count($user_skills) > 0)
                @foreach($user_skills as $user_skill)
                <div class="my-0-5 is-flex">
                    <button class="button is-link">{{$user_skill->skill->name}}</button>
                    <div class="ml-1 is-flex align-items-center">
                        @for ($i = 0; $i < $user_skill->level; $i++)
                        <i class="material-icons has-text-warning">star</i>
                        @endfor
                    </div>
                </div>
                @endforeach
            @else
                <p class="mt-0-5 has-text-grey-light">
                    Anda belum menambahkan skill
                </p>
            @endif
        </div>
    </div>
    
@endsection
