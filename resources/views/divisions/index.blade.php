@extends('layouts.app')
@section('page-title', 'Daftar Divisi')

@section('content')

    <div class="container">
       <h1 class="title">Daftar Divisi</h1>
        <!-- can create if has admin role (role with id 1) -->
        @if(Auth::user()->role_id == 1)
        <div class="is-flex justify-content-end">
            <a href="/divisions/create" class="button is-success">Buat</a>
        </div>
        @endif
        <div class="box mt-1">
            <div class="columns is-hcentered">
                <div class="column is-2 has-text-weight-bold">Nama</div>        
                <div class="column is-3 has-text-weight-bold">Description</div>
                <div class="column is-3 has-text-weight-bold">Manager</div>
                <div class="column is-4 has-text-weight-bold">Aksi</div>  
            </div>
            @foreach($divisions as $division)
            <div class="columns is-vcentered">
                <div class="column is-2">{{$division->name}}</div>        
                <div class="column is-3">{{$division->description}}</div>
                <div class="column is-3">@if($division->manager_id){{$division->manager->name}} @endif</div>
                <div class="column is-4 is-flex">
                    <a href="/divisions/{{$division->id}}" class="mx-0-25 button is-small is-link">Lihat</a>
                    <a href="{{ route('divisions.edit',$division->id)}}" class="mx-0-25 button is-small is-success">Ubah</a>
                    <form action="{{ route('divisions.destroy', $division->id)}}" method="post" class="mx-0-25">
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
