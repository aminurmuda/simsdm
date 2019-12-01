@extends('layouts.app')
@section('page-title', 'Daftar Request Karyawan')

@section('content')

    <div class="container-custom">
        <h1 class="title">Daftar Request Karyawan</h1>
        <!-- can create if has admin role (role with id 1) -->
        <div class="is-flex justify-content-end">
            <a href="/request_employees/create" class="button is-success">Buat Request Karyawan</a>
        </div>
        @if(count($requests) > 0)
            <div class="box mt-1">
                <div class="columns is-hcentered">
                    <div class="column is-1 has-text-weight-bold">Nama Karyawan</div>        
                    <div class="column is-1 has-text-weight-bold">Nama Proyek</div>     
                    <div class="column is-1 has-text-weight-bold">Departemen</div>
                    <div class="column is-1 has-text-weight-bold">Customer</div>
                    <div class="column is-1 has-text-weight-bold">Manajer Proyek</div>  
                    <div class="column is-1 has-text-weight-bold">Deadline</div>  
                    <div class="column is-1 has-text-weight-bold">Role</div>  
                    <div class="column is-1 has-text-weight-bold">Status</div>  
                    <div class="column is-3 has-text-weight-bold">Aksi</div>  
                </div>
                @foreach($requests as $request)
                <div class="columns is-vcentered">
                    <div class="column is-1">{{ $request->requestee->name }}</div>        
                    <div class="column is-1">{{ $request->project->name }}</div>          
                    <div class="column is-1">{{ $request->project->department->name }}</div>        
                    <div class="column is-1">{{ $request->project->customer->company_name }}</div>        
                    <div class="column is-1">
                        @if($request->project->manager_id)
                            {{ $request->project->manager->name }}
                        @else 
                            <span class="has-text-grey-lighter">Manager belum diassign</span>
                        @endif
                    </div>        
                    <div class="column is-1">{{ tanggal($request->end_date) }}</div>        
                    <div class="column is-1">{{ $request->role }}</div>       
                    <div class="column is-1">{{ $request->status->name }}</div>       
                    <div class="column is-3 is-flex">
                        <a href="/projects/{{$request->project_id}}" class="mx-0-25 button is-small is-link">Lihat</a>
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
                        <form action="{{ route('request_employees.destroy', $request->id)}}" method="post" class="mx-0-25">
                        @csrf
                        @method('DELETE')
                        <button class="button is-small is-danger" type="submit">Hapus</button>
                        </form>
                        
                        @if($request->status_id == 1)
                            <form action="{{ route('request_approve_by_manager', $request->id) }}" method="post" class="mx-0-25">
                                @csrf @method('PUT')
                                <button class="button is-small is-success" type="submit">Approve</button>
                            </form>
                            <button class="button is-small is-danger" @click="showModal('reject-{{$request->id}}')">
                                Tolak (Dept Manager)
                            </button>
                            
                            <modal :name="'reject-{{$request->id}}'">
                                <div class="box p-1" slot="main-content">
                                    <p class="title is-size-6">Tolak Permintaan Bergabung</p>
                                    <p class="is-6 mb-0-5">{{$request->project->name}}</p>
                                    <div>
                                        <form action="{{ route('request_reject_by_manager', $request->id)}}" method="post" class="mx-0-25">
                                            @csrf @method('PUT')
                                            <div class="field">
                                                <div class="control">
                                                    <textarea type="text" class="textarea" name="reason" placeholder="Alasan penolakan"></textarea>
                                                </div>
                                            </div>
                                            <div class="is-flex justify-content-end">
                                                <button class="button is-danger" type="submit">Tolak</button>
                                                <button type="button" class="ml-0-5 button is-link" @click="hideModal('reject-{{$request->id}}')">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </modal>
                        @endif

                        @if($request->status_id == 2)
                            <form action="{{ route('request_approve_by_employee', $request->id) }}" method="post" class="mx-0-25">
                                @csrf @method('PUT')
                                <button class="button is-small is-success" type="submit">Approve</button>
                            </form>
                            <button class="button is-small is-danger" @click="showModal('reject-{{$request->id}}')">
                                Tolak (Karyawan)
                            </button>
                            
                            <modal :name="'reject-{{$request->id}}'">
                                <div class="box p-1" slot="main-content">
                                    <p class="title is-size-6">Tolak Permintaan Bergabung</p>
                                    <p class="is-6 mb-0-5">{{$request->project->name}}</p>
                                    <div>
                                        <form action="{{ route('request_reject_by_employee', $request->id)}}" method="post" class="mx-0-25">
                                            @csrf @method('PUT')
                                            <div class="field">
                                                <div class="control">
                                                    <textarea type="text" class="textarea" name="reason" placeholder="Alasan penolakan"></textarea>
                                                </div>
                                            </div>
                                            <div class="is-flex justify-content-end">
                                                <button class="button is-danger" type="submit">Tolak</button>
                                                <button type="button" class="ml-0-5 button is-link" @click="hideModal('reject-{{$request->id}}')">Batal</button>
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
        @else
            <div class="my-1 px-2 py-4 has-text-centered has-text-grey-light">
                Belum ada entri data
            </div>    
        @endif
    </div>
    
@endsection
