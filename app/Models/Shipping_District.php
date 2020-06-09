<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping_District extends Model
{

    protected $table = 'districts';

    protected $fillable = ['id','district_name'];

    public $timestamps = false;

}
