@extends('layout/master')
@section('content')
  
  <form method="post" action="/employees/{{$employee_id}}" class="needs-validation">
    @csrf
    <div class="container-fluid lbum text-muted no-margin no-padding">
      <p class="text centered text-warning"> Computers </p>
      
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th> </th>
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
            @if(!$pc->employees_devices->count())
              <tr>
                <div class="checkbox-primary"><th> <input type="checkbox" class="" name="{{$pc->id}}"></th></div>
                <th> {{ $loop->iteration }} </th>
                @foreach ($pc->device_specifications as $device_spec)
                 
                    <td scope="row">{{ ucfirst($device_spec->value) }}</td>
                  

                @endforeach
                <td> {{ date('h:i:s a m/d/Y', strtotime($pc->created_at)) }} </td>
                <td> {{ date('h:i:s a m/d/Y', strtotime($pc->updated_at)) }} </td>
                
                
              </tr>
            @endif
          @endforeach
        </tbody>
        
      </table>

      <table class="table">
        <p class="text centered text-warning"> Printers </p>

          <thead class="thead-dark">
            <tr>
              <th> </th>
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
              @if(!$printer->employees_devices->count())  
                <tr>
                  <th> <input type="checkbox" name="{{$printer->id}}"></th>
                  <th> {{ $loop->iteration }} </th>
                  @foreach ($printer->device_specifications as $printer_spec)
                    @if ($printer_spec->specification_id != 1)
                      <td scope="row">{{ ucfirst($printer_spec->value) }}</td>
                    @endif
                  @endforeach
                  <td> {{ date('h:i:s a m/d/Y', strtotime($printer->created_at)) }} </td>
                  <td> {{ date('h:i:s a m/d/Y', strtotime($printer->updated_at)) }} </td>
                  
                </tr>
              @endif
            @endforeach
        </tbody>
              
      </table>
      <table class="table">
        <p class="text centered text-warning"> Small Devices </p>

        <thead class="thead-dark">
            <tr>
            <th> </th>
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
          @foreach ($others as $other)
            @if(!$other->employees_devices->count())
              <tr>
                <th> <input type="checkbox" name="{{$other->id}}"></th> 
                <th> {{ $loop->iteration }} </th>
                  @foreach ($other->device_specifications as $other_spec)
                      
                          <td scope="row">{{ ucfirst($other_spec->value) }}</td>
                      
                  @endforeach
                  <td> {{ date('h:i:s a m/d/Y', strtotime($other->created_at)) }} </td>
                  <td> {{ date('h:i:s a m/d/Y', strtotime($other->updated_at)) }} </td>
                  

                  
              </tr>
            @endif
          @endforeach
        </tbody>
              
      </table>
      <table class="table">
        <p class="text centered text-warning"> Simcards </p>

        <thead class="thead-dark">
          <tr>
            <th> </th>  
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
              @if(!$simcard->employees_devices->count())  
                <tr>
                  <th> <input type="checkbox" name="{{$simcard->id}}" ></th>
                  <th> {{ $loop->iteration }} </th>
                  @foreach ($simcard->device_specifications as $simcard_spec)
                      
                          <td scope="row">{{ ucfirst($simcard_spec->value) }}</td>
                      
                  @endforeach
                      <td> {{ date('h:i:s a m/d/Y', strtotime($simcard->created_at)) }} </td>
                      <td> {{ date('h:i:s a m/d/Y', strtotime($simcard->updated_at)) }} </td>
                      

                </tr>
              @endif
            @endforeach
        </tbody>

      </table>
    </div>
    <button type="submit" class="btn btn-primary btn-sm col-lg-1 ">Submit</button> </form></td>
  </form>
  @include('errors')
@endsection
