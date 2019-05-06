@extends('layout/master')

@section('content')
    <div class="container-fluid album text-muted">
        <div class="container-fluid">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th> </th>
                        <th scope="row" > <span style="color:#892F5C">name</span></th>
                        <th scope="row"> <span style="color:#892F5C">position</span></th>
                        <th scope="row"> <span style="color:#892F5C">Phone Number</span></th>
                        <th scope="row"> <span style="color:#892F5C">Organization</span></th>
                        <th scope="row"> <span style="color:#892F5C">Location</span></th>
                        <th scope="row"> <span style="color:#892F5C">Active</span></th>
                
                    </tr>
                </thead>
                @foreach ($employees as $employee)
                    <tbody>
                        <tr>
                            @if($employee_edit->id != $employee->id)
                                <th scope="row"> {{ $loop->iteration }} </th> 
                                <td>{{$employee->name}}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->phone_number }}</td>
                                <td>{{ $employee->organization }}</td>
                                <td>{{ $employee->location }}</td>
                                
                                @if($employee->active ==='Yes') <td>Yes</td> @else <td>No</td> @endif
                            @else
                                <th>{{$loop->iteration}}</th> 
                                <form method="post" action="/employees/{{$employee_edit->id}}">
                                    @method('patch')
                                    @csrf
                                    <td><input name="name" type="text" class="input-md md" id="name" placeholder="Name" value="{{$employee->name}}" ></td>
                                    <td><input name="position" type="text" class="input-md md" id="position" placeholder="Position" value="{{$employee->position}}"></td>
                                    <td><input name="phone_number" type="text" class="input-md md" id="phone_number" placeholder="phone_number" value="{{$employee->phone_number}}" ></td>
                                    <td><input name="organization" type="text" class="input-md md" id="organization" placeholder="Organization" value="{{$employee->organization}}" ></td>
                                    <td><input name="location" type="text" class="input-md md" id="location" placeholder="Location" value="{{$employee->location}}" dropdown></td>
                                    <td>
                                        <select name="active">
                                            <option selected disabled>Active</option>
                                            @if($employee->active === 'Yes') 
                                                <option value="Yes" selected>Yes</option>
                                                <option value="No">No</option>
                                            @endif
                                            @if(($employee->active === 'No') )
                                                <option value="No" selected>No</option>
                                                <option value="Yes" >Yes</option>
                                            @endif
                                        </select>
                                    </td>
                                    <td> <button type="submit" class="btn btn-primary btn-xs btn-block">Submit</button></td>
                                </form>
                            @endif
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div> 
    
        @include('errors')
</div>
  
@endsection

