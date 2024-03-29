@extends('layouts.app')
@section('page-title', 'Ubah Karyawan')

@section('content')

    <div class="container-custom">
        <h1 class="title">Ubah Karyawan</h1>
        <div class="box">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('PATCH')
                @csrf
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="name" value="{{ $user->name }}" placeholder="Nama User"/>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="email" class="input" name="email" value="{{ $user->email }}" placeholder="Email User"/>                        
                    </div>
                </div>

                <input style="display:none;" type="password" class="input" name="password" value="{{ $user->password }}" placeholder="Pasword"/>
                
                <div class="field">
                    <div class="control">
                        <textarea class="textarea" name="address"placeholder="Alamat Anda">{{ $user->address }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                    <input type="text" class="input" name="birth_place" value="{{ $user->birth_place }}" placeholder="Tempat Lahir Anda"/>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input type="date" class="input" name="birth_date" value="{{ $user->birth_date }}" />
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="department_id">
                                <option value="" disabled=true selected>-- Pilih Departemen --</option>
                                @foreach($departments as $department)
                                <option value="{{$department->id}}" {{ $department->id == $user->department_id ? 'selected' : '' }}>{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="button is-primary">Simpan</button>
            </form>
        </div>
    </div>
    
@endsection
