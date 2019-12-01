@extends('layouts.app')
@section('page-title', 'Tambah')

@section('content')

    <div class="container">
        <h1 class="title">Tambah Request Karyawan</h1>

        <div>
            <request-employee :skills="{{$skills}}" :statuses="{{$statuses}}" :projects="{{$projects}}" :types="{{$types}}"></request-employee>
        </div>

        <!-- <div class="box">
            <form method="post" action="{{ route('request_employees.store') }}">
                @csrf
                <div class="field">
                    <div class="control">
                        <div class="columns">
                            <div class="column is-6">
                                <input type="date" class="input" name="start_date">
                            </div>
                            <div class="column is-6">                        
                                <input type="date" class="input" name="end_date">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="requestee_id" id="">
                                <option value="" disabled=true selected>-- Pilih Karyawan --</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}} (Departemen {{$user->department->name}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="project_id" id="">
                                <option value="" disabled=true selected>-- Pilih Proyek --</option>
                                @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="type_id" id="">
                                <option value="" disabled=true selected>-- Pilih Tipe Request --</option>
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="role" placeholder="Role dalam proyek"/>
                    </div>
                </div>

                <button type="submit" class="button is-primary">Buat</button>
            </form>
        </div> -->
    </div>
    
@endsection
