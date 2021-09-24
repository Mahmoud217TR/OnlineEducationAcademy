@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" > 
                        <div class="row">
                            <div class="d-inline col-md-8">
                            {{ ('Your Interests') }}
                            </div>
                            <div class="d-inline col-md-4" style="text-align: right">
                                @can('update',$user->profile)
                                    <a href="/interests/{{ $user->id }}/edit" title ='{{ "Edit Interests" }}'>
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="#ecebeb" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach( $user -> interests as $interest)
                        <h6>{{$interest['name']}}</h6>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
