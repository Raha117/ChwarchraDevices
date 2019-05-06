@extends('layout/master')

@section('content')
    <div class="container-fluid album text-muted">
        <div class="container-fluid">
      
            <table class="table">
                <thead class="thead-dark">
                    <tr>
              
                        <th> </th>
                        @foreach ($specs as $spec)
                            <th scope="row" ><span style="color:#892F5C">{{ucfirst($spec)}}</span></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($network_devices as $network_device)
                        <tr>
                            <th> {{ $loop->iteration }} </th>
                            @if($network_device->id != $id)
                                @foreach ($network_device->device_specifications as $specification)
                                    <td scope="row">{{ ucfirst($specification->value) }}</td>
                                @endforeach
                            
                            @else
                            <form method="post" action="/network_devices/{{$id}}">
                                @csrf
                                @method('patch')
                                @foreach( $specs as $spec )
                                    @if($spec != 'Active')
                                        <td><input name="{{$spec}}" value="{{ucfirst($network_device_spec_values[$loop->iteration -1 ])}}" type="text" class="input-md md no-margin" id="{{$spec}}" placeholder="{{ucfirst($spec)}}"></td>
                                    @else
                                        <td>
                                            <select name="active" class="">
                                                <option disabled>Active</option>
                                                @if($network_device_spec_values[5] == 'Yes')
                                                    <option value="Yes" selected >Yes</option>
                                                    <option value="No">No</option>
                                                @else
                                                    <option value="Yes">Yes</option>
                                                    <option value="No" selected>No</option>
                                                @endif
                                            </select>
                                         </td>
                                    @endif
                                @endforeach 
                                <td> <button type="submit" class="btn btn-primary btn-xs btn-block">Submit</button></td>
                            </form>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            
      </table>
        @include('errors')
    </div>
@endsection