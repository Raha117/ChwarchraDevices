<?php
namespace App\Http\Controllers;
use App\Employee ;
use App\Device_Specification ;
use App\Device ;
use App\Specification ;
use Illuminate\Http\Request;
use App\User ;

class PagesController extends Controller
{
    public function home(){

        return view('welcome');
    }

    public function contact(){

        return view('contact');
    }

    public function stats(){
        
        
        $employees_count = count(Employee::all());
        $networkDevices_count = count(Device::where('kind','network_device')->get());
        $computers_count = count(Device::where('kind','pc')->get());
        $printers_count = count(Device::where('kind','printer')->get());
        $cameras_count = count(Device::where('kind','camera')->get());
        $other_devices_count = count(Device::where('kind','other_devices')->get());
        $simcards_count = count(Device::where('kind','simcards')->get());
        $other_devices_count = $other_devices_count + $simcards_count;


        
        return view('stats',compact('employees_count','networkDevices_count','computers_count','printers_count','cameras_count','other_devices_count')) ;
    }

    public function auth(){

        return view('layouts/app');
    }

    public function accounts(){

        $accounts = User::all();
        return view('register',compact('accounts'));
    }

 
}
