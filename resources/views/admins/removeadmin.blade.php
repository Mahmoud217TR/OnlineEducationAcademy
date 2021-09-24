@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >{{ __('Remove an Admin :') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach(\App\Models\User::where('admin','=','1')->where('id','<>',Auth::user()->id)->get() as $ad)
                    <a href = '/admins/removeadmin/{{$ad->id}}/confirm' style = "color: #2b2b2b"><h5>Remove {{$ad->username}} from Adminstrator</h5></a>
                    <br>
                    @endforeach
                    
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
