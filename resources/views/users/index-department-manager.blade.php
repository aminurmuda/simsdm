@extends('layouts.app')
@section('page-title', 'Daftar Karyawan')

@section('content')

    <div class="container-custom">
        <h1 class="title">Daftar Karyawan</h1>
        @if(count($users) > 0)
            <div class="box mt-1">
                <div class="columns is-hcentered">
                    <div class="column is-2 has-text-weight-bold">Nama</div>        
                    <div class="column is-2 has-text-weight-bold">Role</div>        
                    <div class="column is-2 has-text-weight-bold">Email</div>
                    <div class="column is-3 has-text-weight-bold">Skill</div>
                    <div class="column is-1 has-text-weight-bold">Status</div>  
                    <div class="column is-2 has-text-weight-bold">Aksi</div>  
                </div>
                @foreach($users as $user)
                <div class="columns is-vcentered">
                    <div class="column is-2">{{$user->name}}</div>        
                    <div class="column is-2">{{$user->role->name}}</div>
                    <div class="column is-2">{{$user->email}}</div>
                    <div class="column is-3">
                    @foreach($user->skills as $skill)
                    <button type="button" class="button my-0-25 mx-0- is-small is-info">
                        {{$skill->skill->name}}
                    </button>
                    @endforeach
                    </div>
                    <div class="column is-1 is-flex">{{$user->status->name}}</div>  
                    <div class="column is-2 is-flex">
                        <button class="button is-small is-success" @click="showModal('change-status{{$user->id}}')">
                            Ubah Status
                        </button>
                        
                        <modal :name="'change-status{{$user->id}}'">
                            <div class="box p-1" slot="main-content">
                                <p class="title is-size-6">Ubah Status</p>
                                <div>
                                    <form action="{{ route('change_employee_status', $user->id)}}" method="post" class="mx-0-25">
                                        @csrf @method('PUT')
                                        <div class="field">
                                            <div class="control">
                                                <div class="select is-fullwidth">
                                                    <select name="status_id" id="">
                                                        <option value="" disabled=true selected>-- Pilih Status --</option>
                                                        @foreach($employee_statuses as $employee_status)
                                                        <option value="{{$employee_status->id}}"  {{ $employee_status->id == Auth::user()->status_id ? 'selected' : '' }}>{{$employee_status->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="is-flex justify-content-end">
                                            <button class="button is-success" type="submit">Simpan</button>
                                            <button type="button" class="ml-0-5 button is-link" @click="hideModal('change-status{{$user->id}}')">Tutup</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </modal>
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
