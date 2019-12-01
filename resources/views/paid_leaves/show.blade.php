@extends('layouts.app')
@section('page-title', 'Lihat Cuti')

@section('content')

    <div class="container-custom">
        
        <div class="is-flex justify-content-between">
            <h1 class="title">Detail Pengajuan Cuti</h1>
        </div>
        <div class="box">
            <div class="columns mt">
                <div class="column is-2 has-text-weight-bold">Nama</div>
                <div class="column">{{$paid_leave->user->name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Tanggal Diajukan</div>
                <div class="column">{{ tanggal_full($paid_leave->created_date)}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Tanggal Mulai</div>
                <div class="column">{{ tanggal_full($paid_leave->start_date)}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Tanggal Berakhir</div>
                <div class="column">{{ tanggal_full($paid_leave->end_date)}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Durasi</div>
                <div class="column">{{cuti($paid_leave->start_date, $paid_leave->end_date)}}</div>
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Status</div>
                <div class="column">{{$paid_leave->status->name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Keterangan</div>
                <div class="column">{{$paid_leave->reason}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Departemen</div>
                <div class="column">{{$paid_leave->user->department->name}}</div>  
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Divisi</div>
                <div class="column">{{$paid_leave->user->department->division->name}}</div>  
            </div>
        </div>
        
    </div>
    
@endsection
