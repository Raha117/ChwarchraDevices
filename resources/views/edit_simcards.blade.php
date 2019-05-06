@extends('layout/master')

@section('content')
    <div class="container-fluid album text-muted">
        <div class="container-fluid">
        <table class="table">
            <p class="text-justify text-warning"> Add simcards owned by any organization here : </p>
            <thead class="thead-dark">
                <tr>
                    <th> </th>
                    <th> Phone Number </th>
                    <th> Vendor </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($simcards as $sim)
                    <tr>
                        <th> {{ $loop->iteration }} </th>
                        @if($sim->id != $id)
                            @foreach ($sim->device_specifications as $specification)
                                @if($specification->specification_id != 12)
                                    <td scope="row">{{ ucfirst($specification->value) }}</td>
                                @endif
                            @endforeach
                        @else
                        <form method="post" action="/simcards/{{$id}}">
                            @csrf
                            @method('patch')
                            @foreach( $specs as $spec )
                                @if($spec != 'Active')
                                    <td><input name="{{$spec}}" value="{{ucfirst($simcards_spec_values[$loop->iteration -1 ])}}" type="text" class="input-md md no-margin" id="{{$spec}}" placeholder="{{ucfirst($spec)}}"></td>
                                @endif
                            @endforeach 
                            <td> <button type="submit" class="btn btn-primary btn-xs btn-block">Submit</button></td>
                            </form>
                            @endif
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>                        
@endsection