@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >
                    <div class = "row">
                        <div class = 'col-9   d-inline'>{{$message->title}}</div>
                            <div class="d-inline col-3" style="text-align: right">
                                <a class = "btn-lg active"  href = "/admins/helpbox" style="font-size: 20px; font-family: Trispace, sans-serif; color: rgb(236, 235, 235);">Back</a>
                            </div>
                        </div>
                    </div>
                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class = 'table'>
                    <tr class = "row">
                        <td class ="col-2"><h4 class = "mt-1" style = "color:#e1b12c">Title:<h4></td>
                        <td class ="col-10"><h5 class = "mt-2">{{substr($message->title,0,55)}}</h5></td>
                    </tr>
                    <tr class = "row">
                        <td class ="col-2"><h4 class = "mt-1" style = "color:#e1b12c">From:<h4></td>
                        <td class ="col-10"><h5 class = "mt-2">{{$message->email}}</h5></td>
                    </tr>
                    <tr class = "row">
                        <td class ="col-2"><h4 class = "mt-1" style = "color:#e1b12c"><h4></td>
                        <td class ="col-10"><textarea  class="form-control" disabled style ="resize: none;height:300px">{{$message->message}}</textarea> </td>
                    </tr>
                    <tr class = "row">
                        <td class ="col-2"></td>
                        <td class ="col-2">
                            <a href = "/admins/helpbox/unsee/{{$message->id}}"><button class="btn btn-primary">Unsee</button><a>
                        </td>
                        <td class ="col-2"></td>
                        <td class ="col-2">
                            <a href = "/admins/helpbox/delete/{{$message->id}}"><button class="btn btn-primary">Delete</button></a>
                        </td>
                    </tr>
                    </table>
                    
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
