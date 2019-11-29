@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container">
        <h1 class="title">Daftar Kehadiran/Lembur</h1>
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
                        <button class="button is-small is-danger" @click="showModal('delete-{{$attendance_report->id}}')">
                            Hapus
                        </button>
                        
                        <modal :name="'delete-{{$attendance_report->id}}'">
                            <div class="box p-1" slot="main-content">
                                <p class="title is-size-6">Hapus</p>
                                <p class="is-6 mb-2">Anda yakin ingin menghapus?</p>
                                <div class="is-flex justify-content-end">
                                    <form action="{{ route('attendance_reports.destroy', $attendance_report->id)}}" method="post" class="mx-0-25">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="button is-danger">Hapus</button>
                                    </form>
                                    <button class="ml-0-5 button is-link" @click="hideModal('delete-{{$attendance_report->id}}')">Batal</button>
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
