<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\OrderListTable;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OrderListController extends Controller
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
            'customer_id ' => ['required', 'string', 'max:255'],
            'order_type_id' => ['required','string','max:255'],
            'description' => ['required', 'string', 'max:255'],
            'order_status' => ['required', 'string', 'max:200'],
            'status' => ['required','string','max:20']
            
        ]);
    }
    
    public function create(array $data)
    {
        return OrderListTable::create([
            'customer_id' => $data['customer_id'],
            'order_type_id' => $data['order_type_id'],
            'description' => $data['description'],
            'order_status' => $data['order_status'],
            'status' => $data['status']
        ]);
    }
}
