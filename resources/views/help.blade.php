@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >{{ __('Help') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="/help/submit">
                    @csrf
                    <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Your E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Problem Title :') }}</label>
                
                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title">    
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Descripe Your Problem :') }}</label>
                
                            <div class="col-md-8">
                                <textarea id="message" class="form-control" name="message" style ="resize: none;height:300px"></textarea> 
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" >
                                        {{ __('Submit the Problem') }}
                                    </button>
                                </div>
                            </div>
                        @if ($errors->any())
                                <div class="alert alert-danger mt-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif 
                    <form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
