@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Your Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="/profile/{{ Auth()->user()->id }}/update" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')


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
                            <div class="picture-container col-md-6">
                                <div class="picture">
                                    @if(is_null(Auth::user()->profile_pic))
                                        @if(Auth::user()->gender == 1)
                                            <img src="{{ asset('Images/ProfilePicMale.png') }}" class="picture-src" id="wizardPicturePreview" title="" width="100%" height="100%">
                                        @else
                                            <img src="{{ asset('Images/ProfilePicFemale.png') }}" class="rounded-circle img-thumbnail" id="preview" width="100%">
                                        @endif
                                    @else
                                        <img src="/storage/{{ Auth::user()->profile_pic }}" class="picture-src" id="wizardPicturePreview" title="" width="100%" height="100%">
                                    @endif
                                    <input type="file" id="wizard-picture" name="profile_pic">
                                </div>

                            </div>
                            @error('image')
                                <h5 class="align-self-center " style="font-family: Righteous;color: red"> {{ $message }}</h5>
                            @else
                                <h2 class="align-self-center" style="font-family: Righteous;margin-left:-90px;">Hello {{Auth::user()->username}}</h2>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ Auth::user()->username }}" required autocomplete="first_name" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="last_name">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                            <div class="col-md-6 align-self-center">
                            <div class="custom-control custom-radio custom-control-inline">
                                @if(Auth::user()->gender == 1)
                                    <input type="radio" id="Female" name="gender" class="custom-control-input" required value="0">
                                @else
                                    <input type="radio" id="Female" name="gender" class="custom-control-input" required value="0" checked>
                                @endif
                                <label class="custom-control-label" for="Female">Female</label>
                            </div>
                            
                            <div class="custom-control custom-radio custom-control-inline">
                                @if(Auth::user()->gender == 1)
                                    <input type="radio" id="Male" name="gender" class="custom-control-input" required value="1" checked>
                                @else
                                    <input type="radio" id="Male" name="gender" class="custom-control-input" required value="1">
                                @endif
                                <label class="custom-control-label" for="Male">Male</label>
                            </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right mr-3">{{ __('Birthdate') }}</label>
                            <input  type="date" id="birthdate" name="birthdate" class="form-control col-md-3" max="<?php echo date('Y-m-d'); ?>"required value = "{{ Auth::user()->birthdate }}">
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" >
                                    {{ __('Save') }}
                                </button>
                                <a class="pl-3" href = "/profile/{{Auth::user()->id}}/passwordrest" style = "text-decoration: underline; width: 50px; align-content: center;color: #2b2b2b; font-family:'Righteous'" role="button">Change Password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2 align-self-center" style="margin-left: -107px"><img src="{{ asset('Images/robot_2.png') }}" height="300px" style="pointer-events: none;"></div>
    </div>
</div>
@endsection
