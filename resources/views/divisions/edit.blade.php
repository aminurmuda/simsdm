@extends('layouts.app')
@section('page-title', 'Ubah Divisi')

@section('content')

    <div class="container-custom">
        <h1 class="title">Update Division</h1>
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

            <form method="post" action="{{ route('divisions.update', $division->id) }}">
                @method('PATCH')
                @csrf
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="name" value="{{ $division->name }}" placeholder="Nama Divisi"/>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <textarea class="textarea" name="description"placeholder="Deskripsi">{{ $division->description }}</textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="manager_id" id="">
                                <option value="" disabled=true>-- Pilih Manager --</option>
                                @foreach($managers as $manager)
                                <option value="{{$manager->id}}" {{ $division->manager_id == $manager->id ? 'selected' : '' }}>{{$manager->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="button is-primary">Simpan</button>
            </form>
        </div>
    </div>
    
@endsection
