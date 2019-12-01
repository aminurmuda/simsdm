@extends('layouts.app')
@section('page-title', 'Lihat Proyek')

@section('content')

    <div class="container-custom">
        
        <div class="is-flex justify-content-between">
            <h1 class="title">Project Details</h1>
            <div>
                <!-- can edit if manager of this division or has admin role (role with id 1) -->
                @if(Auth::user()->id == $project->manager_id || Auth::user()->role_id == 1)            
                <a href="{{ route('projects.edit',$project->id)}}" class="button is-primary">Ubah</a>
                <a href="/projects/{{$project->id}}/assign-member" class="button is-info">Tambah Anggota Proyek</a>
                @endif
                @if(Auth::user()->role_id == 1 || (!$project->manager_id && Auth::user()->role_id == 4 && Auth::user()->department_id == $project->department_id))
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
                <div class="column is-2 has-text-weight-bold">Lokasi Proyek</div>
                <div class="column">{{$project->address}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Tanggal Mulai</div>      
                <div class="column">{{ tanggal_full($project->start_date)}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Tanggal Berakhir</div>
                <div class="column">{{ tanggal_full($project->end_date)}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Manager Proyek</div>
                @if($project->manager_id)
                <div class="column">{{$project->manager->name}}</div>        
                @else
                <div class="column has-text-grey-lighter">Manager belum diassign</div>        
                @endif
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Customer</div>
                <div class="column">{{$project->customer->company_name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Departemen</div>
                <div class="column">{{$project->department->name}}</div>  
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Divisi</div>
                <div class="column">{{$project->department->division->name}}</div>  
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Status</div>
                <div class="column">{{$project->status->name}}</div>  
            </div>
        </div>
        
        @if(count($project_members) > 0)
        <div class="box">
            <div class="columns">
            <div class="column is-2 has-text-weight-bold">Nama Karyawan</div>
            <div class="column is-2 has-text-weight-bold">Divisi</div>
            <div class="column is-2 has-text-weight-bold">Departemen</div>
            <div class="column is-4 has-text-weight-bold">Skill</div>
            <div class="column is-2 has-text-weight-bold">Role</div>
            </div>

            @foreach($project_members as $member)
            <div class="columns">
                <div class="column is-2">{{$member->user->name}}</div>
                <div class="column is-2">{{$member->user->department->division->name}}</div>
                <div class="column is-2">{{$member->user->department->name}}</div>
                <div class="column is-4">
                    @if(count($member->user->skills) > 0)
                        <!-- {{$member->user->skills}} -->
                        @foreach($member->user->skills as $skill)
                            {{$skill->skill->name}},
                        @endforeach
                    @endif
                </div>
                <div class="column is-2">{{$member->role}}</div>
            </div>
            @endforeach
        </div>
        @else
            <div class="box">
                Belum ada member proyek
            </div>
        @endif
    </div>
    
@endsection
