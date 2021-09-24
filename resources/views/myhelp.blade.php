@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >{{ __('Help') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table" >
                            <tr>
                                <th style="color: #e1b12c;font-family: Libre Franklin">Fonts : </th>
                            </tr>
                            <tr>
                                <td style="font-family: 'Trispace'">Trispace</td>
                                <td style="font-family: 'Ubuntu'">Ubuntu</td>
                                <td style="font-family: 'Libre Baskerville'">Libre Baskerville</td>
                            </tr>
                            <tr>
                                <td style="font-family: 'Vampiro One'">Vampiro One</td>
                                <td style="font-family: 'Pacifico'">Pacifico</td>
                                <td style="font-family: 'Libre Franklin'">Libre Franklin</td>
                            </tr>
                            <tr>
                                <td style="font-family: 'Righteous'">Righteous</td>
                                <td style="font-family: 'Oswald'">Oswald</td>
                            </tr>
                            <tr>
                                <th style="color: #e1b12c;font-family: Libre Franklin">Colors : </th>
                            </tr>
                            <tr>
                                <td style="font-family: Oswald"><div class="badge badge-secondary" style="background-color: #2b2b2b;height: 40px;width: 100px">#2b2b2b</div></td>
                                <td style="font-family: Oswald"><div class="badge badge-secondary" style="background-color: #e1b12c;height: 40px;width: 100px">#e1b12c</div></td>
                                <td style="font-family: Oswald"><div class="badge badge-secondary" style="color:black;background-color: #ecebeb;height: 40px;width: 100px">#ecebeb</div></td>
                            </tr>
                            <tr>
                                <td style="font-family: Oswald"><div class="badge badge-secondary" style="background-color: #f1f2f6;height: 40px;width: 100px">#f1f2f6</div></td>
                                <td style="font-family: Oswald"><div class="badge badge-secondary" style="color:black;background-color:#576574;height: 40px;width: 100px">#576574</div></td>
                                <td style="font-family: Oswald"><div class="badge badge-secondary" style="color:black;background-color:#747d8c;height: 40px;width: 100px">#747d8c</div></td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
