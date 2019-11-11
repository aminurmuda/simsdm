@extends('layouts.app')
@section('page-title', 'Create')

@section('content')

    <div class="container">
        <h1 class="title">Create Department</h1>
        <div class="box">
            <form method="post" action="{{ route('departments.store') }}">
                @csrf
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="name" placeholder="Nama Departemen"/>
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
                            <select name="division_id" id="">
                                <option value="" disabled=true selected>-- Pilih Divisi --</option>
                                @foreach($divisions as $division)
                                <option value="{{$division->id}}">{{$division->name}}</option>
                                @endforeach
                            </select>
                        </div>
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
