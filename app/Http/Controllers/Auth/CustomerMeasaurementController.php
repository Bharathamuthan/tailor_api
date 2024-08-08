<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\OrderListTable;
use App\CustomerMeasurementTable;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerMeasurementTableController extends Controller
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
            'tailor_id' => ['required', 'string', 'max:255'],
            'order_id ' => ['required', 'string', 'max:255'],
            'name' => ['required','string','max:255'],
            'mobile_number' => ['required','string','min:12'],
            'city' => ['required','string','max:255'],
            'shirt_height' => ['required','string','max:255'],
            'shirt_shoulder' => ['required','string','max:255'],
            'shirt_hand_height' => ['required','string','max:255'],
            'shirt_body' => ['required','string','max:255'],
            'shirt_sleeave_length' => ['required','string','max:255'],
            'shirt_collar' => ['required','string','max:255'],
            'full_hand_shirt' => ['required','string','max:255'],
            'pant_height' => ['required','string','max:255'],
            'pant_waist' => ['required','string','max:255'],
            'pant_front_rise' => ['required','string','max:255'],
            'pant_thigh' => ['required','string','max:255'],
            'pant_thigh_loose' => ['required','string','max:255'],
            'bottom' => ['required','string','max:255'],
            'description' => ['required', 'string', 'max:200'],
            'notes' => ['required', 'string', 'max:200'],
            'status' => ['required','string','max:20']
            
        ]);
    }
    
    public function create(array $data)
    {
        return CustomerMeasurementTable::create([
            'tailor_id' => $data['tailor_id'],
            'order_id' => $data['order_id'],
            'name' => $data['name'],
            'mobile_number' => $data['mobile_number'],
            'city' => $data['city'],
            'shirt_height' => '{ cm :' . $data['shirt_height_cm'].', inch :'.$data['shirt_height_inch'].'}',
            'shirt_shoulder' => $data['shirt_shoulder'],
            'shirt_hand_height' => $data['shirt_hand_height'],
            'shirt_body' => $data ['shirt_body'],
            'shirt_sleeave_length' => $data ['shirt_sleeave_length'],
            'shirt_collar' => $data ['shirt_collar'],
            'full_hand_shirt' => $data ['full_hand_shirt'],
            'pant_height' => $data ['pant_height'],
            'pant_waist' => $data ['pant_waist'],
            'pant_front_rise' => $data ['pant_front_rise'],
            'pant_thigh' => $data ['pant_thigh'],
            'pant_thigh_loose' => $data ['pant_thigh_loose'],
            'bottom' => $data ['bottom'],
            'description' => $data ['description'],
            'notes' => $data['notes'],
            'status' => $data['status']
        ]);
    }
}
