<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaksi;
use App\Customer;
use App\Barang;
use App\detailTransaksi;

class TransaksiController extends Controller
{
    public function index(){
    	$transaksi = transaksi::all();

    	// //dengan kondisi
    	// $transaksi = transaksi::where('nama', 'Jamal Uwais')->get();
    	// $transaksi = transaksi::where('id', '>' , 10)->get();
    	// $transaksi = transaksi::where('nama', 'like' , '%a%')->get();
    	return view('transaksi', ['transaksi' => $transaksi]);
    }

    public function tambah(){
    	$data_customer = customer::select('id','nama')->get();
        $data_barang = barang::select('id','nama')->get();

    	//select + where
    	//$data_customer = customer::select('id','nama')->where('id','1')->get();
    	//==
    	//SELECT id, nama from customer where id=1;
        return view('transaksi_tambah', ['data_customer' => $data_customer] , ['data_barang' => $data_barang]);
    }

    public function proses(Request $request){
        $this->validate($request,[
            'qty' => 'required'
        ]);

        $nama_barang = $request->barang;
        $tbl_barang = barang::select('id','nama','harga')->where('nama',$nama_barang)->first();
        $harga = $tbl_barang->harga;
        $qty = $request->qty;
        $total = $harga * $qty;
        if($total > 40000){
            $diskon = 2000;
        }else{
            $diskon = 0;
        }
        
        Transaksi::create([
            'id_customer' => $request->customer,
            'total' => $total,
            'diskon' => $diskon
        ]);

        $id_transaksi = Transaksi::latest('id')->first();
        detailTransaksi::create([
            'id_transaksi' => $id_transaksi->id,
            'id_barang' => $tbl_barang->id,
            'jml' => $request->qty,
            'harga' => $tbl_barang->harga
        ]);
        return redirect('/transaksi');
    }

    public function hapus($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect('/transaksi');
    }
}
