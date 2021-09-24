@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="z-index: -1;">{{ $interest->name }} Courses :</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($courses->count() < 1)
                        <h3 style = "color :#2b2b2b">No Courses Yet!!</h3>
                    @else
                        @foreach($courses as $cs)
                            @if($loop->index%4 == 0)
                                <div class = "row">
                            @endif

                            <div class="col-3 mr-0 d-inline"> {{-- Course --}}
                                <div class="mb-4 ml-2 " style="border: solid black 2px;border-radius: 30px;background-color: #2b2b2b"><!-- c1 -->
                                    <div class="courseContainer"><!-- c2 -->
                                        @if(is_null($cs['course_image']))
                                            <img src="{{ asset('Images/Course.png') }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                        @else
                                            <img src="/storage/{{ $cs['course_image'] }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                        @endif

                                        <div class="watchButton" ><!-- c3 -->
                                            <a href="/Course/{{$cs->id}}">
                                                <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-collection-play" fill="#f1f2f6" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                                                    <path fill-rule="evenodd" d="M6.258 6.563a.5.5 0 0 1 .507.013l4 2.5a.5.5 0 0 1 0 .848l-4 2.5A.5.5 0 0 1 6 12V7a.5.5 0 0 1 .258-.437z"/>
                                                </svg>
                                            </a>
                                        </div><!-- c3 -->
                                    </div><!-- c2 -->

                                        <center>
                                            <a href="/Course/{{$cs->id}}" style="color: #f1f2f6;font-family: Libre Baskerville">
                                                <h5 class="card-title mb-2 mt-2">{{ $cs['title'] }}</h5>
                                            </a>
                                        </center>
                                    </div><!-- c1 -->
                                </div>{{-- Course End--}}

                            @if($loop->index%4 == 3)
                                </div>
                            @endif
                        @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
