@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" >{{ __('Edit a Course') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="/admins/edit/{{$course->id}}/submit" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                        <!--row1-->
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Course Title :') }}</label>
                
                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title" value = "{{ $course->title}}">    
                            </div>
                        </div>
                        <!--end row1-->

                        <!--row2-->
                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author Name :') }}</label>
                
                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control" name="author" value = "{{ $course->author}}">    
                            </div>
                        </div>
                        <!--end row2-->

                        <!--row3-->
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description :') }}</label>
                
                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description">{{ $course->description}}</textarea> 
                            </div>
                        </div>
                        <!--end row3-->  
                        <!--row4-->
                            <script>
                                $(document).ready(function(){
                                    // Prepare the preview for profile picture
                                    $("#wizard-picture").change(function(){
                                        readURL(this);
                                    });
                                });
                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                            <div class="form-group row ">
                                <div class="picture-container col-md-12">
                                    <div class="picture">
                                        @if(is_null($course->course_image))
                                        <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview" title="" width="100%" height="100%">
                                        @else
                                        <img src="/storage/{{$course->course_image}}" class="picture-src" id="wizardPicturePreview" title="" width="100%" height="100%">
                                        @endif
                                        <input type="file" id="wizard-picture" name="course_image">
                                    </div>
                                </div>
                            </div>
                            @error('image')
                                <div class="form-group row ">
                                    <div class="col-md-12">
                                        <center>
                                            <h5 class="align-self-center " style="font-family: Righteous;color: red"> {{ $message }}</h5>
                                        </center>
                                    </div>
                                </div>
                            @else
                                <div class="form-group row ">
                                    <div class="col-md-12">
                                        <center>
                                            <label class="align-self-center" for="wizard-picture" style="font-family: Righteous;"> {{ ('Inseret an Image') }}</label>
                                        </center>
                                    </div>
                                </div>
                            @enderror
                            <!--end row4-->
                            <!--row5-->
                            <div class="form-group row ">
                                    <div class="col-md-12">
                                        <center>
                                        <a href = "/admins/edit_course_interests/{{$course->id}}" style = "color: #2b2b2b;"><h6>Edit Course Interests<h6></a>
                                        </center>
                                    </div>
                                </div>
                            <!--end row5-->
                            
                            <!--row6-->
                            <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" >
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                            <!--end row6-->   
                            @if ($errors->any())
                                <div class="alert alert-danger mt-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif              
                    </form>
                    
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
