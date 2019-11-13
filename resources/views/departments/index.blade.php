@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container">
        <!-- can create if has admin role (role with id 1) -->
        @if(Auth::user()->role_id == 1)
        <div class="is-flex justify-content-end">
            <a href="/departments/create" class="button is-success">Buat</a>
        </div>
        @endif
        <div class="box mt-1">
            <div class="columns is-hcentered">
                <div class="column is-2 has-text-weight-bold">Nama</div>        
                <div class="column is-3 has-text-weight-bold">Description</div>
                <div class="column is-2 has-text-weight-bold">Division</div>
                <div class="column is-2 has-text-weight-bold">Manager</div>
                <div class="column is-3 has-text-weight-bold">Aksi</div>  
            </div>
            @foreach($departments as $department)
            <div class="columns is-vcentered">
                <div class="column is-2">{{$department->name}}</div>        
                <div class="column is-3">{{$department->description}}</div>
                <div class="column is-2">{{$department->division->name}}</div>
                <div class="column is-2">{{$department->manager->name}}</div>
                <div class="column is-3 is-flex">
                    <a href="/departments/{{$department->id}}" class="mx-0-25 button is-link">Lihat</a>
                    <a href="{{ route('departments.edit',$department->id)}}" class="mx-0-25 button is-success">Edit</a>
                    <form action="{{ route('departments.destroy', $department->id)}}" method="post" class="mx-0-25">
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
