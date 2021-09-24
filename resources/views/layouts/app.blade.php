<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ "Online Education Academy"}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Trispace:wght@300&family=Ubuntu:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Libre+Franklin:ital,wght@0,600;1,300&family=Pacifico&family=Vampiro+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    
    <!--Plyr-->
    <script src="https://cdn.plyr.io/3.6.4/plyr.js"></script>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.4/plyr.css"/>

    <!--wrapper stuff-->
 
</head>
<body style="background-image: url({{ asset('images/web_bg.jpg') }}); background-size:cover;background-attachment: fixed;">

<div id="app" >
    <div id ="header" style=";border-radius:0px 0px 40px 40px;background-color: rgba(255,255,255, 0.4);backdrop-filter: blur(20px)">
    <div class="d-flex pl-4 flex-row-reverse align-items-center p-2 "> <!-- main-top dev -->
        @guest
            <div class=" d-inline p-3 mr-4 " style="font-family: 'Trispace', sans-serif;"><!-- right-top side dev -->
                <a class="pl-3" href="{{ route('register') }}" style=" width: 100px;align-content: center; color: #ecebeb" role="button" aria-pressed="true">{{ 'REGISTER' }}</a>
                <a class="pl-4" href="{{ route('login') }}" style="  width: 90px; align-content: center;color: #ecebeb;" role="button">{{ "LOG IN" }}</a>
            </div><!-- right-top side dev end -->
        @else
            <div class=" d-inline p-3 mr-3 "> <!-- right-top side dev -->
                <span class="navbar-nav mr-auto  d-inline mr-2 "  style=" font-size: 20px; margin-bottom: 0px; font-variant: small-caps ;font-family: 'Trispace', sans-serif;color:#ecebeb;">{{ Auth::user()->username }}</span>
                <div class="btn-group dropdown d-inline dropdown " aria-haspopup="true" aria-expanded="false"><!-- dropdown dev -->
                    <a class=" dropdown-toggle ml-2 mr-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" style="border-radius: 10px; background-color:#ecebeb;height: 20px;width: 20px;padding: 0;background-color: transparent; color: #ecebeb"></a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuButton" style="font-family: 'Trispace', sans-serif;"><!-- dropdown menu dev -->
                        <a class="dropdown-item" href="/interests/{{ Auth::user() -> id }}" >{{ "Interests" }}</a>
                        @if(Auth::user()->admin)
                            <a class="dropdown-item" href="/admins/panel" >{{ "Admins Panel" }}</a>
                        @endif
                        <a class="dropdown-item" href="/profile/{{ Auth::user() -> id }}/edit">{{ "Settings" }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </div><!-- dropdown menu dev end -->
                </div><!-- dropdown dev end -->
            </div><!-- right-top side dev end -->

        @endguest



        <div class="col pl-1 ml-3"><!-- logo dev -->
            <a href={{ route('home') }} ><img src={{ asset('images/header_logo.svg') }} title = "Online Education Academy" /></a>
            <span class="lockup-logo" style=" font-size: 30px; margin-bottom: 0px; font-variant: small-caps ; font-family: 'Righteous', cursive;COLOR:#2B2B2B;" > Online Education Academy</span>

        </div><!-- logo dev -->

    </div><!-- main-top dev end -->

        <div > <!-- first div -->
            <nav class="navbar navbar-expand-lg d-flex"  style="background-color: #2b2b2b;  font-family: 'Sofia';border-radius: 0px 0px 40px 40px;">
                <div class="col-6"> <!-- form div -->
                    <form class="align-self-end form-inline mb-0 pb-0 " action = "{{ route('search') }}" method="GET">
                        <input type="text" name="search" class="form-control " placeholder="Search" style="border-width: 0.5px; border-style: solid;  border-radius: 20px; width: 260px ;height: 40px; font-family: Libre Franklin" >

                        <div class="d-inline ml-2 align-self-end"> <!-- search button div -->
                            <button class="pl-1"  style="color: black;text-decoration: none;border-radius: 30px;background-color:#ecebeb;border-radius: 32px;height: 36px;width: 40px;outline: 0px;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M23.111 20.058l-4.977-4.977c.965-1.52 1.523-3.322 1.523-5.251 0-5.42-4.409-9.83-9.829-9.83-5.42 0-9.828 4.41-9.828 9.83s4.408 9.83 9.829 9.83c1.834 0 3.552-.505 5.022-1.383l5.021 5.021c2.144 2.141 5.384-1.096 3.239-3.24zm-20.064-10.228c0-3.739 3.043-6.782 6.782-6.782s6.782 3.042 6.782 6.782-3.043 6.782-6.782 6.782-6.782-3.043-6.782-6.782zm2.01-1.764c1.984-4.599 8.664-4.066 9.922.749-2.534-2.974-6.993-3.294-9.922-.749z"/></svg></button>
                        </div><!-- search button div end-->
                    </form>
                </div><!-- form div end -->

                <div class="col-6 col-md-6 col-sm-3 d-flex flex-row-reverse " > <!-- nav right-side div -->
                    <div class="p-2" ><!-- nav right-side item 1 div -->
                        <a class=" btn-lg active" role="button" style="font-size: 20px;font-family: 'Trispace', sans-serif;color:#ecebeb" href="{{ route('about') }}">About Us</a>
                    </div><!-- nav right-side item 1 div end -->
                    <div class="p-2" ><!-- nav right-side item 1 div -->
                        <a class=" btn-lg active" role="button" style="font-size: 20px;font-family: 'Trispace', sans-serif;color:#ecebeb" href="{{ route('help') }}">Help</a>
                    </div><!-- nav right-side item 1 div end -->
                    <div class="p-2"><!-- nav right-side item 2 div -->
                        <a class=" btn-lg active " role="button" style="font-size: 20px;font-family: 'Trispace', sans-serif;color:#ecebeb" href="{{ '/android' }}">Android App</a>
                    </div><!-- nav right-side item 2 div end -->
                    <div class="p-2"><!-- nav right-side item 3 div -->
                        <a class=" btn-lg active " role="button" style="font-size: 20px;font-family: 'Trispace', sans-serif;color:#ecebeb" href="{{ route('home') }}">Home</a>
                    </div><!-- nav right-side item 3 div end -->
                </div><!-- nav right-side div end -->
            </nav>
        </div><!-- first div end -->
    </div>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
