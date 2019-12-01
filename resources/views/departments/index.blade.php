@extends('layouts.app')
@section('page-title', 'Daftar Departemen')

@section('content')

    <div class="container-custom">
        <h1 class="title">Daftar Departemen</h1>
        <!-- can create if has admin role (role with id 1) -->
        @if(Auth::user()->role_id == 1)
        <div class="is-flex justify-content-end">
            <a href="/departments/create" class="button is-success">Buat</a>
        </div>
        @endif
        @if(count($departments) > 0)
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
                    <div class="column is-2">@if($department->manager_id){{$department->manager->name}}@endif</div>
                    <div class="column is-3 is-flex">
                        <a href="/departments/{{$department->id}}" class="mx-0-25 button is-small is-link">Lihat</a>
                        <a href="{{ route('departments.edit',$department->id)}}" class="mx-0-25 button is-small is-success">Ubah</a>
                        <form action="{{ route('departments.destroy', $department->id)}}" method="post" class="mx-0-25">
                        @csrf
                        @method('DELETE')
                        <button class="button is-small is-danger" type="submit">Hapus</button>
                        </form>
                    </div>  
                </div>
                @endforeach
            </div>
        @else
            <div class="my-1 px-2 py-4 has-text-centered has-text-grey-light">
                Belum ada entri data
            </div>    
        @endif
    </div>
    
@endsection
