<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Specification ;
use App\Device_Specification ;

class ComputersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index()
    {
        $pcs = Device::where('kind','pc')->with('device_specifications')->get();
        $device_specs = $pcs->pluck('device_specifications')->unique();
        
        $specs_names = [] ;
        foreach ($device_specs as $device_spec) {
            
            foreach ($device_spec->pluck('specification')->unique() as $spec_instance){

                $specs_names[] = $spec_instance->name ;
            }
                $specs_names = array_unique($specs_names);
        }
        
        return view('computers',compact('specs_names','pcs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            
            'kind'          => 'required|in:Desktop,Laptop',
            'brand'         => ['required','min:2','max:20'],
            'condition'     => ['required','min:2','max:10'],
            'organization'  => ['required','min:3','max:20'],
            'location'      => ['required','min:3','max:20'],
            'memory'        => ['required','min:1','max:6'],
            'processor'     => ['required','min:2','max:20'],
            'storage'       => ['required','min:1','max:8'],
            'active'        => 'required|in:Yes,No'
            
        ]);

        Device::create([

            'serial_no' => '3435553',
            'model_no'  => '3545454',
            'kind'      =>  'pc'
        ]);

        $device_id = Device::latest()->first()->id ;

        foreach ($validated as $validated_key => $validated_value){

            $specification_id = Specification::where('name',$validated_key)->first()->id; 

            Device_Specification::create([

                'device_id'         => $device_id,
                'specification_id'  => $specification_id,
                'value'             => $validated_value
            ]) ;
        }


        

    
        return redirect('/computers');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pc = Device::findOrFail($id);
        $computers = Device::where('kind','pc')->with('device_specifications')->get();
        $device_specs = $computers->pluck('device_specifications')->unique();
        $pc_spec_values_array = [];
        foreach ($pc->device_specifications as $pc_spec){

            $pc_spec_values_array[] = $pc_spec->value; 
        }
        $spe = [] ;
        foreach ($device_specs as $device_spec) {
            
            foreach ($device_spec->pluck('specification')->unique() as $spec_instance){

                $spe[] = $spec_instance->name ;
            }
                
        }
        
        $specs_unique = array_unique($spe);
        $c = 0;
        $specs_names =[];
        $pc_spec_values = [];
        foreach ($specs_unique as $spec ){
            if($c < 9){

                $specs_names[] = $specs_unique[$c] ;
                $pc_spec_values[] =$pc_spec_values_array[$c] ;
            }
            $c++ ;
        }
    
        return view('edit_computers',compact('specs_names','pc_spec_values','id'));
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
        $validated = request()->validate([
            
            'kind'          => 'required|in:Desktop,Laptop',
            'brand'         => ['required','min:2','max:20'],
            'condition'     => ['required','min:2','max:10'],
            'organization'  => ['required','min:3','max:20'],
            'location'      => ['required','min:3','max:20'],
            'memory'        => ['required','min:1','max:6'],
            'processor'     => ['required','min:2','max:20'],
            'storage'       => ['required','min:1','max:8'],
            'active'        => 'required|in:Yes,No'
            
        ]);
        
        $pc_specs = Device::findOrFail($id)->device_specifications;
        
        $c = 0 ;
        foreach($pc_specs as $pc_spec){ 
            
               
                $pc_spec->update(['value' => array_values($validated)[$c] ]);
                $c++;
            
        }
            return redirect('/computers');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pc = Device::findOrFail($id);
        $pc_specs = $pc->device_specifications ;
        $employee_pcs = $pc->employees_devices ;
        foreach ($employee_pcs as $employee_pc){

            $employee_pc->delete();
        }
        foreach ($pc_specs as $pc_spec){

            $pc_spec->delete();
        }
        
        $pc->delete();
        return redirect('/computers');
    }

    
}
