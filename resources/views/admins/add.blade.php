@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" >{{ __('Adding a New Course') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="/admins/add/submit" enctype="multipart/form-data">
                    @csrf
                        <!--row1-->
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Course Title :') }}</label>
                
                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title">    
                            </div>
                        </div>
                        <!--end row1-->

                        <!--row2-->
                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author Name :') }}</label>
                
                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control" name="author">    
                            </div>
                        </div>
                        <!--end row2-->

                        <!--row3-->
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description :') }}</label>
                
                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description"></textarea> 
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
                                        <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview" title="" width="100%" height="100%">
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
                            <div class="form-group row">
                                <label for="interest" class="col-md-4 col-form-label text-md-right">{{ __('Interests : ') }}</label>
                                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/css/bootstrap-select.min.css">
                                <!-- Latest compiled and minified JavaScript -->
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>
                                <!-- (Optional) Latest compiled and minified JavaScript translation files -->
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/i18n/defaults-*.min.js"></script>
                                <div class="col-md-6">
                                    <select id="interest" class="selectpicker" multiple style="background-color: #ecebeb;color: #2b2b2b" name ="interests[]">
                                        @foreach(\App\Models\Interest::all() as $interest)
                                            <option value="{{ $interest['id'] }}">{{ $interest['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <script>  
                                        $(function () {
                                            $('interest').selectpicker();
                                        });
                                    </script>
                                </div>
                            </div>
                            <!--end row5-->
                            <!--row6-->
                            <div class="col-12">
                                <center>
                                    <my-button msg ="Choose File" @error('course') is-invalid @else msg2 ="Non Selected yet"@enderror></my-button>
                                </center>
                                <script>
                                    $('.MyButton input[type="file"]').on('change', function() {
                                        $('.MyButton-path').val(this.value.replace('C:\\fakepath\\', ''));
                                    });
                                </script>
                            </div>
                            <!--end row6-->
                            <!--row7-->
                            <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" >
                                        {{ __('Upload') }}
                                    </button>
                                </div>
                            </div>
                            <!--end row7-->   
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
