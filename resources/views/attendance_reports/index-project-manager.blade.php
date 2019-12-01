@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container-custom">
        <h1 class="title">Daftar Kehadiran/Lembur</h1>
        @if(count($attendance_reports) > 0)
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

                        @if($attendance_report->status_id == 3)
                        <button class="button is-small is-primary" @click="showModal('reject-reason-{{$attendance_report->id}}')">
                            Lihat Alasan Penolakan
                        </button>
                        <modal :name="'reject-reason-{{$attendance_report->id}}'">
                            <div class="box p-1" slot="main-content">
                                <p class="title is-size-6">Alasan Penolakan</p>
                                <p class="is-6 mb-2">{{$attendance_report->reject_reason}}</p>
                                <div class="is-flex justify-content-end">
                                    <button type="button" class="button is-link" @click="hideModal('reject-reason-{{$attendance_report->id}}')">Tutup</button>
                                </div>
                            </div>
                        </modal>
                        @endif

                        @if($attendance_report->status_id == 1)
                            <form action="{{ route('attendance_approve', $attendance_report->id)}}" method="post" class="mx-0-25">
                            @csrf
                            @method('PUT')
                            <button class="button is-small is-success" type="submit">Approve</button>
                            </form>

                            <button class="button is-small is-danger" @click="showModal('reject-{{$attendance_report->id}}')">
                                Tolak
                            </button>
                            
                            <modal :name="'reject-{{$attendance_report->id}}'">
                                <div class="box p-1" slot="main-content">
                                    <p class="title is-size-6">Tolak Laporan Lembur</p>
                                    <div>
                                        <form action="{{ route('attendance_reject', $attendance_report->id)}}" method="post" class="mx-0-25">
                                            @csrf @method('PUT')
                                            <div class="field">
                                                <div class="control">
                                                    <textarea type="text" class="textarea" name="reject_reason" placeholder="Alasan penolakan"></textarea>
                                                </div>
                                            </div>
                                            <div class="is-flex justify-content-end">
                                                <button class="button is-danger" type="submit">Tolak</button>
                                                <button type="button" class="ml-0-5 button is-link" @click="hideModal('reject-{{$attendance_report->id}}')">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </modal>
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
        @else
            <div class="my-1 px-2 py-4 has-text-centered has-text-grey-light">
                Belum ada entri data
            </div>    
        @endif
    </div>
    
@endsection
