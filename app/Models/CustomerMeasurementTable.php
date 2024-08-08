<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerMeasurementTable extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer_measurement';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tailor_id','order_id','name','mobile_number','city','shirt_height','shirt_shoulder','shirt_hand_height','shirt_body','shirt_sleeave_length','shirt_collar','full_hand_shirt','pant_height','pant_waist','pant_front_rise','pant_thigh','pant_thigh_loose','bottom','description','notes','status'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }
}
