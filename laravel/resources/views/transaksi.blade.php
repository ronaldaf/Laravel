<!-- Menghubungkan dengan view template master -->
@extends('master')
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Transaksi')
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
<center><h4>Data Transaksi</h4></center>
@foreach($transaksi as $trx)
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card mt-4">
			<div class="card-body">
				ID Customer {{ $trx-> id_customer }}
				<br>
				Total {{ $trx->total }}
				<br>
				Diskon {{ $trx->diskon }}
			</div>
			<div class="row">
				<div class="col-md-2" style="margin-left: 20px;">
					<a href="/transaksi/edit/{{ $trx->id }}" class="fa fa-edit btn btn-warning" > Edit</a>
				</div>
				<div class="col-md-2" style="margin-left: -40px;">
					<a href="/transaksi/hapus/{{ $trx->id }}" class="fa fa-times btn btn-danger"> Hapus</a>
				</div>
			</div>
			<div class="row" style="padding-bottom: 30px;padding-top: 20px;margin-left: 5px">
				<div class="col-md-2">
					<a class="detail fa fa-chevron-right btn btn-success" id="detail-{{ $trx->id }}" style="width:155px;color:white;"> Detail</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body" style="background-color: #ececec;">
				
			</div>
		</div>
	</div>
</div>
@endforeach
<a href="/transaksi/tambah" class="float">
	<i class="fa fa-plus my-float"></i>
</a>
@endsection