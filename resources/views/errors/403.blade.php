@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Error 403') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class = "d-flex justify-content-end">
                        <img src = {{ asset('Images/Error403.png') }} width = 100%  />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
