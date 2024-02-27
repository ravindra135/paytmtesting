<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOrderStatus extends Model
{

protected $table = 'user_order_status';

    public function order()
    {
    	return $this->belongsTo('App\Models\Order')->withDefault();
    }

   
}
