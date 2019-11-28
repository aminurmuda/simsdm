@extends('layouts.app')
@section('page-title', 'Ubah Role')

@section('content')

    <div class="container">
        <h1 class="title">Ubah Role</h1>
        <div class="box">
            <form method="post" action="{{ route('store_change_role', Auth::user()->id) }}">
                @csrf @method('PUT')
                <input style="display:none;" type="text" name="prev_url" value="{{url()->previous()}}">
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="role_id" id="">
                                <option value="" disabled=true selected>-- Pilih Role --</option>
                                @foreach($role_lists as $role_list)
                                <option value="{{$role_list->role->id}}"  {{ $role_list->role->id == Auth::user()->role_id ? 'selected' : '' }}>{{$role_list->role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="is-flex justify-content-end">
                    <button type="submit" class="button is-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
