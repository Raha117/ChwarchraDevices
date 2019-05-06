@extends('layout/master')
@section('content')
   <div class="container-fluid album text-muted no-margin no-padding">
    <div class="container-fluid no-margin no-padding">
      
        <table class="table">
          <thead class="thead-dark">
            <tr>
              
              <th> </th>
              <th scope="row" > <span style="color:#892F5C">Kind</span></th>
              <th scope="row" > <span style="color:#892F5C">Brand</span></th>
              <th scope="row" > <span style="color:#892F5C">Condition</span></th>
              <th scope="row" > <span style="color:#892F5C">Organization</span></th>
              <th scope="row" > <span style="color:#892F5C">Location</span></th>
              <th scope="row" > <span style="color:#892F5C">Memory</span></th>
              <th scope="row" > <span style="color:#892F5C">Processor</span></th>
              <th scope="row" > <span style="color:#892F5C">Storage</span></th>
              <th scope="row" > <span style="color:#892F5C">Active</span></th>








                <th scope="row" > <span style="color:#892F5C"> Created At </span> </th>
                <th scope="row" class="text-xm"> <span style="color:#892F5C">updated At</span> </th>
            </tr>
          </thead>
        
        
            <tbody>
              @foreach ($pcs as $pc)
              <tr>
                <th> {{ $loop->iteration }} </th>
                @foreach ($pc->device_specifications as $device_spec)
                  
                    <td scope="row">{{ ucfirst($device_spec->value) }}</td>
                  
     
                @endforeach
                <td> {{ date('h:i:s a m/d/Y', strtotime($pc->created_at)) }} </td>
                <td> {{ date('h:i:s a m/d/Y', strtotime($pc->updated_at)) }} </td>
                <td> <form method="get" class="needs-validation" action="/computers/{{$pc->id}}/edit"> <button type="submit" class="btn btn-success btn-block btn-xs">Update</button> </form></td>
                <td> <form method="post" action="/computers/{{$pc->id}}"> @method('delete') @csrf <button type="submit" class="btn btn-danger btn-block btn-xs">Delete</button> </form> </td>
              </tr>

              @endforeach
            </tbody>
            
      </table>
        </div>

      <div class="container-fluid col-lg-4">
        <form class="needs-validation" method="post" action="/computers">
          @csrf

          <select name="kind" class="btn btn-default btn-md">
            <option selected disabled>Kind</option>
            <option value="Desktop"> Desktop </option>
            <option value="Laptop"> Laptop </option> 
          </select>
          <label class="sr-only" for="brand">Brand</label>
          <input name="brand" type="text" class="form-control mb-2 mr-sm-2 no-margin" id="brand" placeholder="Brand">

          <label class="sr-only" for="condition">Condition</label>
          <input name="condition" type="text" class="form-control mb-2 mr-sm-2" id="condition" placeholder="Condition" >

          <label class="sr-only" for="organization">Organization</label>
          <input name="organization" type="text" class="form-control mb-2 mr-sm-2" id="organization" placeholder="Organization" >

          <label class="sr-only" for="location">Location</label>
          <input name="location" type="text" class="form-control mb-2 mr-sm-2" id="location" placeholder="Location">

          <label class="sr-only" for="memory">Memory</label>
          <input name="memory" type="text" class="form-control mb-2 mr-sm-2" id="memory" placeholder="Memory" >

          <label class="sr-only" for="Processor">Processor</label>
          <input name="processor" type="text" class="form-control mb-2 mr-sm-2 no-margin" id="processor" placeholder="Processor" >
          <label class="sr-only" for="storage">Storage</label>
          <input name="storage" type="text" class="form-control mb-2 mr-sm-2 no-margin" id="storage" placeholder="Storage" >
          
          <select name="active" class="btn btn-default btn-md">
            <option selected disabled>Active</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
          
          <button type="submit" class="btn btn-primary mb-2 mr-sm-2">New Computer</button>
        </form>
        
        </div>
        
      </div>
      @include('errors')
   </div>
@endsection
