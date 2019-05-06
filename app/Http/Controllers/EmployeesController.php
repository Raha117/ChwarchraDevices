<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Employees_Device;
use App\Device ;
use App\Specification ;
use App\Device_Specification;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($employee_id)
    {
        $pcs = Device::where('kind','pc')->with('device_specifications')->get();
        $device_specs = $pcs->pluck('device_specifications')->unique();
        
        $specs_names_pc = [] ;
        foreach ($device_specs as $device_spec) {
            
            foreach ($device_spec->pluck('specification')->unique() as $spec_instance_pc){

                $specs_names_pc[] = $spec_instance_pc->name ;
            }
            $specs_names_pc = array_unique($specs_names_pc);
        }
        $printers = Device::where('kind','printer')->with('device_specifications')->get();
        $printers_specs = $printers->pluck('device_specifications')->unique();
        
        $specs_names_printer = [] ;
        foreach ($printers_specs as $printers_spec) {
            
            foreach ($printers_spec->pluck('specification')->unique() as $spec_instance_printer){

                if( $spec_instance_printer->name !='kind' ){
                    
                    $specs_names_printer[] = $spec_instance_printer->name ;
                
                }
            }
                
        }
        $others = Device::where('kind','other_devices')->with('device_specifications')->get();
        $others_specs = $others->pluck('device_specifications')->unique();
        
        $specs_names_other_devices = [] ;
        foreach ($others_specs as $other_spec) {
            
            foreach ($other_spec->pluck('specification')->unique() as $spec_instance_other_devices){

                
                $specs_names_other_devices[] = $spec_instance_other_devices->name ;
            }
                
        }
        
        $simcards = Device::where('kind','simcards')->with('device_specifications')->get();
    
        $specs_names_other_devices = array_unique($specs_names_other_devices);

        $specs_names_printer = array_unique($specs_names_printer);
        return view('create_employee_device',compact('pcs','specs_names_pc','printers','specs_names_printer','others','specs_names_other_devices','simcards','employee_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
         
        $validated = request()->validate([

            'name'          => ['required','min:4','max:64'],
            'position'      => ['required','min:2','max:64'],
            'phone_number'  => ['required','min:3','max:20'],
            'organization'  => ['required','min:2','max:64'],
            'location'      => ['required','min:2','max:64'],
            'active'        => 'required|in:Yes,No'
        ]);
        
        Employee::create($validated);
        return redirect('/employees');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employee_id)
    {
        $employee= Employee::findOrFail($employee_id);
        $pcs = [];
        $printers = [];
        $other_devices = [];
        $simcards = [];
        if($employee->employee_devices->count()){

            foreach ($employee->employee_devices as $employees_device){

                switch($employees_device->device->kind){

                    case "pc" : $pcs[] = $employees_device->device ;
                        break ;
                    case "printer" : $printers[] = $employees_device->device ;
                        break;
                    
                    case "other_devices" : $other_devices[] = $employees_device->device ;
                        break ;
                    
                    case "simcards" : $simcards[] = $employees_device->device ;
                        break ;
                }

                    

                
                
            }
            
            
            
        }else{

            $pcs = array();
            $printers = array();
            $other_devices = array();
            $simcards = array();
        }
        
        
        return view('employee_devices',compact('pcs','printers','other_devices','simcards','employee_id','employee')); 
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee_edit = Employee::findOrFail($id);
        $employees = Employee::all();
        return view('edit_employee',compact('employees','employee_edit')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        
        $validated = request()->validate([

            'name'          => ['required','min:4','max:64'],
            'position'      => ['required','min:2','max:64'],
            'phone_number'  => ['required','min:3','max:20'],
            'organization'  => ['required','min:2','max:64'],
            'location'      => ['required','min:2','max:64'],
            'active'        => 'required|in:Yes,No'
        ]);
        
        $employee->update($validated);

        return redirect('/employees');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        
        if($employee->employee_devices->count()){
            
            foreach ($employee->employee_devices as $employee_device ){

                $employee_device->delete();
                Device_Specification::where([
                    'device_id'         => $employee_device->device_id,
                    'specification_id'  => 12
                ])->first()->delete();
            }
        }

        $employee->delete();
        
        return redirect('/employees');
        
    }

    public function store_employee_devices($employee_id)
    {
        
        foreach(Device::all() as $device){

            
            if(request($device->id) == 'on' ){

                if(!$device->employees_devices->count()){
                    
                    Employees_Device::create([

                    'employee_id'   => $employee_id,
                    'device_id'     => $device->id 
                    ]);
                }else{

                }
            }
        }
        return redirect("/employees/$employee_id");
    }

    public function destroy_employee_device($employee_id,$device_id){

        Employees_Device::where([

            'employee_id'   => $employee_id,
            'device_id'     => $device_id
        ])->first()->delete();

        return redirect("/employees/$employee_id");
    }
}
