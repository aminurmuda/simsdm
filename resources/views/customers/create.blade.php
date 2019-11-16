@extends('layouts.app')
@section('page-title', 'Create')

@section('content')

    <div class="container">
        <h1 class="title">Create Project</h1>
        <div class="box">
            <form method="post" action="{{ route('customers.store') }}">
                @csrf
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="name" placeholder="Nama Customer"/>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="company_name" placeholder="Nama Perusahaan"/>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <textarea type="text" class="textarea" name="company_address" placeholder="Alamat Perusahaan"></textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="phone" placeholder="Nomor HP"/>
                    </div>
                </div>

                <button type="submit" class="button is-primary">Buat</button>
            </form>
        </div>
    </div>
    
@endsection
