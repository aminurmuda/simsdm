@extends('layouts.app')
@section('page-title', 'Index')

@section('content')

    <div class="container-custom">
        
        <div class="is-flex justify-content-between">
            <h1 class="title">Data Diri</h1>
            <div class="is-flex justify-content-end">
                <a href="/users/{{$user->id}}/edit" class="button is-primary">Ubah Data Diri</a>
                <a href="/users/{{$user->id}}/add-skill" class="button is-link ml-0-5">Tambah Skill</a>
            </div>
        </div>
        <div class="box">
            <!-- can edit if their own profile or has admin role (role with id 1) -->
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Nama</div>
                <div class="column">{{$user->name}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Email</div>
                <div class="column">{{$user->email}}</div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Tempat Lahir</div>
                @if($user->birth_place)
                    <div class="column">{{$user->birth_place}}</div>
                @else
                    <div class="column has-text-grey-lighter">Tempat lahir belum diisi</div>
                @endif
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Tanggal Lahir</div>
                @if($user->birth_date)
                    <div class="column">{{ \Carbon\Carbon::parse($user->birth_date)->format('d F Y')}}</div>
                @else
                <div class="column has-text-grey-lighter">Tanggal lahir belum diisi</div>
                @endif
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Jenis Kelamin</div>
                <div class="column">
                    @if($user->gender == 1)
                        Perempuan
                    @else
                        Laki-Laki
                    @endif
                </div>        
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Alamat</div>
                @if($user->address)    
                <div class="column">{{$user->address}}</div>   
                @else
                <div class="column has-text-grey-lighter">Alamat belum diisi</div>        
                @endif     
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Departemen</div>
                @if($user->department)
                <div class="column">{{$user->department->name}}</div>      
                @else
                <div class="column has-text-grey-lighter">Departemen belom diisi</div>      
                @endif
            </div>
            <div class="columns">
                <div class="column is-2 has-text-weight-bold">Divisi</div>
                @if($user->department)
                <div class="column">{{$user->department->division->name}}</div>        
                @else
                <div class="column has-text-grey-lighter">Divisi belom diisi</div>      
                @endif
            </div>
        </div>

        <div class="box">
            <p class="has-text-weight-bold">Skill Saya</p>
            @if(count($user_skills) > 0)
                @foreach($user_skills as $user_skill)
                <div class="my-0-5 is-flex">
                    <button class="button is-link">
                        {{$user_skill->skill->name}}
                    </button>
                    @if(Auth::user()->role_id == 1)
                        <button style="background:transparent;border:0;" @click="showModal('delete-{{$user_skill->id}}')">
                            <i class="is-size-5 has-text-danger fa fa-window-close"></i>
                        </button>
                        
                        <modal :name="'delete-{{$user_skill->id}}'" v-cloak>
                            <div class="box p-1" slot="main-content">
                                <p class="title is-size-6">Hapus Skill</p>
                                <p class="is-6 mb-2">Anda yakin ingin menghapus skill <b>{{$user_skill->skill->name}}</b></p>
                                <div class="is-flex justify-content-end">
                                <form action="{{ route('delete_skill', $user_skill->id)}}" method="post" class="mx-0-25">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button is-danger" type="submit">
                                        Hapus
                                    </button>

                                    
                                </form>
                                    <button type="button" class="button is-link" @click="hideModal('delete-{{$user_skill->id}}')">Tutup</button>
                                </div>
                            </div>
                        </modal>
                    @endif
                    <!-- <div class="ml-1 is-flex align-items-center">
                        @for ($i = 0; $i < $user_skill->level; $i++)
                        <i class="has-text-warning fa fa-star"></i>
                        @endfor
                    </div> -->
                    
                </div>
                @endforeach
            @else
                <p class="mt-0-5 has-text-grey-lighter">
                    Anda belum menambahkan skill
                </p>
            @endif
        </div>
    </div>
    
@endsection
