@extends('layout/master')

@section('content')
    
    
    <div class="container-fluid no-margin no-padding ">

        <table class="table no-margin no-padding">
            <thead class="thead-dark">
                <tr>
                <th> </th>
                <th scope="row" ><span style="color:#892F5C">Name</span></th>
                <th scope="row" ><span style="color:#892F5C">Email</span></th>
                <th scope="row"> <span style="color:#892F5C">Created At</span></th>
                <th scope="row"> <span style="color:#892F5C">Updated At</span></th> 
                </tr>
            </thead>
            @foreach ($accounts as $account)
            <tbody>
                <tr>
                <th scope="row"> {{ $loop->iteration }} </th> 
                <td>{{$account->name}}</td>
                <td>{{ $account->email }}</td>
                <td> {{ date('h:i:s a m/d/Y', strtotime($account->created_at)) }} </td>
                <td> {{ date('h:i:s a m/d/Y', strtotime($account->updated_at)) }} </td>
                <td><form method="get" action="/accounts/{{$account->id}}/edit"><button type="submit" class="btn btn-success btn-xs btn-block">Update</button> </form></td>
                <td> <form method="post"class=" needs-validation " action="/accounts/{{ $account->id }}"> @method('DELETE') @csrf <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form></td>
                
                
                </tr>
            </tbody>
            @endforeach
        </table>
        <div class="container-fluid no-margin no-padding">
            <form class="form-inline needs-validation" method="post" action="/accounts">
                @csrf
                <label class="sr-only" for="name">Name</label>
                <input name="name" type="text" class="form-control mb-2 mr-sm-2" id="name" placeholder="Name" >

                <label class="sr-only" for="email">Email</label>
                <input name="email" type="text" class="form-control  mr-sm-2" id="email" placeholder="Email" >

                <label class="sr-only" for="password">Password</label>
                <input name="password" type="password" class="form-control mb-2 mr-sm-2" id="password" placeholder="Password" >
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Passowrd">
                <button type="submit" class="btn btn-primary mb-2 mr-sm-2">New Account</button>
            </form>
            

        </div>
        @include('errors')
    </div>
@endsection
