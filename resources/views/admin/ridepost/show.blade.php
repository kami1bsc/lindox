@extends('layouts.admin.app')
@section('content')

<h4 style="margin: 10px;">Ride Post list</h4>

<form action="">
<table class="table table-sm table-hover">
                        <thead>
                            <th>Pickup location:</th>
                            <th>{{$rideposts->pickup_location}}</th>
                        <tbody>

                                <tr> 
                                <th>Pickup_latitude:</th>
                            <th>{{ $rideposts->pickup_latitude }}  </th>
                                </tr>
                                <tr> 
                                <th>Pickup longitude:</th>
                            <th>{{ $rideposts->pickup_longitude }}  </th>
                                </tr>

                                <tr> 
                                <th>Drop location:</th>
                            <th>{{ $rideposts->drop_location }}  </th>
                                </tr>
                                <tr> 
                                <th>Pickup_latitude:</th>
                            <th>{{ $rideposts->pickup_latitude }}  </th>
                                </tr>

                                <tr> 
                                <th>drop latitude:</th>
                            <th>{{ $rideposts->drop_latitude }}  </th>
                                </tr>
                                <tr> 
                                <th>Drop longitude:</th>
                            <th>{{ $rideposts->drop_longitude }}  </th>
                                </tr>  

                                <tr> 
                                <th>special instructions:</th>
                            <th>{{ $rideposts->special_instructions }}  </th>
                                </tr>
                                <tr> 
                                <th>Ride time:</th>
                            <th>{{ $rideposts->ride_time }}  </th>
                                </tr>
                                <tr>
                                <tr> 
                                <th>Ride status:</th>
                            <th>{{ $rideposts->ride_status }}  </th>
                                </tr>
                                <tr>
                              


@endsection