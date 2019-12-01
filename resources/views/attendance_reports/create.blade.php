@extends('layouts.app')
@section('page-title', 'Tambah')

@section('content')

    <div class="container-custom">
        <h1 class="title">Tambah Kehadiran</h1>
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
        
            <form method="post" action="{{ route('attendance_reports.store') }}">
                @csrf
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
                
                <div class="columns">
                    <div class="column">                    
                        <div class="field">
                            <div class="control">
                                <input type="datetime-local" class="input" name="clock_in" step="1">
                            </div>
                        </div>        
                        <div class="field">
                            <div class="control">
                                <input type="text" class="input" name="clock_in_note" placeholder="Catatan Absen Masuk"/>
                            </div>
                        </div>    
                    </div>
                    <div class="column">
                        <div class="field">
                            <div class="control">
                                <input type="datetime-local" class="input" name="clock_out">
                            </div>
                        </div> 
                        <div class="field">
                            <div class="control">
                                <input type="text" class="input" name="clock_out_note" placeholder="Catatan Absen Keluar"/>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="button is-primary is-fullwidth">Clock In</button>
            </form>
        </div>
    </div>
    
@endsection
