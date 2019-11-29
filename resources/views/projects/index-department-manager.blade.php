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
                    @if(!$project->manager)
                    <button class="button is-small is-link" @click="showModal('assign-manager-{{$project->id}}')">Assign Manager</button>
                        
                        <modal :name="'assign-manager-{{$project->id}}'">
                            <div class="box p-1" slot="main-content">
                                <p class="title is-size-6">Assign Manager</p>
                                <form method="post" action="/projects/{{$project->id}}/store-assign-manager">
                                    @method('PUT')
                                    @csrf
                                    <div class="field">
                                        <div class="control">
                                            <div class="select is-fullwidth">
                                                <select name="manager_id" id="">
                                                    <option value="" disabled=true selected>-- Pilih Manager --</option>
                                                    @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="is-flex justify-content-end">
                                        <button type="submit" class="button is-primary">Simpan</button>
                                        <button type="button" class="ml-0-5 button is-link" @click="hideModal('assign-manager-{{$project->id}}')">Tutup</button>
                                    </div>
                                </form>
                            </div>
                        </modal>
                    @endif
                </div>  
            </div>
            @endforeach
        </div>
    </div>
    
@endsection
