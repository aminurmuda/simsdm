@extends('layouts.app')
@section('page-title', 'Edit')

@section('content')

    <div class="container">
        <h1 class="title">Update Project</h1>
        <div class="box">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

            <form method="post" action="{{ route('customers.update', $customer->id) }}">
                @method('PATCH')
                @csrf
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="name" value="{{ $customer->name }}" placeholder="Nama Customer"/>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="company_name" value="{{ $customer->company_name }}" placeholder="Nama Perusahaan"/>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <textarea class="textarea" name="company_address" placeholder="Alamat Perusahaan">{{ $customer->company_address }}</textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="phone" value="{{ $customer->phone }}" placeholder="Nomor HP"/>
                    </div>
                </div>

                <button type="submit" class="button is-primary">Simpan</button>
            </form>
        </div>
    </div>
    
@endsection
