@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >{{ ('Login required!!') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row pl-3">
                        <h4>To Continue this action you should have to be a user.</h4>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4 ">
                            <a class = "pr-3" href ="/register" style="align-content: center; color: rgb(43, 43, 43); text-decoration: underline; font-family: Righteous;">Register</a>
                            <a style="font-family: Righteous;">or</a>
                            <a class = "pl-3" href ="/login" style="align-content: center; color: rgb(43, 43, 43); text-decoration: underline; font-family: Righteous;">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
