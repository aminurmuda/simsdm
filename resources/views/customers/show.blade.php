@extends('layouts.app')
@section('page-title', 'Lihat Proyek')

@section('content')

    <div class="container">
        
        <div class="is-flex justify-content-between">
            <h1 class="title">Customer Details</h1>
            <div>
                <!-- can edit if has admin role (role with id 1) -->
                @if(Auth::user()->role_id == 1)            
                <a href="{{ route('customers.edit',$customer->id)}}" class="button is-primary">Edit</a>
                @endif
            </div>
        </div>
        <div class="box">
            <div class="columns mt">
                <div class="column is-2 has-text-weight-bold">Nama</div>
                <div class="column">{{$customer->name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Nama Perusahaan</div>
                <div class="column">{{$customer->company_name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Alamat Perusahaan</div>
                <div class="column">{{$customer->company_address}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Nomor HP</div>
                <div class="column">{{$customer->phone}}</div>     
            </div>
        </div>
    </div>
    
@endsection
