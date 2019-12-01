@extends('layouts.app')
@section('page-title', 'Daftar Cuti')

@section('content')

    <div class="container-custom">
        <h1 class="title">Daftar Cuti</h1>
        <!-- can create if has admin role (role with id 1) -->
        <div class="is-flex justify-content-end">
            <a href="/paid_leaves/create" class="button is-success">Buat</a>
        </div>
        
        @if(count($paid_leaves) > 0)
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
                        
                        @if($paid_leave->status_id == 3)
                            <button class="button is-small is-primary" @click="showModal('reject-reason-{{$paid_leave->id}}')">
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
                            <form action="{{ route('paid_leaves.destroy', $paid_leave->id)}}" method="post" class="mx-0-25">
                            @csrf
                            @method('DELETE')
                            <button class="button is-small is-danger" type="submit">Hapus</button>
                            </form>
                        @endif
                        
                    </div>  
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
