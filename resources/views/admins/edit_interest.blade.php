@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" >{{ __('Edit an Interest :') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach(\App\Models\Interest::all() as $i)
                        <a href = "/admins/edit_interest/{{$i->id}}" style = "color: #2b2b2b"><h5 >{{$loop->index+1}}. {{$i->name}}</h5></a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
