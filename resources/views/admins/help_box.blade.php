@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >{{ __('Help box') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(\App\Models\Message::all()->count() < 1)
                        <h4> No Messages!! </h4>
                    @else
                    <table class = 'table'>
                        @foreach(\App\Models\Message::all() as $m)
                            <tr>
                                <td >
                                @if($m->seen)
                                    <a href ="/admins/helpbox/message/{{$m->id}}" style = "color: #576574;"><h5 class = "mb-0">{{substr($m->title,0,30)}}</h5></a>
                                @else
                                    <a href ="/admins/helpbox/message/{{$m->id}}" style = " color: #2b2b2b;"><h5 class = "mb-0">{{substr($m->title,0,30)}}</h5></a>
                                @endif
                                </td>
                                <td>
                                    <a href = "/admins/helpbox/unsee/{{$m->id}}"><button class="btn btn-primary">Unsee</button><a>
                                </td>
                                <td>
                                    <a href = "/admins/helpbox/delete/{{$m->id}}"><button class="btn btn-primary">Delete</button></a>
                                </td>
                            </tr>
                        @endforeach                        
                    </table>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
