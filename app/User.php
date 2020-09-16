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


    protected $fillable = [
        'name', 'email', 'password','phone','address','status',
    ];

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
        return $this->belongsTo('App\WalletEco','eco_wallet_id', 'user_id');
    }
    public function ext_wallet()
    {
        return $this->belongsTo('App\WalletExt','ext_wallet_id', 'user_id');
    }
    public function hm()
    {
        return $this->belongsTo('App\WalletLevel','id_HM', 'user_id');
    }
    public function mail_wallet()
    {
        return $this->belongsTo('App\WalletMain','main_wallet_id', 'user_id');
    }
}
