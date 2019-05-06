<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device ;
use App\Specification;
use App\Device_Specification ;

class CamerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cameras = Device::where('kind','camera')->with('device_specifications')->get();
        $camera_specs = $cameras->pluck('device_specifications')->unique();
        
        $specs_names = [] ;
        foreach ($camera_specs as $camera_spec) {
            
            foreach ($camera_spec->pluck('specification')->unique() as $spec_instance){

                $specs_names[] = $spec_instance->name ;
            }
                
        }

        $specs_names = array_unique($specs_names);
        
        return view('cameras',compact('specs_names','cameras'));
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
            
            'brand'         => ['required','min:2','max:20'],
            'condition'     => ['required','min:2','max:10'],
            'organization'  => ['required','min:2','max:20'],
            'location'      => ['required','min:2','max:20'],
            'active'        => 'required|in:Yes,No'
            
        ]);

        Device::create([

            'serial_no' => '3435553',
            'model_no'  => '3545454',
            'kind'      =>  'camera'
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


        

    
        return redirect('/cameras');
        
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
        $camera = Device::findOrFail($id);
        $cameras = Device::where('kind','camera')->with('device_specifications')->get();
        $device_specs = $cameras->pluck('device_specifications')->unique();
        $camera_spec_values = [];
        foreach ($camera->device_specifications as $camera_spec){

            $camera_spec_values[] = $camera_spec->value; 
        }
        $specs = [] ;
        foreach ($device_specs as $device_spec) {
            
            foreach ($device_spec->pluck('specification')->unique() as $spec_instance){

                $specs[] = $spec_instance->name ;
            }
                
        }
        $specs = array_unique($specs);
        return view('edit_cameras',compact('camera_spec_values','specs','cameras','id'));
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
            
            'brand'         => ['required','min:2','max:20'],
            'condition'     => ['required','min:2','max:10'],
            'organization'  => ['required','min:3','max:20'],
            'location'      => ['required','min:3','max:20'],
            'active'        => 'required|in:Yes,No' 
        ]);
        
        $camera_specs= Device::findOrFail($id)->device_specifications ;
        $c = 0;

        foreach ($camera_specs as $camera_spec){

           
                $camera_spec->update(['value' => array_values($validated)[$c] ]);
                $c++;
            
        }
    
        return redirect('/cameras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camera = Device::findOrFail($id) ;

        foreach ($camera->device_specifications as $camera_spec){

            $camera_spec->delete() ;
        }

        $camera->delete() ;
        return redirect('/cameras');
    }
}
