@extends('layout/master')

@section('content')
    <div class="container-fluid album text-muted">
        <div class="container-fluid">
      
            <table class="table">
            <p class="text-justify text-warning"> Add small devices such as keyboard , mouse , UPS ... etc. here : </p>
                <thead class="thead-dark">
                    <tr>
              
                        <th> </th>
                        @foreach ($specs as $spec)
                            <th scope="row" ><span style="color:#892F5C">{{ucfirst($spec)}}</span></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($other_devices as $other_dev)
                        <tr>
                            <th> {{ $loop->iteration }} </th>
                            @if($other_dev->id != $id)
                                @foreach ($other_dev->device_specifications as $specification)
                                    @if($specification->specification_id != 12)
                                        <td scope="row">{{ ucfirst($specification->value) }}</td>
                                    @endif
                                @endforeach
                            
                            @else
                            <form method="post" action="/other_devices/{{$id}}">
                                @csrf
                                @method('patch')
                                @foreach( $specs as $spec )
                                    @if($spec != 'Active')
                                        <td><input name="{{$spec}}" value="{{ucfirst($other_devices_spec_values[$loop->iteration -1 ])}}" type="text" class="input-md md no-margin" id="{{$spec}}" placeholder="{{ucfirst($spec)}}"></td>
                                    @else
                                        <td>
                                            <select name="active" class="">
                                                <option disabled>Active</option>
                                                @if($other_devices_spec_values[5] == 'Yes')
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