@extends('layouts.app')
@section('page-title', 'Daftar Cuti')

@section('content')

    <div class="container">
        <h1 class="title">Daftar Cuti</h1>
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
                <div class="column is-2 has-text-weight-bold">Keterangan</div>  
                <div class="column is-1 has-text-weight-bold">Status</div>  
                <div class="column is-2 has-text-weight-bold">Aksi</div>  
            </div>
            @foreach($paid_leaves as $paid_leave)
            <div class="columns is-vcentered">
                <div class="column is-2">{{$paid_leave->user->name}}</div>        
                <div class="column is-1">{{tanggal($paid_leave->created_date)}}</div>
                <div class="column is-1">{{tanggal($paid_leave->start_date)}}</div>
                <div class="column is-1">{{tanggal($paid_leave->end_date)}}</div>
                <div class="column is-1">{{cuti($paid_leave->start_date, $paid_leave->end_date)}}</div>
                <div class="column is-2">{{$paid_leave->reason}}</div>
                <div class="column is-1">{{$paid_leave->status->name}}</div>
                <div class="column is-2 is-flex">
                    <a href="/paid_leaves/{{$paid_leave->id}}" class="mx-0-25 button is-small is-link">Lihat</a>
                    @if($paid_leave->status_id == 3)
                    <button class="button is-small is-danger" @click="showModal('reject-reason-{{$paid_leave->id}}')">
                        Lihat Alasan Penolakan
                    </button>
                    <modal :name="'reject-reason-{{$paid_leave->id}}'">
                        <div class="box p-1" slot="main-content">
                            <p class="title is-size-6">Alasan Penolakan</p>
                            <p class="is-6 mb-2">{{$paid_leave->reject_reason}}</p>
                            <div class="is-flex justify-content-end">
                                <button type="button" class="button is-link" @click="hideModal('reject-reason-{{$paid_leave->id}}')">Tutup</button>
                            </div>
                        </div>
                    </modal>
                    @endif
                    
                    @if($paid_leave->status_id == 1)
                    <form action="{{ route('paid_leave_approve_by_manager', $paid_leave->id) }}" method="post" class="mx-0-25">
                        @csrf @method('PUT')
                        <button class="button is-small is-success" type="submit">Approve</button>
                    </form>
                    <button class="button is-small is-danger" @click="showModal('reject-{{$paid_leave->id}}')">
                        Tolak
                    </button>
                    
                    <modal :name="'reject-{{$paid_leave->id}}'">
                        <div class="box p-1" slot="main-content">
                            <p class="title is-size-6">Tolak Permintaan Cuti</p>
                            <div>
                                <form action="{{ route('paid_leave_reject_by_manager', $paid_leave->id)}}" method="post" class="mx-0-25">
                                    @csrf @method('PUT')
                                    <div class="field">
                                        <div class="control">
                                            <textarea type="text" class="textarea" name="reject_reason" placeholder="Alasan penolakan"></textarea>
                                        </div>
                                    </div>
                                    <div class="is-flex justify-content-end">
                                        <button class="button is-danger" type="submit">Tolak</button>
                                        <button type="button" class="ml-0-5 button is-link" @click="hideModal('reject-{{$paid_leave->id}}')">Batal</button>
                                    </div>
                                </form>
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
