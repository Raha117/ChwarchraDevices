@extends('layout/master')
@section('content')
  <div class="container-fluid album text-muted">
    <div class="container-fluid">
      <table class="table">
      <p class="text centered text-warning"> Computers </p>
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
              <td> {{$loop->iteration}} </td>
              @foreach($pc->device_specifications as $device_spec)
                <td> {{ ucfirst($device_spec->value)}} </td>
              @endforeach
              <td> {{ date('h:i:s a m/d/Y', strtotime($pc->created_at)) }} </td>
              <td> {{ date('h:i:s a m/d/Y', strtotime($pc->updated_at)) }} </td>
              <td> <form method="post"class=" needs-validation " action="/employees/{{ $employee_id }}/{{$pc->id}}"> @method('DELETE') @csrf <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form></td>

            </tr>
          @endforeach
        </tbody>
        
      
      </table>

      <table class="table">
        <p class="text centered text-warning"> Printers </p>

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
              
              
            </tr>
          </thead>
        <tbody>
            @foreach ($printers as $printer)
                <tr>
                  
                  <th> {{ $loop->iteration }} </th>
                  @foreach ($printer->device_specifications as $printer_spec)
                    @if ($printer_spec->specification_id != 1)
                      <td scope="row">{{ ucfirst($printer_spec->value) }}</td>
                    @endif
                  @endforeach
                  <td> {{ date('h:i:s a m/d/Y', strtotime($printer->created_at)) }} </td>
                  <td> {{ date('h:i:s a m/d/Y', strtotime($printer->updated_at)) }} </td>
                  <td> <form method="post"class=" needs-validation " action="/employees/{{ $employee_id }}/{{$printer->id}}"> @method('DELETE') @csrf <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form></td>

                  
                </tr>
            @endforeach
        </tbody>
              
      </table>
      </table>
      <table class="table">
        <p class="text centered text-warning"> Small Devices </p>

        <thead class="thead-dark">
            <tr>
            
            <th> </th>
            <th scope="row" > <span style="color:#892F5C">Kind</span></th>
              <th scope="row" > <span style="color:#892F5C">Brand</span></th>
              <th scope="row" > <span style="color:#892F5C">Condition</span></th>
              <th scope="row" > <span style="color:#892F5C">Organization</span></th>
              <th scope="row" > <span style="color:#892F5C">Location</span></th>
              <th scope="row" > <span style="color:#892F5C">Active</span></th>                
            
            <th> <span style="color:#892F5C">Created At </span> </th>
            <th> <span style="color:#892F5C"> Updated At </span> </th>
            

      
            
            </tr>
        </thead>
        <tbody>
          @foreach ($other_devices as $other)
            
              <tr>
                <th> {{ $loop->iteration }} </th>
                  @foreach ($other->device_specifications as $other_spec)
                      
                          <td scope="row">{{ ucfirst($other_spec->value) }}</td>
                      
                  @endforeach
                  <td> {{ date('h:i:s a m/d/Y', strtotime($other->created_at)) }} </td>
                  <td> {{ date('h:i:s a m/d/Y', strtotime($other->updated_at)) }} </td>
                  <td> <form method="post"class=" needs-validation " action="/employees/{{ $employee_id }}/{{$other->id}}"> @method('DELETE') @csrf <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form></td>
              </tr>
            
          @endforeach
        </tbody>
              
      </table>
      <table class="table">
        <p class="text centered text-warning"> Simcards </p>

        <thead class="thead-dark">
          <tr>
            <th> </th>
            <th scope="row" > <span style="color:#892F5C">Phone Number</span></th>
            <th scope="row"> <span style="color:#892F5C"> Vendor </span></th>
            <th scope="row"> <span style="color:#892F5C"> Organization </span></th>
            <th scope="row"> <span style="color:#892F5C"> Location </span></th>
            <th> <span style="color:#892F5C">Created At </span> </th>
            <th> <span style="color:#892F5C"> Updated At </span> </th>
            

          </tr>
        </thead>
        <tbody>
            @foreach ($simcards as $simcard)
                
                <tr>
                  <th> {{ $loop->iteration }} </th>
                  @foreach ($simcard->device_specifications as $simcard_spec)
                      
                          <td scope="row">{{ ucfirst($simcard_spec->value) }}</td>
                      
                  @endforeach
                      <td> {{ date('h:i:s a m/d/Y', strtotime($simcard->created_at)) }} </td>
                      <td> {{ date('h:i:s a m/d/Y', strtotime($simcard->updated_at)) }} </td>
                      <td> <form method="post"class=" needs-validation " action="/employees/{{ $employee_id }}/{{$simcard->id}}"> @method('DELETE') @csrf <button type="submit" class="btn btn-danger btn-xs btn-block">Delete</button> </form></td>

                      

                </tr>
              
            @endforeach
        </tbody>

      </table>
    </div> 
    <form method="get" action="/employees/{{$employee_id}}/create"> <button type="submit" class="btn btn-link mb-2 mr-sm-2">Add new device to {{ $employee->name }}</button></form>
  </div>
@endsection