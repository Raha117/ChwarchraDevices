@extends('layout/master')
@section('content')
   <div class="container-fluid album text-muted">
    <div class="container-fluid">
      
        <table class="table">
          <thead class="thead-dark">
            <tr>
              
              <th> </th>
              <th scope="row" > <span style="color:#892F5C">Brand</span></th>
              <th scope="row" > <span style="color:#892F5C">Condition</span></th>
              <th scope="row" > <span style="color:#892F5C">Organization</span></th>
              <th scope="row" > <span style="color:#892F5C">Location</span></th>
              <th scope="row" > <span style="color:#892F5C">Active</span></th>
              <th> <span style="color:#892F5C">Created At </span> </th>
              <th> <span style="color:#892F5C"> Updated At </span> </th>
              <th> <span style="color:#892F5C">Created At </span> </th>
              <th> <span style="color:#892F5C"> Updated At </span> </th>
             
            </tr>
          </thead>
        
        
            <tbody>
              @foreach ($cameras as $camera)
              <tr>
                <th> {{ $loop->iteration }} </th>
                @foreach ($camera->device_specifications as $cameras_spec)
                  <td scope="row">{{ ucfirst($cameras_spec->value) }}</td>
                @endforeach
                <td> {{ date('h:i:s a m/d/Y', strtotime($camera->created_at)) }} </td>
                <td> {{ date('h:i:s a m/d/Y', strtotime($camera->updated_at)) }} </td>
                <td> <form method="get" action="/cameras/{{$camera->id}}/edit"><button type="submit" class="btn btn-success btn-xs btn-block">Update</button> </form></td>
                <td> <form method="post" action="/cameras/{{ $camera->id }}"> @method('delete') @csrf <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form> </td>
              </tr>
              
            @endforeach
            </tbody>
            
      </table>
        </div>

      <div class="container-fluid">
        <form class="form-inline needs-validation" method="post" action="/cameras">
          @csrf
          
      
          <label class="sr-only" for="brand">Brand</label>
          <input name="brand" type="text" class="form-control mb-2 mr-sm-2 no-margin" id="brand" placeholder="Brand">

          <label class="sr-only" for="condition">Condition</label>
          <input name="condition" type="text" class="form-control mb-2 mr-sm-2" id="condition" placeholder="Condition" >

          <label class="sr-only" for="organization">Organization</label>
          <input name="organization" type="text" class="form-control mb-2 mr-sm-2" id="organization" placeholder="Organization" >

          <label class="sr-only" for="location">Location</label>
          <input name="location" type="text" class="form-control mb-2 mr-sm-2" id="location" placeholder="Location" >
          <select name="active" class="btn btn-default btn-md">
            <option selected disabled>Active</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
         
          
          
          <button type="submit" class="btn btn-primary mb-2 mr-sm-2">New Camera</button>
        </form>
        
        </div>
        
      </div>
      @include('errors')
   </div>
@endsection
