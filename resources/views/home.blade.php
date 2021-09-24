@extends('layouts.app')

@section('content')
<div class="container col-11">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <center>Most Popular</center>
                </div>
                <div class="card-body" >
                <!-- Opps-->
                    <div id="carousel1" class="carousel slide" data-ride="carousel" style = "background-color:#747d8c ;border-radius:30px"><!-- 1 -->
                        <ol class="carousel-indicators">
                            @if(\App\Models\Course::all()->count() < 5 && \App\Models\Course::all()->count()!=0)
                                @foreach(\App\Models\Course::all() as $c)
                                    @if($loop->index == 0)
                                        <li data-target="#carousel1" data-slide-to="0" class="active" ></li>
                                    @else
                                        <li data-target="#carousel1" data-slide-to="{{$loop ->index}}"  ></li>
                                    @endif
                                @endforeach
                            @else
                            <li data-target="#carousel1" data-slide-to="0" class="active" ></li>
                            <li data-target="#carousel1" data-slide-to="1" ></li>
                            <li data-target="#carousel1" data-slide-to="2" ></li>
                            <li data-target="#carousel1" data-slide-to="3" ></li>
                            <li data-target="#carousel1" data-slide-to="4" ></li>
                            @endif
                        </ol>
                        <div class="carousel-inner"><!-- 2 -->
                        
                        @foreach(\App\Models\Course::getMostPopular() as $cs)
                            @if($loop->index == 0)
                                <div class="carousel-item active pr-4 pl-4"><!-- 3 -->
                            @elseif($loop->index == 5)
                                @break
                            @else
                                <div class="carousel-item pr-4 pl-4"><!-- 3 -->
                            @endif
                            <div class="col-3 mr-0 d-inline"> {{-- Course --}}
                                <div class="mb-4 ml-2 mr-2" style="border: solid black 2px;border-radius: 30px;background-color: #2b2b2b"><!-- c1 -->
                                    <div class="courseContainer"><!-- c2 -->
                                        @if(is_null($cs['course_image']))
                                            <img src="{{ asset('Images/Course.png') }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                        @else
                                            <img src="/storage/{{ $cs['course_image'] }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                        @endif

                                        <div class="watchButton" style = 'margin-left: 110px'><!-- c3 -->
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
                            </div><!-- 3 -->
                        
                        @endforeach
                        </div><!-- 2 -->
                        <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true" ></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div><!-- 1 -->
                <!-- Opps End-->
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <center>Based on your Interests</center>
                </div>
                <div class="card-body">
                <div id="carousel12" class="carousel slide" data-ride="carousel" style = "background-color:#747d8c ;border-radius:30px"><!-- 1 -->
                        <ol class="carousel-indicators">
                            @if(\App\Models\Course::getSameInterests()->count() < 5 && \App\Models\Course::getSameInterests()->count()!=0)
                                @foreach(\App\Models\Course::getSameInterests() as $c)
                                    @if($loop->index == 0)
                                        <li data-target="#carousel12" data-slide-to="0" class="active" ></li>
                                    @else
                                        <li data-target="#carousel12" data-slide-to="{{$loop ->index}}" ></li>
                                    @endif
                                @endforeach
                            @else
                            <li data-target="#carousel12" data-slide-to="0" class="active" ></li>
                            <li data-target="#carousel12" data-slide-to="1" ></li>
                            <li data-target="#carousel12" data-slide-to="2" ></li>
                            <li data-target="#carousel12" data-slide-to="3" ></li>
                            <li data-target="#carousel12" data-slide-to="4" ></li>
                            @endif
                        </ol>
                        <div class="carousel-inner"><!-- 2 -->
                        
                        @foreach(\App\Models\Course::getSameInterests() as $cs)
                            @if($loop->index == 0)
                                <div class="carousel-item active pr-4 pl-4"><!-- 3 -->
                            @elseif($loop->index == 5)
                                @break
                            @else
                                <div class="carousel-item pr-4 pl-4"><!-- 3 -->
                            @endif
                            <div class="col-3 mr-0 d-inline"> {{-- Course --}}
                                <div class="mb-4 ml-2 mr-2" style="border: solid black 2px;border-radius: 30px;background-color: #2b2b2b"><!-- c1 -->
                                    <div class="courseContainer"><!-- c2 -->
                                        @if(is_null($cs['course_image']))
                                            <img src="{{ asset('Images/Course.png') }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                        @else
                                            <img src="/storage/{{ $cs['course_image'] }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                        @endif

                                        <div class="watchButton" style = 'margin-left: 110px'><!-- c3 -->
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
                            </div><!-- 3 -->
                        
                        @endforeach
                        </div><!-- 2 -->
                        <a class="carousel-control-prev" href="#carousel12" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel12" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div><!-- 1 -->
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="z-index: -1;" >{{ __('Your Courses') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach(Auth::user()->courses->reverse() as $cs)
                        @if($loop->index%3 == 0)
                            <div class ='row'>
                        @endif
                        <div class="col-4 mr-0 d-inline"> {{-- Course --}}
                            <div class="mb-4 ml-2 " style="border: solid black 2px;border-radius: 30px;background-color: #2b2b2b">
                                <div class="courseContainer">
                                    @if(is_null($cs['course_image']))
                                        <img src="{{ asset('Images/Course.png') }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                    @else
                                        <img src="/storage/{{ $cs['course_image'] }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                    @endif

                                    <div class="watchButton">
                                        <a href="/Course/{{$cs->id}}">
                                            <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-collection-play" fill="#f1f2f6" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                                                <path fill-rule="evenodd" d="M6.258 6.563a.5.5 0 0 1 .507.013l4 2.5a.5.5 0 0 1 0 .848l-4 2.5A.5.5 0 0 1 6 12V7a.5.5 0 0 1 .258-.437z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                                <center>
                                    <a href="/Course/{{$cs->id}}" style="color: #f1f2f6;font-family: Libre Baskerville">
                                        <h5 class="card-title mb-2 mt-2">{{ $cs['title'] }}</h5>
                                    </a>
                                </center>
                            </div>
                        </div>{{-- Course End--}}
                        @if($loop->index%3 == 2)
                        </div>
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
