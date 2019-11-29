@extends('layouts.app')
@section('page-title', 'Daftar Proyek')

@section('content')

    <div class="container">
        <h1 class="title">Daftar Proyek</h1>
        <!-- can create if has admin role (role with id 1) -->
        @if(Auth::user()->role_id == 1)
        <div class="is-flex justify-content-end">
            <a href="/projects/create" class="button is-success">Buat</a>
        </div>
        @endif
        <div class="box mt-1">
            <div class="columns is-hcentered">
                <div class="column is-2 has-text-weight-bold">Nama Proyek</div>        
                <div class="column is-2 has-text-weight-bold">Lokasi Proyek</div>        
                <div class="column is-2 has-text-weight-bold">Customer</div>
                <div class="column is-1 has-text-weight-bold">Departemen</div>
                <div class="column is-1 has-text-weight-bold">Manajer Proyek</div>
                <div class="column is-1 has-text-weight-bold">Deadline</div>
                <div class="column is-1 has-text-weight-bold">Status</div>
                <div class="column is-2 has-text-weight-bold">Aksi</div>  
            </div>
            @foreach($projects as $project)
            <div class="columns is-vcentered">
                <div class="column is-2">{{$project->name}}</div>        
                <div class="column is-2">{{$project->address}}</div>        
                <div class="column is-2">{{$project->customer->company_name}}</div>
                <div class="column is-1">{{ $project->department->name }}</div>
                <div class="column is-1">
                @if($project->manager)
                    {{$project->manager->name}}
                @else
                    <p class="has-text-grey-lighter">Manager belum diassign</p>
                @endif
                </div>
                <div class="column is-1">{{ tanggal($project->end_date) }}</div>
                <div class="column is-1">{{ $project->status->name }}</div>
                <div class="column is-2 is-flex">
                    <a href="/projects/{{$project->id}}" class="mx-0-25 button is-small is-link">Lihat</a>
                    @if(Auth::user()->role_id == 1)
                    <a href="{{ route('projects.edit',$project->id)}}" class="mx-0-25 button is-small is-success">Ubah</a>
                    <form action="{{ route('projects.destroy', $project->id)}}" method="post" class="mx-0-25">
                    @csrf
                    @method('DELETE')
                    <button class="button is-small is-danger" type="submit">Hapus</button>
                    </form>
                    @endif
                </div>  
            </div>
            @endforeach
        </div>
    </div>
    
@endsection
