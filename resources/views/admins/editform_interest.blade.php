@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" >{{ __('Edit a Course') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="/admins/edit_interest/{{$interest->id}}/submit" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                        <!--row1-->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Interest name :') }}</label>
                
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value = "{{ $interest->name}}">    
                            </div>
                        </div>
                        <!--end row1-->
                            <!--row6-->
                            <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" >
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                            <!--end row6-->   
                            @if ($errors->any())
                                <div class="alert alert-danger mt-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif              
                    </form>
                    
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
