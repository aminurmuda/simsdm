@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container">
        <div class="is-flex justify-content-end">
            <a href="/users/create" class="button is-success">Buat</a>
        </div>
        <div class="box mt-1">
            <div class="columns is-hcentered">
                <div class="column is-2 has-text-weight-bold">Nama</div>        
                <div class="column is-2 has-text-weight-bold">Email</div>
                <div class="column is-4 has-text-weight-bold">Aksi</div>  
            </div>
            @foreach($users as $user)
            <div class="columns is-vcentered">
                <div class="column is-2">{{$user->name}}</div>        
                <div class="column is-2">{{$user->email}}</div>
                <div class="column is-3 is-flex">
                <a href="/users/{{$user->id}}" class="mx-0-25 button is-link">Lihat</a>
                    <a href="{{ route('users.edit',$user->id)}}" class="mx-0-25 button is-success">Edit</a>
                    <form action="{{ route('users.destroy', $user->id)}}" method="post" class="mx-0-25">
                    @csrf
                    @method('DELETE')
                    <button class="button is-danger" type="submit">Hapus</button>
                    </form>
                </div>  
            </div>
            @endforeach
        </div>
    </div>
    
@endsection
