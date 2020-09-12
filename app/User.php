<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table ='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded =[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function eco_wallet()
    {
        return $this->belongsTo('App\Eco_wallet','eco_wallet_id', 'user_id');
    }
    public function ext_wallet()
    {
        return $this->belongsTo('App\Ext_wallet','ext_wallet_id', 'user_id');
    }
    public function hm()
    {
        return $this->belongsTo('App\HM','id_HM', 'user_id');
    }
    public function mail_wallet()
    {
        return $this->belongsTo('App\Main_wallet','main_wallet_id', 'user_id');
    }
}
