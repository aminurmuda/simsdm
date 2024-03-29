@extends('layouts.app')
@section('page-title', 'Lihat Divisi')

@section('content')

    <div class="container-custom">
        
        <div class="is-flex justify-content-between">
            <h1 class="title">Division Details</h1>
            @if(Auth::user()->id == $division->manager_id || Auth::user()->role_id == 1)    
            <div class="is-flex justify-content-end">
                <a href="{{ route('divisions.edit',$division->id)}}" class="button is-primary">Ubah</a>
            </div>
            @endif
        </div>
        <div class="box">
            <!-- can edit if manager of this division or has admin role (role with id 1) -->
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Nama</div>
                <div class="column">{{$division->name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Deskripsi Divisi</div>
                <div class="column">{{$division->description}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Manager</div>
                @if($division->manager_id)
                <div class="column">{{$division->manager->name}}</div>        
                @else
                <div class="column has-text-grey-light">Manager belum di-assign</div>        
                @endif       
            </div>
        </div>
    </div>
    
@endsection
