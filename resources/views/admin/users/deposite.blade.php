@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 text-center">
                <h4 style="margin: 10px;">Deposite Amount</h4>
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

        <br>
        <div class="row">
            <div class="col-md-12">
                @if($deposite_history->count() > 0)
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>Deposite Amount</th>
                            <th>Deposite Time</th> 
                            <th>Action</th>                           
                        </thead>
                        <tbody>
                            @foreach($deposite_history as $history)
                                <tr>
                                    <td>{{ $history->deposite_amount_currency}}{{ $history->deposite_amount}}</td>
                                    <td>{{ $history->created_at}}</td>  
                                    <td>
                                        @if($history->deposite_status == 'pending')
                                            <a href="{{ route('admin.deposite_amount', $history->id) }}" class = "btn btn-sm btn-success"><i class = "fa fa-check"></i></a>
                                        @endif
                                    </td>                                  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $deposite_history->links() }}
                @else
                    <h4 style = "text-align:center">No Deposite History Found</h4>
                @endif
            </div>
        </div>
    </div>
@endsection