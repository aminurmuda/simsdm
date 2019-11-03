@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        <div class="">
            
            <div class="card">
                <div class="card-header">
                    <p class="card-header-title">
                        {{ __('Login') }}
                    </p>
                </div>

                <div class="card-content">
                    <div class="content">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="field">
                                <div class="control">
                                    <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label class="checkbox">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-primary is-small">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="is-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
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
