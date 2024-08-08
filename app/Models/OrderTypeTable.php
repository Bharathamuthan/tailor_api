<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTypeTable extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_name','status'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }
}
