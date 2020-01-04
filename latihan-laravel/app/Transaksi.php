<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	protected $table = "transaksi";
	protected $fillable = ['id_customer','total','diskon'];
	public $timestamps = false;

	//relasione to many
	public function detailTransaksi(){
		return $this->hasMany('App\detailTransaksi');
	}
}
