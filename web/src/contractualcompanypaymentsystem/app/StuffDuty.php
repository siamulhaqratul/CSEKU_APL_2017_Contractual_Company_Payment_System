<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StuffDuty extends Model
{
    protected $table="staff_duty";
    protected $fillable = ['contract_id', 'duty_date', 'next_date','approved_by_client','paid','payment_appove_by_staff'];
    public $timestamps=false;
}
