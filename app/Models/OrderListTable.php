<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderListTable extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_list';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id','order_type_id', 'description','order_status','status'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }
}
