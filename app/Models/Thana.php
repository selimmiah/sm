<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    protected $table = 'thanas';

    protected $fillable = ['id','thana_name'];

    public $timestamps = false;

}
