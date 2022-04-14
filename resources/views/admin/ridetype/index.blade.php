@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 text-center">
                <h4 style="margin: 10px;">View Ride Type</h4>
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
            <div class="col-md-1">
                <a href="{{ route('admin.ridetype.create') }}" class = "btn btn-sm btn-primary" style="margin: 10px;">Add New <i class = "fa fa-plus"></i></a>
            </div>           
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                @if($ridetypes->count() > 0)
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>Ride Type</th>
                            <th>Price</th>
                            <th>price Currency</th> 
                            <th>Capacity of People</th> 
                            <th>Ride Type Image</th>                             
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach($ridetypes as $ridetype)
                                <tr>
                                    <td>{{ $ridetype->ride_type}}</td>
                                    <td>{{$ridetype->price}}</td>  
                                    <td>{{ $ridetype->price_currency}}</td>  
                                    <td>{{ $ridetype->capacity_of_people}}</td>  
                                    <td> <img src="{{ asset($ridetype->ride_type_image) }}" alt="image" width="60" height="40"></td> 
                                     <td>
                                        <a href="{{ route('admin.ridetype.show', $ridetype->id) }}" class = "btn btn-sm btn-info"><i class = "fa fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.ridetype.edit', $ridetype->id) }}" class = "btn btn-sm btn-warning"><i class = "fa fa-edit"></i></a>
                                    </td> 
                                    <td>
                                        <form action="{{ route('admin.ridetype.destroy', $ridetype->id) }}" method = "POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type = "submit" onclick = "return confirm('Are You Sure To Want to Delete?')" name = "submit" class = "btn btn-sm btn-danger"><i class = "fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $ridetypes->links() }}
                @else
                    <h4 style = "text-align:center">No User Found!</h4>
                @endif
            </div>
        </div>
    </div>
@endsection