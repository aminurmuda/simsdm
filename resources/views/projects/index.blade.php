@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container">
        <div class="is-flex justify-content-end">
            <a href="/projects/create" class="button is-success">Buat</a>
        </div>
        <div class="box mt-1">
            <div class="columns is-hcentered">
                <div class="column is-2 has-text-weight-bold">Nama</div>        
                <div class="column is-3 has-text-weight-bold">Description</div>
                <div class="column is-3 has-text-weight-bold">Periode</div>
                <div class="column is-4 has-text-weight-bold">Aksi</div>  
            </div>
            @foreach($projects as $project)
            <div class="columns is-vcentered">
                <div class="column is-2">{{$project->name}}</div>        
                <div class="column is-3">{{$project->description}}</div>
                <div class="column is-3">{{ \Carbon\Carbon::parse($project->start_date)->format('d F Y')}} - {{ \Carbon\Carbon::parse($project->end_date)->format('d F Y')}}</div>
                <div class="column is-4 is-flex">
                    <a href="/projects/{{$project->id}}" class="mx-0-25 button is-link">Lihat</a>
                    <a href="{{ route('projects.edit',$project->id)}}" class="mx-0-25 button is-success">Edit</a>
                    <form action="{{ route('projects.destroy', $project->id)}}" method="post" class="mx-0-25">
                    @csrf
                    @method('DELETE')
                    <button class="button is-danger" type="submit">Hapus</button>
                    </form>
                </div>  
            </div>
            @endforeach
        </div>
    </div>
    
@endsection
