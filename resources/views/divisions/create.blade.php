@extends('layouts.app')
@section('page-title', 'Tambah')

@section('content')

    <div class="container">
        <h1 class="title">Tambah Divisi</h1>
        <div class="box">
            <form method="post" action="{{ route('divisions.store') }}">
                @csrf
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="name" placeholder="Nama Divisi"/>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <textarea type="text" class="textarea" name="description" placeholder="Deskripsi"></textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="manager_id" id="">
                                <option value="" disabled=true selected>-- Pilih Manager --</option>
                                @foreach($managers as $manager)
                                <option value="{{$manager->id}}">{{$manager->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="button is-primary">Buat</button>
            </form>
        </div>
    </div>
    
@endsection
