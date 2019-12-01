@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container">
        <h1 class="title">Daftar Permintaan Keluar</h1>
        <div class="is-flex justify-content-end">
            <a href="/request_employees/create" class="button is-success">Buat Request Karyawan</a>
        </div>
        <div class="box mt-1">
            <div class="columns is-hcentered">
                <div class="column is-1 has-text-weight-bold">Nama Karyawan</div>        
                <div class="column is-1 has-text-weight-bold">Departemen Asal</div>
                <div class="column is-1 has-text-weight-bold">Nama Requestor</div>
                <div class="column is-1 has-text-weight-bold">Departemen Peminjam</div>  
                <div class="column is-1 has-text-weight-bold">Nama Proyek</div> 
                <div class="column is-1 has-text-weight-bold">Deadline</div>  
                <div class="column is-1 has-text-weight-bold">Role</div>  
                <div class="column is-1 has-text-weight-bold">Status Request</div>  
                <div class="column is-1 has-text-weight-bold">Status Karyawan</div>  
                <div class="column is-2 has-text-weight-bold">Aksi</div>  
            </div>
            @foreach($requests as $request)
            <div class="columns is-vcentered">
                <div class="column is-1">{{ $request->requestee->name }}</div>        
                <div class="column is-1">{{ $request->requestee->department->name }}</div>        
                <div class="column is-1">{{ $request->requestor->name }}</div>        
                <div class="column is-1">{{ $request->requestor->department->name }}</div> 
                <div class="column is-1">{{ $request->project->name }}</div>      
                <div class="column is-1">{{ tanggal($request->end_date) }}</div>        
                <div class="column is-1">{{ $request->role }}</div>       
                <div class="column is-1">{{ $request->status->name }}</div>       
                <div class="column is-1">{{ $request->requestee->status->name }}</div>       
                <div class="column is-2 is-flex">
                    <a href="/projects/{{$request->project_id}}" class="mx-0-25 button is-small is-link">Lihat Proyek</a>
                    @if($request->status_id == 3 || $request->status_id == 5)
                        <button class="button is-small is-danger" @click="showModal('reject-{{$request->id}}')">
                            Lihat Alasan Penolakan
                        </button>
                        
                        <modal :name="'reject-{{$request->id}}'">
                            <div class="box p-1" slot="main-content">
                                <p class="title is-size-6">Alasan Penolakan</p>
                                <p class="is-6 mb-2">{{$request->reason}}</p>
                                <div class="is-flex justify-content-end">
                                    <button type="button" class="button is-link" @click="hideModal('reject-{{$request->id}}')">Tutup</button>
                                </div>
                            </div>
                        </modal>
                    @endif
                </div>  
            </div>
            @endforeach
        </div>
    </div>
    
@endsection
