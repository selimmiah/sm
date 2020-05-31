<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Admin extends Authenticatable
{
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role_id', 'photo', 'created_at', 'updated_at', 'remember_token','shop_name','region_name','territory_name','bd_id','distributor_name','address','district','thana'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
    	return $this->belongsTo('App\Models\Role')->withDefault(function ($data) {
            foreach($data->getFillable() as $dt){
                $data[$dt] = __('Deleted');
            }
        });
    }

    public function districts()
    {
        return $this->belongsTo('App\Models\District')->withDefault(function ($data) {
            foreach($data->getFillable() as $dt){
                $data[$dt] = __('Deleted');
            }
        });
    }

    public function IsSuper(){
        if ($this->id == 1) {
           return true;
        }
        return false;
    }

    public function sectionCheck($value){
        $sections = explode(" , ", $this->role->section);
        if (in_array($value, $sections)){
            return true;
        }else{
            return false;
        }
    }


}
