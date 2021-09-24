@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Complete Your Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('complete') }}" enctype="multipart/form-data">
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
                                    <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview" title="" width="100%" height="100%">
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
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                            <div class="col-md-6 align-self-center">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="Female" name="gender" class="custom-control-input" required value="0">
                                <label class="custom-control-label" for="Female">Female</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="Male" name="gender" class="custom-control-input" required value="1">
                                <label class="custom-control-label" for="Male">Male</label>
                            </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="interest" class="col-md-4 col-form-label text-md-right">{{ __('Interest ') }}</label>
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
                                <script>  $(function () {
                                        $('interest').selectpicker();
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right mr-3">{{ __('Birthdate') }}</label>
                            <input  type="date" id="birthdate" name="birthdate" class="form-control col-md-3" max="<?php echo date('Y-m-d'); ?>"required>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" >
                                    {{ __('Save') }}
                                </button>
                                <a class="pl-3" href = "{{ route('help')  }}" style = "text-decoration: underline; width: 50px; align-content: center;color: #2b2b2b; font-family:'Righteous'" role="button">Help</a>
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
