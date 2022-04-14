@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4 style="margin: 10px;">Update Destinations</h4>
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
        <form action="{{ route('admin.ridetype.update',$ridetypes[0]->id ) }}" method="POST" enctype="multipart/form-data" >
        @csrf  
        {{ method_field('PUT') }}

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
               
                    <div class="form-group">
                  
                    <div class="form-group">
                        <label for="">Ride Type</label>
                        <input type="text" name = "ride_type" value = '{{ $ridetypes[0]->ride_type}}' class ="form-control" placeholder="Ride type" required>
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name = "price" value = '{{ $ridetypes[0]->price}}' class ="form-control" placeholder="Price" required>
                    </div>

                    <div class="form-group">
                        <label for="">Price Currency</label>
                        <input type="text" name = "price_currency" value = '{{ $ridetypes[0]->price_currency}}' class ="form-control" placeholder="Price Currency" required>
                    </div>

                    <div class="form-group">
                        <label for="">Capacity of People</label>
                        <input type="text" name = "capacity_of_people" value = '{{ $ridetypes[0]->capacity_of_people}}' class ="form-control" placeholder="Capacity of People" required>
                    </div>

                    <div class="form-group">
                        <label for="">Ride Type Image</label>
                        <input type="file" name="ride_type_image" value = '{{ $ridetypes[0]->ride_type_image}}' class = "form-control" placeholder="Ride Type Image" required>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for=""></label>
                        <input type="submit" name="submit" class="btn btn-sm btn-primary form-control" value="Update">
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    </form>
@endsection