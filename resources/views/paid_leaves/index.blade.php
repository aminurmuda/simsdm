@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container">
        <!-- can create if has admin role (role with id 1) -->
        <div class="is-flex justify-content-end">
            <a href="/paid_leaves/create" class="button is-success">Buat</a>
        </div>
        <div class="box mt-1">
            <div class="columns is-hcentered">
                <div class="column is-2 has-text-weight-bold">Nama</div>        
                <div class="column is-1 has-text-weight-bold">Tanggal Permohonan</div>
                <div class="column is-1 has-text-weight-bold">Tanggal Mulai</div>
                <div class="column is-1 has-text-weight-bold">Tanggal Selesai</div>  
                <div class="column is-1 has-text-weight-bold">Jumlah Hari Kerja</div>  
                <div class="column is-2 has-text-weight-bold">Status</div>  
                <div class="column is-2 has-text-weight-bold">Keterangan</div>  
                <div class="column is-2 has-text-weight-bold">Aksi</div>  
            </div>
            @foreach($paid_leaves as $paid_leave)
            <div class="columns is-vcentered">
                <div class="column is-2">{{$paid_leave->user->name}}</div>        
                <div class="column is-1">{{tanggal($paid_leave->created_date)}}</div>
                <div class="column is-1">{{tanggal($paid_leave->start_date)}}</div>
                <div class="column is-1">{{tanggal($paid_leave->end_date)}}</div>
                <div class="column is-1">{{cuti($paid_leave->start_date, $paid_leave->end_date)}}</div>
                <div class="column is-2">{{$paid_leave->status->name}}</div>
                <div class="column is-2">{{$paid_leave->reason}}</div>
                <div class="column is-2 is-flex">
                    <a href="/paid_leaves/{{$paid_leave->id}}" class="mx-0-25 button is-small is-link">Lihat</a>
                    @if(Auth::user()->role_id == 1)
                        <form action="{{ route('paid_leaves.destroy', $paid_leave->id)}}" method="post" class="mx-0-25">
                        @csrf
                        @method('DELETE')
                        <button class="button is-small is-danger" type="submit">Hapus</button>
                        </form>
                    @endif
                    @if($paid_leave->status_id == 1)
                        <form action="{{ route('paid_leave_approve_by_manager', $paid_leave->id) }}" method="post" class="mx-0-25">
                            @csrf @method('PUT')
                            <button class="button is-small is-success" type="submit">Approve</button>
                        </form>
                        <form action="{{ route('paid_leave_reject_by_manager', $paid_leave->id)}}" method="post" class="mx-0-25">
                            @csrf @method('PUT')
                            <button class="button is-small is-danger" type="submit">Reject</button>
                        </form>
                    @endif
                </div>  
            </div>
            @endforeach
        </div>
    </div>
    
@endsection
