@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" >
                    <div class = "row">
                    <div class = "col-10" >{{ $course->title }} by {{ $course->author}}</div>
                    <a class = "col-2 d-flex justify-content-end"  href = "/Course/{{$course->id}}" style="font-size: 20px; font-family: Trispace, sans-serif; color: rgb(236, 235, 235);">back</a>
                    </div>
                </div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <my-vid  path ="/storage/{{ $course['course'] }}"></my-vid>
                    <h6 class ="mb-0 pl-2" >This Video is played using <a href = "https://plyr.io/" style= "color:#e1b12c">Plyr</a>.</h6>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
