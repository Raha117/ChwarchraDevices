<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function store_accounts()
    {
        $this->create(request()->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        
            ])
        );
        return redirect('/accounts');
    
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    private function create(array $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        

    }

    public function destory_accounts($id){

        User::findOrFail($id)->delete();
        return redirect('/accounts');
    }

    public function edit_accounts($id){

        $account = User::findOrFail($id);
        return view('edit_register',compact('account'));
    }
    public function update_accounts($id){

        $account = User::findOrFail($id);
        $validated = request()->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            
        
            ]);
        
        $validated_password = request()->validate([

            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
        $password = Hash::make($validated_password['password']);
        $account->update([
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'password'  => $password
        ]);
        
        return redirect('/accounts');
    }
   
}
