<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract_detail extends Model
{
    public function client()
    {
        return $this->belongsTo('App\User','client_id');
    }
    public function staff()
    {
        return $this->belongsTo('App\User','staff_id');
    }
}
