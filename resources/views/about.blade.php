@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >{{ __('About Us') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table" >
                            <tr>
                                <td class="pl-5">
                                    <h3 style="color: #e1b12c ;font-family: 'Libre Baskerville', serif;">{{ __('Front End Devs:') }}</h3>
                                    <ul>
                                        <li><p style="font-family: 'Libre Baskerville', serif;font-family: 'Libre Franklin', sans-serif;font-size: 20px">{{ __('Nour Hamouda') }}</p></li>
                                        <li><p style="font-family: 'Libre Baskerville', serif;font-family: 'Libre Franklin', sans-serif;font-size: 20px">{{ __('Gaafar Soliman') }}</p></li>
                                    </ul>
                                </td>

                                <td class="pl-5">
                                    <h3 style="color: #e1b12c ;font-family: 'Libre Baskerville', serif;">{{ __('Back End Dev:') }}</h3>
                                    <ul>
                                        <li><p style="font-family: 'Libre Baskerville', serif;font-family: 'Libre Franklin', sans-serif;font-size: 20px">{{ __('Mahmoud Mahmoud') }}</p></li>
                                    </ul>
                                </td>


                            </tr>

                            <tr>
                                <td class="pl-5">
                                    <h3 style="color: #e1b12c ;font-family: 'Libre Baskerville', serif;">{{ __('Android Devs:') }}</h3>
                                    <ul>
                                        <li><p style="font-family: 'Libre Baskerville', serif;font-family: 'Libre Franklin', sans-serif;font-size: 20px">{{ __('Yousef Abdah') }}</p></li>
                                        <li><p style="font-family: 'Libre Baskerville', serif;font-family: 'Libre Franklin', sans-serif;font-size: 20px">{{ __('Maya Al-Okda') }}</p></li>
                                    </ul>
                                </td>
                                <td class="pl-5">
                                </td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
