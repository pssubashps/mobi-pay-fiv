@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <a href="user/update" class="btn btn-info" role="button">Add user</a>
        </div>
    </div>
    <br/>
    <div class="row">
        <!--<div class="col-md-8 col-md-offset-2">-->
        
        
        <div class="col-md-12">
        
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                            <a href="#" title='Edit'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            &nbsp;|&nbsp;
                            <a href="{{ route('home_update') }}" title='Assing Twilio phone number'>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            </a>
                            </td>
                        </tr> 
                        @endforeach
                        
                    </table>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
