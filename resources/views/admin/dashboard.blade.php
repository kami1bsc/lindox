@extends('layouts.admin.app')
@section('content')
<br>
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <h5 style = "margin-left: 4px;">Admin Panel</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">            
                <div class="row">
                    <div class="col-md-3">
                        <div class="card-counter info">
                            <i class="fa fa-users" style = "font-size: 36px;"></i>
                            <span class="count-numbers" style = "font-size: 24px;">{{$countpassenger}}</span>
                            <span class="count-name" >Total Passenger</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter primary">
                            <i class="fa fa-users" style = "font-size: 36px;"></i>
                            <span class="count-numbers" style = "font-size: 24px;">{{ $countdriver}}</span>
                            <span class="count-name">Total Driver</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter danger">
                            <i class="fa fa-list" style = "font-size: 36px;"></i>
                            <span class="count-numbers" style = "font-size: 24px;">{{$countridetype}}</span>
                            <span class="count-name">Ride Type</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter success">
                            <i class="fa fa-list" style = "font-size: 36px;"></i>
                            <span class="count-numbers" style = "font-size: 24px;">{{$count}}</span>
                            <span class="count-name">Total Post</span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <!-- <div class="col-md-3">
                        <div class="card-counter info">
                            <i class="fa fa-sticky-note" style = "font-size: 36px;"></i>
                            <span class="count-numbers" style = "font-size: 24px;"></span>
                            <span class="count-name">Total Earning</span>
                        </div>
                    </div> -->

                   

                    <!-- <div class="col-md-3">
                        <div class="card-counter danger">
                            <i class="fa fa-users" style = "font-size: 36px;"></i>
                            <span class="count-numbers"></span>
                            <span class="count-name">Completed Bookings</span>
                        </div>
                    </div> -->

                    <!-- <div class="col-md-3">
                        <div class="card-counter primary">
                            <i class="fa fa-sticky-note" style = "font-size: 36px;"></i>
                            <span class="count-numbers" style = "font-size: 24px;"></span>
                            <span class="count-name">Withdraw Requests</span>
                        </div>
                    </div> -->

                </div>
                <!-- -->
                <br>
                <div class="row">
                  

                    <!-- <div class="col-md-3">
                        <div class="card-counter success">
                            <i class="fa fa-sticky-note" style = "font-size: 36px;"></i>
                            <span class="count-numbers"></span>
                            <span class="count-name">Reported Ads</span>
                        </div>
                    </div> -->

                    <!-- <div class="col-md-3">
                        <div class="card-counter success">
                            <i class="fa fa-sticky-note" style = "font-size: 36px;"></i>
                            <span class="count-numbers"></span>
                            <span class="count-name">Reported Stories</span>
                        </div>
                    </div> -->

                    <!-- <div class="col-md-3">
                        <div class="card-counter primary">
                            <i class="fa fa-envelope" style = "font-size: 36px;"></i>
                            <span class="count-numbers" style = "font-size: 24px;"></span>
                            <span class="count-name">Invitations</span>
                        </div>
                    </div>                     -->
                </div>
            </div>            
        </div>
    </div>
    <div class="mt-5">
        <div class="row">
            <div class="col-md-12 text-left">
                <h5>Recent Registered Users</h5>
                @if(session()->has('message'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger text-center">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
        </div> 
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-sm table-hover" id = "dashboard_table">
                        <thead>
                            <th>ID</th>                        
                            <th>Name</th>                            
                            <th>Email</th>
                            <th>Image</th>                            
                            <th>Phone</th>
                            <th>About</th>                                                                     
                            <th>Action</th>
                        </thead>
                        <tbody>                        
                            
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div> 
    </div> 
@endsection