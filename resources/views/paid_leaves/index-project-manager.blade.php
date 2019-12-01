@extends('layouts.app')
@section('page-title', 'Daftar Cuti')

@section('content')

    <div class="container-custom">
        <h1 class="title">Daftar Cuti</h1>
        @if(count($paid_leaves) > 0)
            <div class="box mt-1">
                <div class="columns is-hcentered">
                    <div class="column is-2 has-text-weight-bold">Nama</div>        
                    <div class="column is-1 has-text-weight-bold">Tanggal Permohonan</div>
                    <div class="column is-1 has-text-weight-bold">Tanggal Mulai</div>
                    <div class="column is-1 has-text-weight-bold">Tanggal Selesai</div>  
                    <div class="column is-1 has-text-weight-bold">Jumlah Hari Kerja</div>  
                    <div class="column is-3 has-text-weight-bold">Keterangan</div>  
                    <div class="column is-2 has-text-weight-bold">Status</div>
                </div>
                @foreach($paid_leaves as $paid_leave)
                <div class="columns is-vcentered">
                    <div class="column is-2">{{$paid_leave->user->name}}</div>        
                    <div class="column is-1">{{tanggal($paid_leave->created_date)}}</div>
                    <div class="column is-1">{{tanggal($paid_leave->start_date)}}</div>
                    <div class="column is-1">{{tanggal($paid_leave->end_date)}}</div>
                    <div class="column is-1">{{cuti($paid_leave->start_date, $paid_leave->end_date)}}</div>
                    <div class="column is-3">{{$paid_leave->reason}}</div>
                    <div class="column is-2">{{$paid_leave->status->name}}</div>
                </div>
                @endforeach
            </div>
        @else
            <div class="my-1 px-2 py-4 has-text-centered has-text-grey-light">
                Belum ada entri data
            </div>    
        @endif
    </div>
    
@endsection
