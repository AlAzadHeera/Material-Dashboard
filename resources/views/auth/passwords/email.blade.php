@extends('layouts.app')

@section('title','Reset Password')

@push('css')
    <style>
        body{
            background: url("{{asset('img/auth-background.jpg')}}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .card-bg{
            background: rgba(255, 255, 255, .8) !important;
        }

        .card-bg label{
            color: #9124a3 !important;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="offset-1"></div>
        <div class="col-md-8">
            <div class="card card-bg">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
