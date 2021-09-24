@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" >{{ __('Delete') }} {{$interest->name}} Interest </div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class = "row pl-3">
                        <h4>Number of Courses with that Interest : {{$interest->courses->count()}}<h4>
                    <div>
                            
                    <div class="form-group col-12 mb-0 mt-4">
                        <form method="post" action="/admins/delete_interest/{{$interest->id}}/submit" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                            <div style = 'margin-left : 170px'>
                                <button type="submit" class="btn btn-primary" >
                                        {{ __('Delete') }}
                                </button>
                            </div>
                        <form>
                    </div>
        
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
