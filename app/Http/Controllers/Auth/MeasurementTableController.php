<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Register;
use App\MeasurementTable;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MeasurementTableController extends Controller
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

    use CustomerTable;

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
            'neck' => ['required','string','max:20'],
            'shoulder_nipple' => ['required','string','max:20'],
            'nipple_nipple' => ['required','string','max:20'],
            'across_back' => ['required','string','max:20'],
            'across_chest' => ['required','string','max:20'],
            'sleeve_length' =>['required','string','max:20'],
            'around_arm' => ['required','string','max:20'],
    	    'wrist' => ['required','string','max:20'],
            'shoulder_waist' => ['required','string','max:20'],
            'blouse_length' => ['required','string','max:20'],
            'dress_length' => ['required','string','max:20'],
            'waist','hip' => ['required','string','max:20'],
            'high_hip' => ['required','string','max:20'],
            'bust' => ['required','string','max:20'],
            'underbust' => ['required','string','max:20'],
            'skirt_length' => ['required','string','max:20'],
            'slit_length' => ['required','string','max:20'],
            'shoulder_width' => ['required','string','max:20'],
            'chest' => ['required','string','max:20'],
            'bicep' => ['required','string','max:20'],
            'shirt_length' => ['required','string','max:20'],
            'thigh' => ['required','string','max:20'],
            'ankle' => ['required','string','max:20'],
            'knee' => ['required','string','max:20'],
            'crotch_length' => ['required','string','max:20'],
            'trouser_length' => ['required','string','max:20'],
            'waist_knee' => ['required','string','max:20'],
            'status' => ['required','string','max:20'],            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(array $data)
    {
        return MeasurementTable::create([
            'neck' => $data['neck'],
            'shoulder_nipple' => $data['shoulder_nipple'],
            'nipple_nipple' => $data['nipple_nipple'],
            'across_back' => $data['across_back'],
            'across_chest' => $data['across_chest'],
            'sleeve_length' => $data['sleeve_length'],
            'around_arm' => $data['around_arm'],
    	    'wrist' => $data['wrist'],
            'shoulder_waist' => $data['shoulder_waist'],
            'blouse_length' => $data['blouse_length'],
            'dress_length' => $data['dress_length'],
            'waist' => $data['hip'],
            'hip' => $data['waist'],
            'high_hip' => $data['high_hip'],
            'bust' => $data['bust'],
            'underbust' => $data['underbust'],
            'skirt_length' => $data['skirt_length'],
            'slit_length' => $data['slit_length'],
            'shoulder_width' => $data['shoulder_width'],
            'chest' => $data['chest'],
            'bicep' => $data['bicep'],
            'shirt_length' => $data['shirt_length'],
            'thigh' => $data['thigh'],
            'ankle' => $data['ankle'],
            'knee' => $data['knee'],
            'crotch_length' => $data['crotch_length'],
            'trouser_length' => $data['trouser_length'],
            'waist_knee' => $data['waist_knee'],
            'status' => $data['status']
        ]);
    }
}
