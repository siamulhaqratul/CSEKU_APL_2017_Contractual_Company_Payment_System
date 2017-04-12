<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','contact_no','rolename','address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public $timestamps = false;
    protected $hidden = [
         'remember_token',
    ];

    public function contract_detail()
    {
        return $this->hasMany('App\Contract_detail','staff_id');
    }
    public function client_detail()
    {
        return $this->hasMany('App\Contract_detail','client_id');
    }
}
