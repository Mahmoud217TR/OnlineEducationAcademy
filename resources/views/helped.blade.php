@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >{{ __('Thanks for your feedback <3 ') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 style="color: rgb(43, 43, 43);">Your message Had arrived to our box and we are working on it.</h4>
                    <h6 class = "pl-2"style="color: rgb(225, 177, 44);">We will answer your request at your email.<h6>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
