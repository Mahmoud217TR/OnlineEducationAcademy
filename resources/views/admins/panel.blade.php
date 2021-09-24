@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" >{{ __('Admins Panel :') }}</div>

                <div class="card-body d-inline">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href = "/admins/add" style = "color: #2b2b2b"><h5 >1. Add a new Course.</h5></a>
                    <a href = "/admins/edit" style = "color: #2b2b2b"><h5 >2. Edit a Course.</h5></a>
                    <a href = "/admins/delete" style = "color: #2b2b2b"><h5 >3. Delete a Course.</h5></a>
                    <hr>
                    <a href = "/admins/add_interest" style = "color: #2b2b2b"><h5 >4. Add a new Interest.</h5></a>
                    <a href = "/admins/edit_interest" style = "color: #2b2b2b"><h5 >5. Edit an Interest.</h5></a>
                    <a href = "/admins/delete_interest" style = "color: #2b2b2b"><h5 >6. Delete an Interest.</h5></a>
                    <hr>
                    <a href = "/admins/addadmin" style = "color: #2b2b2b"><h5 >7. Add a new Admin.</h5></a>
                    <a href = "/admins/removeadmin" style = "color: #2b2b2b"><h5 >8. Remove an Admin.</h5></a>
                    <hr>
                    <a href = "/admins/helpbox" style = "color: #2b2b2b"><h5 >9. Open Help Box.</h5></a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
