@extends('layouts.app')
@section('page-title', 'Daftar Karyawan')

@section('content')

    <div class="container">
        <h1 class="title">Daftar Karyawan</h1>
        <!-- can create if has admin role (role with id 1) -->
        @if(Auth::user()->role_id == 1)
        <div class="is-flex justify-content-end">
            <a href="/users/create" class="button is-success">Tambah</a>
        </div>
        @endif
        @if(count($users) > 0)
            <div class="box mt-1">
                <div class="columns is-hcentered">
                    <div class="column is-2 has-text-weight-bold">Nama</div>        
                    <div class="column is-2 has-text-weight-bold">Departemen</div>
                    <div class="column is-2 has-text-weight-bold">Role</div>        
                    <div class="column is-3 has-text-weight-bold">Skill</div>
                    <div class="column is-1 has-text-weight-bold">Status</div>  
                    <div class="column is-2 has-text-weight-bold">Aksi</div>  
                </div>
                @foreach($users as $user)
                <div class="columns is-vcentered">
                    <div class="column is-2">{{$user->name}}</div>        
                    <div class="column is-2">
                        @if($user->department_id)
                            {{$user->department->name}}
                        @endif
                    </div>
                    <div class="column is-2">{{$user->role->name}}</div>
                    <div class="column is-3">
                    @foreach($user->skills as $skill)
                    <button type="button" class="button mx-0 my-0-25 is-small is-info">
                        {{$skill->skill->name}}
                    </button>
                    @endforeach
                    </div>
                    <div class="column is-1">
                        @if($user->status_id)
                            {{$user->status->name}}
                        @endif
                    </div>
                    <div class="column is-2 is-flex">
                    <a href="/users/{{$user->id}}" class="mx-0-25 button is-small is-link">Lihat</a>
                        <a href="{{ route('users.edit',$user->id)}}" class="mx-0-25 button is-small is-success">Ubah</a>
                        <form action="{{ route('users.destroy', $user->id)}}" method="post" class="mx-0-25">
                        @csrf
                        @method('DELETE')
                        <button class="button is-small is-danger" type="submit">Hapus</button>
                        </form>
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
