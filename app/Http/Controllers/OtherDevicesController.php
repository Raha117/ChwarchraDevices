<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Device_Specification ;
use App\Specification ;
class OtherDevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $others = Device::where('kind','other_devices')->with('device_specifications')->get();
        $others_specs = $others->pluck('device_specifications')->unique();
        
        $specs_names = [] ;
        foreach ($others_specs as $other_spec) {
            
            foreach ($other_spec->pluck('specification')->unique() as $spec_instance){

                
                $specs_names[] = $spec_instance->name ;
            }
                
        }
        
        $simcards = Device::where('kind','simcards')->with('device_specifications')->get();
    
        $specs_names = array_unique($specs_names);
        
        return view('other_devices',compact('specs_names','others','simcards'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            
            'kind'          => ['required', 'min:3','max:20'],
            'brand'         => ['required','min:2','max:40'],
            'condition'     => ['required','min:2','max:10'],
            'organization'  => ['required','min:3','max:20'],
            'location'      => ['required','min:3','max:20'],
            'active'        => 'required|in:Yes,No'
        ]);

        Device::create([

            'serial_no' => '3435553',
            'model_no'  => '3545454',
            'kind'      =>  'other_devices'
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


        

    
        return redirect('/other_devices');
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
        
        $other_device = Device::findOrFail($id);
        $other_devices = Device::where('kind','other_devices')->with('device_specifications')->get();
        $device_specs = $other_devices->pluck('device_specifications')->unique();
        $other_device_spec_values_array = [];
        foreach ($other_device->device_specifications as $other_device_spec){

            $other_device_spec_values_array[] = $other_device_spec->value; 
        }
        $spe = [] ;
        foreach ($device_specs as $device_spec) {
            
            foreach ($device_spec->pluck('specification')->unique() as $spec_instance){

                $spe[] = $spec_instance->name ;
            }
                
        }
        $specs_unique = array_unique($spe);
        $c = 0;
        $specs = [];
        $other_devices_spec_values = [];
        foreach ($specs_unique as $spec ){
            if($c < 6){

                $specs[] = $specs_unique[$c] ;
                $other_devices_spec_values[] =$other_device_spec_values_array[$c] ;
            }
            $c++ ;
        }
        
        return view('edit_other_devices',compact('other_devices_spec_values','specs','other_devices','id'));
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
            
            'kind'          => ['required','min:2','max:20'],
            'brand'         => ['required','min:2','max:20'],
            'condition'     => ['required','min:2','max:10'],
            'organization'  => ['required','min:3','max:20'],
            'location'      => ['required','min:3','max:20'],
            'active'        => 'required|in:Yes,No' 
        ]);

        $other_devices_specs= Device::findOrFail($id)->device_specifications ;
        $c = 0;

        foreach ($other_devices_specs as $other_devices_spec){

            if($other_devices_spec->specification_id != 12){
                $other_devices_spec->update(['value' => array_values($validated)[$c] ]);
                $c++;
            }
        }
    
        return redirect('/other_devices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $other_device = Device::findOrFail($id);
        
        if($other_device->employees_devices->count()){
            
            foreach ( $other_device->employees_devices as $employees_device ){

                $employees_device->delete() ;
            }
        }
        foreach ($other_device->device_specifications as $other_device_spec){

            $other_device_spec->delete() ;
        }
        $other_device->delete();

        return redirect('/other_devices');
    }
    
    public function simcards_store(){

        $validated = request()->validate ([

            'phone_number' => ['required','min:11','max:11'],
            'brand'        => ['required','min:3','max:20'],
            'organization' => ['required','min:3','max:20'],
            'location'     => ['required','min:3','max:20']
        ]);

        Device::create([

            'serial_no' => '898989',
            'model_no'  => '898989',
            'kind'      => 'simcards'
        ]);

        $simcard_id = Device::latest()->first()->id;
        
        foreach ($validated as $key => $value ){

            $specification_id = Specification::where('name',$key)->first()->id;
            
            Device_Specification::create([

                'device_id'         => $simcard_id,
                'specification_id'  => $specification_id,
                'value'             => $value
            ]);
        }
        return redirect('/other_devices');
    }

    public function simcards_destroy($id){

        $simcard = Device::findOrFail($id) ;

        if($simcard->employees_devices->count()){

            foreach ($simcard->employees_devices as $employee_simcard){

               $employee_simcard->delete() ;
            }
        }

        foreach ($simcard->device_specifications as $simcard_device_spec){

            $simcard_device_spec->delete() ;
        }

        $simcard->delete();

        return redirect('/other_devices') ;
    }

    public function edit_simcards($id){

        $simcard = Device::findOrFail($id);
        $simcards = Device::where('kind','simcards')->with('device_specifications')->get();
        $device_specs = $simcards->pluck('device_specifications')->unique();
        $simcard_spec_values_array = [];
        foreach ($simcard->device_specifications as $simcard_spec){

            $simcard_spec_values_array[] = $simcard_spec->value; 
        }
        $spe = [] ;
        foreach ($device_specs as $device_spec) {
            
            foreach ($device_spec->pluck('specification')->unique() as $spec_instance){

                $spe[] = $spec_instance->name ;
            }
                
        }
        $specs_unique = array_unique($spe);
        $c = 0;
        $specs = [];
        $simcards_spec_values = [];
        foreach ($specs_unique as $spec ){
            if($c < 2){

                $specs[] = $specs_unique[$c] ;
                $simcards_spec_values[] =$simcard_spec_values_array[$c] ;
            }
            $c++ ;
        }
        return view('edit_simcards',compact('simcards_spec_values','specs','simcards','id'));
    }

    public function update_simcards($id){

        $validated = request()->validate ([

            'phone_number' => ['required','min:11','max:11'],
            'brand'        => ['required','min:3','max:20']
        ]);

        $simcards_specs= Device::findOrFail($id)->device_specifications ;
        $c = 0;

        foreach ($simcards_specs as $simcards_spec){

            if($simcards_spec->specification_id != 12){
                $simcards_spec->update(['value' => array_values($validated)[$c] ]);
                $c++;
            }
        }
    
        return redirect('/other_devices');    
    }

}
