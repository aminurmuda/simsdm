@extends('layouts.app')
@section('page-title', 'Lihat Divisi')

@section('content')

    <div class="container">
        
        <div class="is-flex justify-content-between">
            <h1 class="title">Department Details</h1>
            @if(Auth::user()->id == $department->manager_id || Auth::user()->role_id == 1)    
            <div class="is-flex justify-content-end">
                <a href="{{ route('departments.edit',$department->id)}}" class="button is-primary">Ubah</a>
            </div>
            @endif
        </div>
        <div class="box">
            <!-- can edit if manager of this department or has admin role (role with id 1) -->
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Nama</div>
                <div class="column">{{$department->name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Deskripsi Divisi</div>
                <div class="column">{{$department->description}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Divisi</div>
                <div class="column">{{$department->division->name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Manager </div>
                @if($department->manager_id)
                <div class="column">{{$department->manager->name}}</div>        
                @else
                <div class="column has-text-grey-light">Manager belum di-assign</div>        
                @endif
            </div>
        </div>
    </div>
    
@endsection
