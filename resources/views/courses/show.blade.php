@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="z-index: -1;">{{ $course->title }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       
                    <div class="col col-sm ml-0 pl-0" style="border-radius: 10px;width: 80%;">

                      <div class="row p-2" ><!--First Container -->
                            <div class="col-4">

                              <div class="mb-4 ml-2 " style="border: solid black 2px;border-radius: 30px;background-color: #2b2b2b">
                                    <div class="courseContainer">
                                            @if(is_null($course['course_image']))
                                                <img src="{{ asset('Images/Course.png') }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                            @else
                                                <img src="/storage/{{ $course['course_image'] }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                            @endif

                                            <div class="watchButton">
                                                <a href="/Course/{{$course->id}}/watch">
                                                    <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-collection-play" fill="#f1f2f6" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                                                        <path fill-rule="evenodd" d="M6.258 6.563a.5.5 0 0 1 .507.013l4 2.5a.5.5 0 0 1 0 .848l-4 2.5A.5.5 0 0 1 6 12V7a.5.5 0 0 1 .258-.437z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                              </div>
                            </div>

                            <div class="col-6 d-flex flex-column align-items-right mt-3">
                                 <h1 class="d-inline-block mb-2 " style="font-display:initial;">{{$course->title}}</h1>
                                 <h6 class="card-text pl-2 mb-0" style = "color:#e1b12c;margin-bottom: 0;">Author : {{$course->author}}</h6>
                                 @if(Auth::user()->courses()->where('course_id', $course->id)->exists())
                                    <div class=" d-inline pl-2">
                                        <add-to-my-list-button user-id = "{{ Auth::user()->id }}" course-Id ="{{ $course->id }}" interested = {{!null}} ></add-to-my-list-button>
                                    </div>
                                 @else
                                    <div class=" d-inline pl-2">
                                        <add-to-my-list-button user-id = "{{ Auth::user()->id }}" course-Id ="{{ $course->id }}" interested = {{null}} ></add-to-my-list-button>
                                    </div>
                                 @endif
                                 @if(!is_null($course->veiws))
                                    <div class=" d-inline pl-2 mt-4">
                                            <h6>Veiws : {{$course->veiws}}<h6>
                                    </div>
                                @else
                                    <div class=" d-inline pl-2 mt-4">
                                            <h6>Veiws : 0<h6>
                                    </div>
                                @endif
                            </div> 
                        </div><!--End of First Container -->
                        
                        <div class="col-12 "><!--Second Container -->  
                            <div class="col mt-3 myHeadar" >
                                Course Description :
                            </div>
                            <div class="col-12 myContainer">
                                <p>{{$course->description}}</p>                                           
                            </div>
                          
                            <div class="col-6  pl-0">
                                <div class="col mt-3 col-11 myTagContainer ">
                                    @if($course->interests->count() == 0)
                                        <center><h6 class = "pl-1 col-4 mb-0" style="color:#ecebeb;">No tags yet</h6></center>
                                    @else
                                    @foreach($course->interests as $i)
                                        @if($loop->count >= 5)
                                            @if($loop->index < 5)
                                                <a class = "pl-1 col-2" href ="/interest/{{$i->id}}" style="color:#ecebeb;">{{$i->name}}</a>
                                            @elseif($loop->index == 5)
                                                <div class="btn-group dropdown d-inline dropdown col-2 " aria-haspopup="true" aria-expanded="false" title ='More' ><!-- dropdown dev -->
                                                    <a class=" dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" style="border-radius: 10px; background-color:#ecebeb;height: 20px;width: 20px;padding: 0;background-color: transparent; color: #ecebeb"></a>
                                                        <div class="dropdown-menu dropdown-menu-left " aria-labelledby="dropdownMenuButton" style="font-family: 'Trispace', sans-serif;"><!-- dropdown menu dev -->
                                                        <a class="dropdown-item" href="/interest/{{$i->id}}" >{{ $i->name }}</a>
                                            @elseif($loop->count == $loop->index)
                                                <a class="dropdown-item" href="/interest/{{$i->id}}" >{{ $i->name }}</a>
                                                </div><!-- dropdown menu dev end -->
                                            @else
                                                <a class="dropdown-item" href="/interest/{{$i->id}}" >{{ $i->name }}</a>
                                            @endif
                                        @else
                                            <a class = "pl-1 col-2" href ="/interest/{{$i->id}}" style="color:#ecebeb;">{{$i->name}}</a>
                                        @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div><!--End of Second Container-->
                    </div>   
                </div>
            </div> 
            <div class="card mt-3"> <!--Second Card-->
            
                <div class="card-header" >Similar Courses</div>

                <div class="card-body ">
                    @if($course->getSimilar()->count()==0)
                        <h4 class = "pl-2 col-3" style="color:#2b2b2b;">No Similar Courses</h4>
                    @else
                        <div class = "row">
                        @foreach($course->getSimilar() as $cs)
                        @if($loop->index == 4)
                            @break
                        @endif
                        <div class="col-3 mr-0 d-inline"> {{-- Course --}}
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
                        @endforeach
                        </div>
                    @endif
                </div>
            </div><!--End of Second Card-->         
        </div>
    </div>
</div>
@endsection
