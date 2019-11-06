@extends('layouts.app')
@section('page-title', 'Lihat Proyek')

@section('content')

    <div class="container">
        
        <h1 class="title">Project Details</h1>
        <div class="box">
            <div class="is-flex justify-content-end">
                <div>
                    <a href="{{ route('projects.edit',$project->id)}}" class="button is-primary">Edit</a>
                </div>
            </div>
            <div class="columns mt-1">
                <div class="column is-2 has-text-weight-bold">Nama</div>
                <div class="column">{{$project->name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Deskripsi Proyek</div>
                <div class="column">{{$project->description}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Tanggal Mulai</div>
                <div class="column">{{ \Carbon\Carbon::parse($project->start_date)->format('d F Y')}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Tanggal Berakhir</div>
                <div class="column">{{ \Carbon\Carbon::parse($project->end_date)->format('d F Y')}}</div>        
            </div>
        </div>
    </div>
    
@endsection
