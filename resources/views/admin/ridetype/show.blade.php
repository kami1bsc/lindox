@extends('layouts.admin.app')
@section('content')

<h4 style="margin: 10px;">list of Ride Type</h4>






<form action="">
<table class="table table-sm table-hover">
                        <thead>
                            <th>Ride Type</th>
                            <th>{{ $ridetypes->ride_type}}</th>
                        <tbody>

                                <tr> 
                                <th>Price</th>
                            <th>{{$ridetypes->price}}</th>
                                </tr>

                                <tr>
                                   <th>Price Currency</th>
                               <th>{{ $ridetypes->price_currency}}</th>
                                   </tr>
                                   <tr>
                                   <th>Capcity Of People</th>
                               <th>{{ $ridetypes->capcity_of_people}}</th>
                                   </tr>
                                   <tr>
                                   <th>Ride Type Photo</th>
                               <th><img src="{{ asset($ridetypes->ride_type_image) }}" alt="image" width="60" height="40"></th>
                                   </tr>
                                   <tr>
                                  
                                  
                                  
                                   <th> Created Date</th>
                               <th>{{  $ridetypes->created_at}}</th>
                                   </tr>
                                   <tr>
                                   <th> Updated date</th>
                               <th>{{ $ridetypes->updated_at}}</th>
                                   </tr>
                        

                       

                       
                        </tbody>

                       </thead>

                    </table>
                    @endsection