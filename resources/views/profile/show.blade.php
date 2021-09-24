@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4"> {{-- right side --}}

            <div class="card"> {{-- Profile Card --}}
                <div class="card-header" >
                    <div class="row">
                        <div class="d-inline col-md-8">
                            {{ 'Profile' }}
                        </div>
                        <div class="d-inline col-md-4" style="text-align: right">
                            @can('update',$profile)
                            <a href="#" title ='{{ 'Add Courses' }}'>
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="#ecebeb" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class=" align-items-center text-center">
                        @if(is_null($profile->user['profile_pic']))
                            @if($profile->user['gender'] == '0')
                                <img src="{{ asset('Images/ProfilePicFemale.png') }}" class="rounded-circle img-thumbnail" id="preview" width="50%" style="max-width:200px;min-width: 180px;;min-height: 180px;max-height:180px">
                            @else
                                <img src="{{ asset('Images/ProfilePicMale.png') }}" class="rounded-circle img-thumbnail" id="preview" width="50%" style="max-width:200px;min-width: 180px;;min-height: 180px;max-height:180px">
                            @endif
                        @else
                            <img src="/storage/{{ $profile->user['profile_pic'] }}" class="rounded-circle img-thumbnail" id="preview" width="50%" style="max-width:200px;min-width: 180px;;min-height: 180px;max-height:180px">
                        @endif

                        @cannot('update',$profile)
                            <follow-button user-id = "{{ $profile->id }}" follows = '{{ $follows }}'></follow-button>
                        @endcannot

                            <hr>

                            <div class="row mt-3">
                                <div class="col-md-5 " style="font-weight: bold;font-family: Libre Baskerville;text-align: left;">
                                    {{'Full Name :'}}
                                </div>
                                <div class="col-md-7 text-secondary" style="text-align: left;font-family: Ubuntu;">
                                    @if(is_null($profile->user['first_name']))
                                        {{'N/A'}}
                                    @else
                                        {{$profile->user['first_name']}} {{$profile->user['last_name']}}
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-5 " style="font-weight: bold;font-family: Libre Baskerville;text-align: left;">
                                    {{'Followers :'}}
                                </div>
                                <div class="col-md-7 text-secondary" style="text-align: left;font-family: Ubuntu;">
                                    {{ $profile->followers->count() }}
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-5 " style="font-weight: bold;font-family: Libre Baskerville;text-align: left;">
                                    {{'Following :'}}
                                </div>
                                <div class="col-md-7 text-secondary" style="text-align: left;font-family: Ubuntu;">
                                    {{ $profile->user->following->count() }}
                                </div>
                            </div>

                        <hr>

                            <div class="row">
                                <div class="ml-3 text-secondary" style="text-align: left;font-family: Ubuntu;">
                                    {{'@'}}{{$profile->user['username']}}
                                </div>
                            </div>
                    </div>
                </div>
            </div> {{-- Profile Card End--}}

            <div class="card mt-3"> {{-- Info Card --}}
                <div class="card-header" >
                    <div class="row">
                        <div class="d-inline col-md-8">
                            {{ 'Info' }}
                        </div>
                        <div class="d-inline col-md-4" style="text-align: right">
                            @can('update',$profile)
                                <a href="/profile/{{ Auth::user() -> profile -> id }}/edit" title ='{{ 'Edit' }}'>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="#ecebeb" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row mt-3">
                        <div class="col-md-5 " style="font-weight: bold;font-family: Libre Baskerville;text-align: left;">
                            {{'Birthdate :'}}
                        </div>
                        <div class="col-md-7 text-secondary" style="text-align: left;font-family: Ubuntu;">
                            @if(!is_null($profile->user['birthdate']))
                                {{ $profile->user['birthdate'] }}
                            @else
                                {{'N/A'}}
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-5 " style="font-weight: bold;font-family: Libre Baskerville;text-align: left;">
                            {{'Interests :'}}
                        </div>
                        <div class="col-md-7 text-secondary" style="text-align: left;font-family: Ubuntu;">
                            <a class = 'text-secondary' href = '/interests/{{ $profile->user['id'] }}'>
                                @if($profile->user->Interests()->count() == 1)
                                    {{ '1 Interests' }}
                                @else
                                    {{ $profile->user->Interests()->count() }} {{ 'Interests' }}
                                @endif
                            </a>
                        </div>
                    </div>

                </div>
            </div>{{-- Info Card End --}}

        </div>{{-- right side end --}}
        <div class="col-md-8"> {{-- left side --}}
            <div class="card" >
                <div class="card-header" style="z-index: -1;">{{ 'Courses' }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                            @if($profile->user->courses->count() > 0)
                                <div class="row row-cols-md-3 " >
                                @foreach($profile->user->courses as $course)
                                        <div class="col"> {{-- Course --}}
                                            <div class="mb-4 ml-2 " style="border: solid black 2px;border-radius: 30px;background-color: #2b2b2b">
                                                <div class="courseContainer">
                                                    @if(is_null($course['course_image']))
                                                        <img src="{{ asset('Images/Course.png') }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                                    @else
                                                        <img src="/storage/{{ $course['course_image'] }}" class="img-fluid mt-2 p-2 courseImage"  style="border: solid black 2px;border-radius: 30px;background-color: #f1f2f6;min-height: 200px;max-height: 200px;">
                                                    @endif

                                                    <div class="watchButton">
                                                        <a href="#">
                                                            <svg width="5em" height="5em" viewBox="0 0 16 16" class="bi bi-collection-play" fill="#f1f2f6" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                                                                <path fill-rule="evenodd" d="M6.258 6.563a.5.5 0 0 1 .507.013l4 2.5a.5.5 0 0 1 0 .848l-4 2.5A.5.5 0 0 1 6 12V7a.5.5 0 0 1 .258-.437z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>

                                                <center>
                                                    <a href="#" style="color: #f1f2f6;font-family: Libre Baskerville">
                                                        <h5 class="card-title mb-2 mt-2">{{ $course['title'] }}</h5>
                                                    </a>
                                                </center>
                                            </div>
                                        </div>{{-- Course End--}}
                                @endforeach
                                </div>
                            @else
                                @can('update',$profile)
                                <div class="row" style="text-align: center;margin-top: 25%;margin-bottom: 25%">
                                        <h5  class="col text-secondary">{{'You did not Upload any Courses yet.'}}</h5>
                                </div>
                                @else
                                <div class="row" style="text-align: center;margin-top: 25%;margin-bottom: 25%">
                                        <h5  class="col text-secondary">{{'This User did not Upload any Courses yet.'}}</h5>
                                </div>
                                @endcan
                            @endif

                </div>
            </div>
        </div>{{-- left side end --}}
    </div>
</div>
@endsection
