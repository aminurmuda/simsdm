@extends('layouts.app')
@section('page-title', 'Register')
@section('content')
<div class="container is-flex justify-content-center">
    <div class="w-50">
        <div class="card">
                <div class="card-header">
                    <p class="card-header-title">
                        {{ __('Register') }}
                    </p>
                </div>

                <div class="card-content">
                    <div class="content">
                        <form method="POST" action="{{ route('register') }}">
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
                                    <button type="submit" class="button is-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
