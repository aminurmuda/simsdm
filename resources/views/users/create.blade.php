@extends('layouts.app')
@section('page-title', 'Create')

@section('content')

    <div class="container">
        <h1 class="title">Create User</h1>
        <div class="box">
            <form method="POST" action="{{ route('store_user') }}">
                @csrf
                <div class="field">
                    <div class="control">
                        <input id="name" type="text" class="input @error('name') is-danger @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                    </div>

                    @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="field">
                    <div class="control">
                        <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">
                    </div>

                    @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    </div>

                    @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <div class="control">
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="role_id">
                                <option value="" disabled=true selected>-- Pilih Role --</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-primary">
                            {{ __('Create User') }}
                        </button>
                    </div>
                </div>
            </form> 
        </div>
    </div>
    
@endsection