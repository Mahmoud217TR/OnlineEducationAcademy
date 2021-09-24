@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >{{ __('Add a new Admin') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="/admins/addadmin/confirm">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('user id :') }}</label>
                
                            <div class="col-md-8">
                                <input id="id" type="text" class="form-control" name="id">    
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" >
                                        {{ __('Make Admin') }}
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
