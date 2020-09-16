<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletExt extends Model
{
    protected $table ='ext_wallet';
	protected $guarded =[];
	
	protected $primaryKey = 'ext_wallet_id';

}
