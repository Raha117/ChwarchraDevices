@extends('layout/master')

@section('content')
@section('content')
    
    <div class="container-fluid no-padding no-margin">
        <div class="container-fluid col-lg-4 no-padding no-margin"> 
            <form method="post" action="/computers/{{$id}}">
                @csrf
                @method('patch')
                @foreach ($specs_names as $specs_name)
                    @if($specs_name != 'kind' && $specs_name != 'Active')
                        <input name="{{$specs_name}}" type="text" value="{{ $pc_spec_values[$loop->iteration -1] }}" class="form-control mb-2 mr-sm-2 no-margin" id="{{$specs_name}}" placeholder="{{ucfirst($specs_name)}}">
                    @else
                        @if($specs_name == 'Active')
                            <select name="active" class="btn btn-default btn-md">
                                <option disabled>Active</option>
                                @if($pc_spec_values[8] == 'Yes')    
                                    <option value="Yes" selected>Yes</option>
                                    <option value="No">No</option>
                                @else
                                    <option value="Yes">Yes</option>
                                    <option value="No" selected>No</option>
                                @endif
                            </select>
                        @else
                            <select name="kind" class="btn btn-default btn-md">
                                <option disabled>Active</option>
                                @if($pc_spec_values[0] == 'Desktop')    
                                    <option value="Desktop" selected>Desktop</option>
                                    <option value="Laptop">Laptop</option>
                                @else
                                    <option value="Desktop">Desktop</option>
                                    <option value="Laptop" selected>Laptop</option>
                                @endif
                            </select>
                        @endif
                    @endif 
                @endforeach
                <button type="submit" class="btn btn-primary mb-2 mr-sm-2">Submit</button>
            </form>
                
        </div>
        
        @include('errors')
    </div>
@endsection