@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container">
        <div class="box mt-1">
            <div class="columns is-hcentered">
                <div class="column is-2 has-text-weight-bold">Nama</div>        
                <div class="column is-2 has-text-weight-bold">Role</div>        
                <div class="column is-2 has-text-weight-bold">Email</div>
                <div class="column is-3 has-text-weight-bold">Skill</div>
                <div class="column is-3 has-text-weight-bold">Aksi</div>  
            </div>
            @foreach($users as $user)
            <div class="columns is-vcentered">
                <div class="column is-2">{{$user->name}}</div>        
                <div class="column is-2">{{$user->role->name}}</div>
                <div class="column is-2">{{$user->email}}</div>
                <div class="column is-3">
                @foreach($user->skills as $skill)
                <button type="button" class="button m-0 is-small is-info">
                    {{$skill->skill->name}}
                </button>
                @endforeach
                </div>
                <div class="column is-3 is-flex">
                <a href="/users/{{$user->id}}" class="mx-0-25 button is-small is-link">Lihat</a>
                    <a href="{{ route('users.edit',$user->id)}}" class="mx-0-25 button is-small is-success">Ubah</a>
                    <form action="{{ route('users.destroy', $user->id)}}" method="post" class="mx-0-25">
                    @csrf
                    @method('DELETE')
                    <button class="button is-small is-danger" type="submit">Hapus</button>
                    </form>
                </div>  
            </div>
            @endforeach
        </div>
    </div>
    
@endsection
