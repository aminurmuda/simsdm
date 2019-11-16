@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container">
        <!-- can create if has admin role (role with id 1) -->
        @if(Auth::user()->role_id == 1)
        <div class="is-flex justify-content-end">
            <a href="/customers/create" class="button is-success">Buat</a>
        </div>
        @endif
        <div class="box mt-1">
            <div class="columns is-hcentered">
                <div class="column is-2 has-text-weight-bold">Nama</div>        
                <div class="column is-3 has-text-weight-bold">Nama Perusahaan</div>
                <div class="column is-2 has-text-weight-bold">Alamat Perusahaan</div>
                <div class="column is-2 has-text-weight-bold">Nomor HP</div>
                <div class="column is-3 has-text-weight-bold">Aksi</div>  
            </div>
            @foreach($customers as $customer)
            <div class="columns is-vcentered">
                <div class="column is-2">{{$customer->name}}</div>        
                <div class="column is-3">{{$customer->company_name}}</div>
                <div class="column is-2">{{$customer->company_address}}</div>
                <div class="column is-2">{{$customer->phone}}</div>
                <div class="column is-3 is-flex">
                    <a href="/customers/{{$customer->id}}" class="mx-0-25 button is-link">Lihat</a>
                    <a href="{{ route('customers.edit',$customer->id)}}" class="mx-0-25 button is-success">Edit</a>
                    <form action="{{ route('customers.destroy', $customer->id)}}" method="post" class="mx-0-25">
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
