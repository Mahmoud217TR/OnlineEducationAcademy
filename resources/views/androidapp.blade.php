@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card col-8">
                <div class="card-header" >{{ __('Download Our Android App') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                                  <!-- this is our information table  -->
                <table class="table " >
                    <thead>
                        <tr>
                            <th class="col" colspan = 2 >
                                <center><img src="{{ asset('images/header_logo.svg') }}" style="width:120; height: 120px; "></img></center>
                            </th>
                        </tr>
                    </thead>
           
                    <tbody>
                        <!-- this is the one row after head conatin app name  -->
                        <tr class="table-secondary">
                            <th scope="row">App name: </th>
                            <td>Online Education Academy</td>
                        </tr>
                        <!-- this is the secound row after head conatin version app  -->
                        <tr>
                            <th scope="row">App version: </th>
                            <td>1.0.0</td>    
                        </tr>

                        <!-- this is the third row after head conatin date of the final update -->
                        <tr class="table-secondary">
                            <th scope="row">Last Updated: </th>    
                            <td>28-Aug-2021</td>
                        </tr>

                        <!-- this is the fourth row after head conatin size of app  -->
                        <tr>
                            <th scope="row">App size:</th>
                            <td>8.5mb</td>
                        </tr>

                        <!-- this is the fifth row after head conatin Requires Android -->
                        <tr class="table-secondary">
                            <th scope="row">Requires Android:</th>
                            <td>6.0 Marshmallow or Above</td>
                        </tr>

                        <!-- this is the Sixth row after head conatin counter of Installs  -->
                        <tr>
                            <th scope="row">Downloads:</th>
                            <td>0</td>
                        </tr>

                        <!-- this is the Seventh row after head conatin button to download   -->
                        <tr>
                            <td colspan="2">
                                <center>
                                <a href="/android/download">
                                    <button type="submit" class="btn btn-primary pt-2" style="background-color: #3f3f3f; border-color:black;">
                                        Download
                                    </button>
                                </a>
                            </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
