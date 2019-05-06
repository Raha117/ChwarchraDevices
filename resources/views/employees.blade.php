@extends('layout/master')
@section('content')
  <div class="container-fluid album text-muted">
    <div class="container-fluid">
      <table class="table no-margin no-padding">
        <thead class="thead-dark">
            <tr>
              <th> </th>
              <th scope="row" ><a>name</a></th>
              <th scope="row"> <span style="color:#892F5C"> position</span></th>
              <th scope="row" class="col-lg-2"> <span style="color:#892F5C">Phone Number</span></th>
              <th scope="row"> <span style="color:#892F5C">Organization</span></th>
              <th scope="row"> <span style="color:#892F5C">Location</span></th>
              <th scope="row"> <span style="color:#892F5C">Active</span></th>
              <th scope="row"> <span style="color:#892F5C">Created At</span></th>
              <th scope="row"> <span style="color:#892F5C">Updated At</span></th> 
            </tr>
        </thead>
        @foreach ($employees as $employee)
          <tbody>
            <tr>
              <th scope="row"> {{ $loop->iteration }} </th> 
              <td><a href="/employees/{{$employee->id}}">{{$employee->name}}</a></td>
              <td>{{ $employee->position }}</td>
              <td>{{ $employee->phone_number }}</td>
              <td>{{ $employee->organization }}</td>
              <td>{{ $employee->location }}</td>
              @if($employee->active === 'Yes') <td>Yes</td> @else <td>No</td> @endif
              <td> {{ date('h:i:s a m/d/Y', strtotime($employee->created_at)) }} </td>
              <td> {{ date('h:i:s a m/d/Y', strtotime($employee->updated_at)) }} </td>
              <td><form method="get" action="/employees/{{$employee->id}}/edit"><button type="submit" class="btn btn-success btn-xs btn-block">Update</button> </form></td>
              <td> <form method="post"class=" needs-validation " action="/employees/{{ $employee->id }}"> @method('DELETE') @csrf <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form></td>
               
              
            </tr>
          </tbody>
        @endforeach
      </table>
    </div> 
    <div class="container-fluid no-margin no-padding">
      <form class="form-inline needs-validation" method="post" action="/employees">
        @csrf
        <label class="sr-only" for="name">Employee name</label>
        <input name="name" type="text" class="form-control mb-2 mr-sm-2" id="name" placeholder="Name" >
      
        <label class="sr-only" for="position">Position</label>
        <input name="position" type="text" class="form-control mb-2 mr-sm-2" id="position" placeholder="Position" >

        <label class="sr-only" for="phone_number">Phone Number</label>
        <input name="phone_number" type="text" class="form-control mb-2 mr-sm-2" id="phone_number" placeholder="Phone Number" >

        <label class="sr-only" for="organization">Organization</label>
        <input name="organization" type="text" class="form-control mb-2 mr-sm-2" id="organization" placeholder="Organization" >

        <label class="sr-only" for="location">Location</label>
        <input name="location" type="text" class="form-control mb-2 mr-sm-2" id="location" placeholder="Location" >
        <select name="active" class="btn btn-default btn-md">
          <option selected disabled>Active</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>
        <button type="submit" class="btn btn-primary mb-2 mr-sm-2">New Employee</button>
      </form>
    </div>
      @include('errors')
  </div>
@endsection
