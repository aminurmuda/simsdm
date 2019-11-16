@extends('layouts.app')
@section('page-title', 'Lihat Proyek')

@section('content')

    <div class="container">
        
        <div class="is-flex justify-content-between">
            <h1 class="title">Project Details</h1>
            <div>
                <!-- can edit if manager of this division or has admin role (role with id 1) -->
                @if(Auth::user()->id == $project->manager_id || Auth::user()->role_id == 1)            
                <a href="{{ route('projects.edit',$project->id)}}" class="button is-primary">Edit</a>
                <a href="/projects/{{$project->id}}/assign-member" class="button is-info">Tambah Anggota Proyek</a>
                @endif
                @if(!$project->manager_id && Auth::user()->role_id == 1)
                <a href="/projects/{{$project->id}}/assign-manager" class="button is-link">Assign Project Manager</a>
                @endif
            </div>
        </div>
        <div class="box">
            <div class="columns mt">
                <div class="column is-2 has-text-weight-bold">Nama</div>
                <div class="column">{{$project->name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Deskripsi Proyek</div>
                <div class="column">{{$project->description}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Customer</div>
                <div class="column">{{$project->customer->company_name}}</div>        
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
                <div class="column">{{$project->manager->name}}</div>        
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
