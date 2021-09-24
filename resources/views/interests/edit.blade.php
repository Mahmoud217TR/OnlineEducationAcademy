@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" > 
                    <div class="row">
                        <div class="d-inline col-md-8">
                            {{ ('Edit Your Interests') }}
                        </div>
                        <div class="d-inline col-md-4" style="text-align: right">
                            <a class = "btn-lg active"  href = "/interests/{{$user->id}}" style="font-size: 20px; font-family: Trispace, sans-serif; color: rgb(236, 235, 235);">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered" >
                    <tr>
                    @foreach(\App\Models\Interest::all() as $interest)
                        <td width="25%">
                        <center>
                            @if($user->interests()->where('interest_id', $interest['id'])->exists())
                                <div class="row d-inline">{{$interest['name']}}</div><br><div class="row d-inline"><favorite-button user-id = "{{ $user->id }}" interest-Id ="{{ $interest['id'] }}" interested = {{!null}} ></favorite-button></div>
                            @else
                                <div class="row d-inline">{{$interest['name']}}</div><br><div class="row d-inline"><favorite-button user-id = "{{ $user->id }}" interest-Id ="{{ $interest['id'] }}" interested = {{null}} ></favorite-button></div>
                            @endif 
                            @if($loop->index%4 == 3)
                                </tr>
                                <tr>
                            @endif
                            </center>
                        </td>
                    @endforeach
                    </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
