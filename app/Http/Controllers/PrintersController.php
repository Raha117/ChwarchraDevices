<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device ;
use App\Specification ;
use App\Device_Specification;

class PrintersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $printers = Device::where('kind','printer')->with('device_specifications')->get();
        $printers_specs = $printers->pluck('device_specifications')->unique();
        
        $specs_names = [] ;
        foreach ($printers_specs as $printers_spec) {
            
            foreach ($printers_spec->pluck('specification')->unique() as $spec_instance){

                if( $spec_instance->name !='kind' && $spec_instance->name != 'belongsTo' ){
                    
                    $specs_names[] = $spec_instance->name ;
                
                }
            }
                
        }

        $specs_names = array_unique($specs_names);
        
        return view('printers',compact('specs_names','printers'));
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
            'kind'      =>  'printer'
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


        

    
        return redirect('/printers');
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
        $printer = Device::findOrFail($id);
        $printers = Device::where('kind','printer')->with('device_specifications')->get();
        $device_specs = $printers->pluck('device_specifications')->unique();
        $printer_spec_values_array = [];
        foreach ($printer->device_specifications as $printer_spec){

            $printer_spec_values_array[] = $printer_spec->value; 
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
        $printer_spec_values = [];
        foreach ($specs_unique as $spec ){
            if($c < 5){

                $specs[] = $specs_unique[$c] ;
                $printer_spec_values[] =$printer_spec_values_array[$c] ;
            }
            $c++ ;
        }
        
        return view('edit_printers',compact('printer_spec_values','specs','printers','id'));
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
        
        $printer_specs= Device::findOrFail($id)->device_specifications ;
        $c = 0;

        foreach ($printer_specs as $printer_spec){

            if($printer_spec->specification_id != 12){
                $printer_spec->update(['value' => array_values($validated)[$c] ]);
                $c++;
            }
        }
    
        return redirect('/printers');
    }    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $printer = Device::findOrFail($id);
        $printer_specs = $printer->device_specifications ;
        $employee_printers = $printer->employees_devices ;
        foreach ($employee_printers as $employee_printer){

            $employee_printer->delete();
        }
        foreach ($printer_specs as $printer_spec){

            $printer_spec->delete();
        }
        
        $printer->delete();
        return redirect('/printers');
    }
}
