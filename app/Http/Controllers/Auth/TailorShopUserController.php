<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\TailorShopUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TailorShopUserController extends Controller
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

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'max:255'],
            'email_id' => ['required','string','max:255','unique:tailor_shop_user'],
            'contact_number ' => ['required', 'string', 'min:12','unique:tailor_shop_user'],
            'password' => ['required', 'string', 'confirmed'],
            'gender' => ['required','string','max:20'],
            'shop_name' => ['required','string','max:20'],
            'shop_details' => ['required','string','max:200'],
            'description' => ['required','string','max:200'],
            'status' => ['required','string','max:20']
            
        ]);
    }

    
    public function create(array $data)
    {
        return CustomerTable::create([
            'user_name' => $data['customer_name'],
            'email_id' => $data['email_id'],
            'contact_number' => $data['contact_number'],
            'password' => $data['password'],
            'gender' => $data['gender'],
            'shop_name' => $data['shop_name'],
            'shop_details' => $data['shop_details'],
            'description' => $data['description'],
            'status' => $data['status']
        ]);
    }
}
