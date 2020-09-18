<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletEco extends Model
{
    protected $table ='eco_wallet';
	protected $guarded =[];


	//truong
	protected $primaryKey = 'eco_wallet_id';
}
