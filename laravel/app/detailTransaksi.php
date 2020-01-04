<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailTransaksi extends Model
{
	protected $table = "detail_transaksi";
	protected $fillable = ['id_transaksi','id_barang','jml','harga'];
	public $timestamps = false;

	public function transaksi(){
		return $this->belongsTo('App\Transaksi');
	}
}
