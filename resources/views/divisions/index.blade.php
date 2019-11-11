@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container">
        <div class="is-flex justify-content-end">
            <a href="/divisions/create" class="button is-success">Buat</a>
        </div>
        <div class="box mt-1">
            <div class="columns is-hcentered">
                <div class="column is-2 has-text-weight-bold">Nama</div>        
                <div class="column is-3 has-text-weight-bold">Description</div>
                <div class="column is-3 has-text-weight-bold">Manager ID</div>
                <div class="column is-4 has-text-weight-bold">Aksi</div>  
            </div>
            @foreach($divisions as $division)
            <div class="columns is-vcentered">
                <div class="column is-2">{{$division->name}}</div>        
                <div class="column is-3">{{$division->description}}</div>
                <div class="column is-3">{{$division->manager_id}}</div>
                <div class="column is-4 is-flex">
                    <a href="/divisions/{{$division->id}}" class="mx-0-25 button is-link">Lihat</a>
                    <a href="{{ route('divisions.edit',$division->id)}}" class="mx-0-25 button is-success">Edit</a>
                    <form action="{{ route('divisions.destroy', $division->id)}}" method="post" class="mx-0-25">
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
