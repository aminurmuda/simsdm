@extends('layouts.app')
@section('page-title', 'Lihat Divisi')

@section('content')

    <div class="container">
        
        <h1 class="title">Department Details</h1>
        <div class="box">
            <div class="is-flex justify-content-end">
                <div>
                    <a href="{{ route('departments.edit',$department->id)}}" class="button is-primary">Edit</a>
                </div>
            </div>
            <div class="columns mt-1">
                <div class="column is-2 has-text-weight-bold">Nama</div>
                <div class="column">{{$department->name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Deskripsi Divisi</div>
                <div class="column">{{$department->description}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Divisi</div>
                <div class="column">{{$division->name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Manager </div>
                <div class="column">{{$manager->name}}</div>        
            </div>
        </div>
    </div>
    
@endsection
