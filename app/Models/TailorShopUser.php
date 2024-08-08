<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TailorShopUser extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tailor_shop_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name','email_id', 'contact_number','password','gender','shop_name','shop_details','description','status'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }
}
