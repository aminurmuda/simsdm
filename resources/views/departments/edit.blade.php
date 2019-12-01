@extends('layouts.app')
@section('page-title', 'Ubah Departemen')

@section('content')

    <div class="container-custom">
        <h1 class="title">Update Department</h1>
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

            <form method="post" action="{{ route('departments.update', $department->id) }}">
                @method('PATCH')
                @csrf
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="name" value="{{ $department->name }}" placeholder="Nama Departemen"/>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <textarea class="textarea" name="description"placeholder="Deskripsi">{{ $department->description }}</textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="division_id" id="">
                                <option value="" disabled=true>-- Pilih Divisi --</option>
                                @foreach($divisions as $division)
                                <option value="{{$division->id}}" {{ $department->division_id == $division->id ? 'selected' : '' }}>{{$division->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="manager_id" id="">
                                <option value="" disabled=true>-- Pilih Manager --</option>
                                @foreach($managers as $manager)
                                <option value="{{$manager->id}}" {{ $department->manager_id == $manager->id ? 'selected' : '' }}>{{$manager->name}}</option>
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
