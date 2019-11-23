@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container">
        <!-- can create if has admin role (role with id 1) -->
        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
        <div class="is-flex justify-content-end">
            <a href="/attendance_reports/create" class="button is-success">Buat</a>
        </div>
        @endif
        <div class="box mt-1">
            <div class="columns is-hcentered">
                <div class="column is-2 has-text-weight-bold">Nama</div>        
                <div class="column is-2 has-text-weight-bold">Nama Proyek</div>        
                <div class="column is-1 has-text-weight-bold">Tanggal</div>
                <div class="column is-1 has-text-weight-bold">Jam Masuk</div>
                <div class="column is-1 has-text-weight-bold">Jam Keluar</div>
                <div class="column is-1 has-text-weight-bold">Lembur</div>
                <div class="column is-1 has-text-weight-bold">Status</div>
                <div class="column is-2 has-text-weight-bold">Aksi</div>  
            </div>
            @foreach($attendance_reports as $attendance_report)
            <div class="columns is-vcentered">
                <div class="column is-2">{{ $attendance_report->user->name }}</div>        
                <div class="column is-2">{{ $attendance_report->project->name }}</div>        
                <div class="column is-1">{{ tanggal($attendance_report->date) }}</div>
                <div class="column is-1 has-text-centered">{{ jam($attendance_report->clock_in) }}</div>
                <div class="column is-1 has-text-centered">{{ jam($attendance_report->clock_out) }}</div>
                <div class="column is-1">{{ lembur($attendance_report->clock_in, $attendance_report->clock_out) }}</div>
                <div class="column is-1">{{ $attendance_report->status->name }}</div>
                <div class="column is-2 is-flex">
                    @if(Auth::user()->role_id == '1' || Auth::user()->role_id == '2')
                        <form action="{{ route('attendance_reports.destroy', $attendance_report->id)}}" method="post" class="mx-0-25">
                            @csrf
                            @method('DELETE')
                            <button class="button is-small is-danger" type="submit">Hapus</button>
                        </form>
                    @endif
                    @if($attendance_report->status_id == 1)
                        <form action="{{ route('attendance_approve', $attendance_report->id)}}" method="post" class="mx-0-25">
                        @csrf
                        @method('PUT')
                        <button class="button is-small is-success" type="submit">Approve</button>
                        </form>
                        <form action="{{ route('attendance_reject', $attendance_report->id)}}" method="post" class="mx-0-25">
                        @csrf
                        @method('PUT')
                        <button class="button is-small is-link" type="submit">Reject</button>
                        </form>
                    @endif
                </div>  
            </div>
            @endforeach
            <modal :name="'modal-info'">
                <div class="box p-1" slot="main-content">
                    haha
                </div>
            </modal>
        </div>
    </div>
    
@endsection
