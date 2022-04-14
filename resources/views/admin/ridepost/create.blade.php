<!-- @extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4 style="margin: 10px;">Add New Ride Post</h4>
                @if(session()->has('message'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-warning text-center">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>            
        </div>
        <br>
        <form action="{{ route('admin.ridepost.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf  


        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
               
                    <div class="form-group">
                  
                    <div class="form-group">
                        <label for="">Pickup Location</label>
                        <input type="text" name = "pickup_location" class = "form-control" placeholder="Pickup location" required>
                    </div>
                    <div class="form-group">
                        <label for="">Pickup Latitude</label>
                        <input type="text" name="pickup_latitude" class = "form-control" placeholder="Pickup latitude" required>
                    </div>
                    <div class="form-group">
                        <label for="">Pickup Longitude</label>
                        <input type="text" name = "pickup_longitude" class = "form-control" placeholder="Pickup longitude" required>
                    </div>
                    <div class="form-group">
                        <label for="">drop location</label>
                        <input type="text" name="drop_location" class = "form-control" placeholder="Drop loction" required>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="">Drop latitude</label>
                        <input type="text" name = "drop_latitude" class = "form-control" placeholder="Drop latitude" required>
                    </div>
                    <div class="form-group">
                        <label for="">Drop longitude</label>
                        <input type="text" name="drop_longitude" class = "form-control" placeholder="Drop longitude" required>
                    </div>
                    <div class="form-group">
                        <label for="">Special instructions</label>
                        <input type="text" name = "special_instructions" class = "form-control" placeholder="Speciaal Instructions" required>
                    </div>
                    <div class="form-group">
                        <label for="">Ride time</label>
                        <input type="text" name="ride_time" class = "form-control" placeholder="Ride Time" required>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for=""></label>
                        <input type="submit" name="submit" class="btn btn-sm btn-primary form-control" value="Add">
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    </form>
@endsection -->