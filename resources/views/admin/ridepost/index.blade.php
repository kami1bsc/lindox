
@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 text-center">
                <h4 style="margin: 10px;">Ride Post</h4>
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
            <!-- <div class="col-md-1">
                <a href="{{ route('admin.ridepost.create') }}" class = "btn btn-sm btn-primary" style="margin: 10px;">Add New <i class = "fa fa-plus"></i></a>
            </div>            -->
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                @if($rideposts->count() > 0)
                    <table class="table table-sm table-hover">
                        <thead>
                           
                            <th>Passenger</th>
                            <th>Driver</th>
                            <th>Ride Type</th>
                            <th>Pickup Location</th>
                            <th>Drop Location</th>
                            <th>Special Instructions</th>
                            <th>Ride Time</th>   
                            <th>Ride stutus</th>                         
                            <th>View</th>
                            <!-- <th>Edit</th> -->
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach($rideposts as $ridepost)
                                <tr>
                                    <td>{{ $ridepost->passenger->name}}</td>
                                    <td>{{ $ridepost->driver_id}}</td>
                                    <td>{{ $ridepost->ridetype->ride_type}}</td>
                                    <td>{{ $ridepost->pickup_location}}</td>
                                    <td>{{ $ridepost->drop_location}}</td>
                                    <td>{{ $ridepost->special_instructions}}</td>
                                    <td>{{ $ridepost->ride_time}}</td>
                                    <td>{{ $ridepost->ride_status}}</td>
                                    
                                                                     
                                     <td>
                                        <a href="{{ route('admin.ridepost.show', $ridepost->id) }}" class = "btn btn-sm btn-info"><i class = "fa fa-eye"></i></a>
                                    </td>
                                    <!-- <td>
                                        <a href="{{ route('admin.ridepost.edit', $ridepost->id) }}" class = "btn btn-warning"><i class = "fa fa-edit"></i></a>
                                    </td> -->
                                   
                                    <td>
                                        <form action="{{ route('admin.ridepost.destroy', $ridepost->id) }}" method = "POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type = "submit" onclick = "return confirm('Are You Sure To Want to Delete?')" name = "submit" class = "btn btn-sm btn-danger"><i class = "fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $rideposts->links() }}
                @else
                    <h4 style = "text-align:center">No User Found!</h4>
                @endif
            </div>
        </div>
    </div>
@endsection