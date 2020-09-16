<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletLevel extends Model
{
    protected $table ='hm_wallet';
	protected $guarded =[];

	protected $primaryKey = 'hm_wallet_id';

}
