<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Specification;
use App\Device_Specification;
class NetworkDevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::where('kind', 'network_device')->with("device_specifications")->get();
        $specs = $devices->pluck("device_specifications")->unique();

        $specs_names = [];

        foreach($specs as $spec){
            foreach($spec->pluck("specification")->unique() as $specification_instance){
                $specs_names[] = $specification_instance->name;
            }
        }

        $specs_names = array_unique($specs_names);

        return view('networkDevices',compact('devices', 'specs_names'));


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
            
            'kind'          => ['required', 'min:2','max:20'],
            'brand'         => ['required','min:2','max:20'],
            'condition'     => ['required','min:2','max:10'],
            'organization'  => ['required','min:3','max:20'],
            'location'      => ['required','min:3','max:20'],
            'active'        => 'required|in:Yes,No' 
        ]);
        
        
        
        Device::create([
            
            'serial_no' => '978787878',
            'model_no'  => '909090909',
            'kind'      => 'network_device'
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


        

    
        return redirect('network_devices');

        
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
        $network_dev = Device::findOrFail($id);
        $network_devices = Device::where('kind','network_device')->get() ;
        $network_devices_specs = $network_devices->pluck('device_specifications');
        $specs = [] ;
        $network_device_spec_values = [] ;
        foreach ($network_devices_specs as $network_device_specs){

            foreach($network_device_specs->pluck('specification') as $spec ){

                $specs[] =  $spec->name ;
            }
        }
        foreach ($network_dev->device_specifications as $network_device_spec){

            $network_device_spec_values[] = $network_device_spec->value ;
        }
        
        $specs = array_unique($specs) ;
        return view('edit_networkDevices',compact('specs','network_device_spec_values','network_devices','id'));
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
            
            'kind'          => ['required', 'min:2','max:20'],
            'brand'         => ['required','min:2','max:20'],
            'condition'     => ['required','min:2','max:10'],
            'organization'  => ['required','min:3','max:20'],
            'location'      => ['required','min:3','max:20'],
            'active'        => 'required|in:Yes,No' 
        ]);
        
        $network_device_specs = Device::findOrFail($id)->device_specifications ;
        $c = 0;

        foreach ($network_device_specs as $network_device_spec){

            $network_device_spec->update(['value' => array_values($validated)[$c] ]);
            $c++;
        }
        return redirect('/network_devices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $network_device = Device::findOrFail($id) ;
        foreach ($network_device->device_specifications as $network_device_spec){

            $network_device_spec->delete();
        }

        $network_device->delete();
        return redirect('/network_devices');
    }
}
