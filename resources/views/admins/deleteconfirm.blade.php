@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" >{{ __('Delete a Course') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class = "row">
                        <div class="col-6 mr-0">
                                @if(is_null($course['course_image']))
                                    <img src="{{ asset('Images/Course.png') }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                @else
                                    <img src="/storage/{{ $course['course_image'] }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                @endif
                        </div>
                        <div class="col-6 d-flex flex-column pl-0">
                            <h2 class ="mt-4 mb-0">{{ $course->title}}</h2>
                            <h6 class ="ml-1" style = "color:#e1b12c">By : {{ $course->author}}</h6>
                            <h6 class ="ml-1" style = >Veiws : {{ $course->veiws}}</h6>
                        </div>
                    </div>
                            
                    <div class="form-group col-12 mb-0 mt-4">
                        <form method="post" action="/admins/delete/{{$course->id}}/submit" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                            <div class=' offset-5'>
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
