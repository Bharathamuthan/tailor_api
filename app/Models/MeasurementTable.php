<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasurementTable extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'measurement_table';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'neck','shoulder_nipple','nipple_nipple','across_back','across_chest','sleeve_length','around_arm',
    	'wrist','shoulder_waist','blouse_length','dress_length','waist','hip','high_hip','bust','underbust','skirt_length'
        ,'slit_length','shoulder_width','chest','bicep','shirt_length','thigh','ankle','knee','crotch_length'
        ,'trouser_length','waist_knee','status'	
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }
}
