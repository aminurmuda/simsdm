@extends('layouts.app')
@section('page-title', 'Lihat Proyek')

@section('content')

    <div class="container">
        
        <h1 class="title">Project Details</h1>
        <div class="box">
            <div class="is-flex justify-content-end">
                <div>
                    <a href="{{ route('projects.edit',$project->id)}}" class="button is-primary">Edit</a>
                    @if(!$project->manager_id)
                    <a href="/projects/{{$project->id}}/assign-manager" class="button is-link">Assign Project Manager</a>
                    @endif
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
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Manager</div>
                @if($project->manager_id)
                <div class="column">{{$manager->name}}</div>        
                @else
                <div class="column has-text-grey">Manager belum diassign</div>        
                @endif
            </div>
        </div>
        
        @if(count($members) > 0)
        <div class="box">
            <div class="columns">
            <div class="column is-2 has-text-weight-bold">Nama Karyawan</div>
            <div class="column is-2 has-text-weight-bold">Email</div>
            </div>

            @foreach($members as $member)
            <div class="columns">
                <div class="column is-2">{{$member->name}}</div>
                <div class="column is-2">{{$member->email}}</div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
    
@endsection
