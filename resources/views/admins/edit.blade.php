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
                    
                    @foreach(\App\Models\Course::all() as $c)
                        <a href = "/admins/edit/{{$c->id}}" style = "color: #2b2b2b"><h5 >{{$loop->index+1}}. {{$c->title}}</h5></a>
                    @endforeach
                    
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
