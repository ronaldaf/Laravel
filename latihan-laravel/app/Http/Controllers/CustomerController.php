<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class CustomerController extends Controller
{
	public function index(){

		//mengambil data dari tabel customer
		$customer = DB::table('customer')->paginate(10);

		return view('customer', ['customer' => $customer]);
	}

	public function tambah(){
		return view('customer_tambah');
	}

	public function proses(Request $request){
		$messages = [
			'required' => ':attribute diisi sing bener!',
			'alpha' => ':attribute diisi huruf',
			'min' => ':attribute diisi minimal :min karakter',
			'max' => ':attribute diisi maksimal :max karakter',
			'numeric' => ':attribute diisi ongko'
		];

		$this->validate($request,[
			'nama' => 'required|min:5|max:20|alpha',
			'alamat' => 'required',
			'no_telp' => 'required|numeric',
			'catatan' => 'required'
		], $messages);
	// insert data ke table customer
		DB::table('customer')->insert([
			'nama' => $request->nama,
			'alamat' => $request->alamat,
			'no_telp' => $request->no_telp,
			'catatan' => $request->catatan
		]);
	// alihkan halaman ke halaman customer
		return redirect('/customer');
	}

	public function edit($id){
		// mengambil data customer berdasarkan id yang dipilih
		$customer = DB::table('customer')->where('id',$id)->get();
	// passing data customer yang didapat ke view edit.blade.php
		return view('customer_edit',['customer' => $customer]);
	}

	public function update(Request $request){
		// update data customer
		DB::table('customer')->where('id',$request->id)->update([
			'nama' => $request->nama,
			'alamat' => $request->alamat,
			'no_telp' => $request->no_telp,
			'catatan' => $request->catatan
		]);
// alihkan halaman ke halaman customer
		return redirect('/customer');
	}

	public function hapus($id){
		// menghapus data customer berdasarkan id yang dipilih
		DB::table('customer')->where('id',$id)->delete();
		return redirect('/customer');
	}

	public function cari(Request $request){
		// menangkap data pencarian
		$cari = $request->cari;
		// mengambil data dari table customer sesuai pencarian data
		$customer = DB::table('customer')
		->where('nama','like',"%".$cari."%")
		->paginate();
		// mengirim data customer ke view index
		return view('customer',['customer' => $customer]);
	}
}
