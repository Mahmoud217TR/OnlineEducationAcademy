@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    somthing
                </div>
                <div class="card-body"></div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >{{ __('Help') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-2">hi</div>
                    <div class="col-md-2">hi</div>
                    <div class="col-md-2">hi</div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
