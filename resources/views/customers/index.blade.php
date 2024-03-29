@extends('layouts.app')
@section('page-title', 'Daftar Customer')

@section('content')

    <div class="container-custom">
        <h1 class="title">Daftar Customer</h1>
        <!-- can create if has admin role (role with id 1) -->
        @if(Auth::user()->role_id == 1)
        <div class="is-flex justify-content-end">
            <a href="/customers/create" class="button is-success">Buat</a>
        </div>
        @endif
        @if(count($customers) > 0)
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
                        <a href="/customers/{{$customer->id}}" class="mx-0-25 button is-small is-link">Lihat</a>
                        <a href="{{ route('customers.edit',$customer->id)}}" class="mx-0-25 button is-small is-success">Ubah</a>
                        <form action="{{ route('customers.destroy', $customer->id)}}" method="post" class="mx-0-25">
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
