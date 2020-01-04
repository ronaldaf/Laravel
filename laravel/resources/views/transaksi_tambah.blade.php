<!-- Menghubungkan dengan view template master -->
@extends('master')
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Transaksi')
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
<br/>
<br/>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<div class="card mt-5">
				<div class="card-body">

					<h3>Data Transaksi</h3>
					{{-- menampilkan error validasi --}}
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<br/>
					<!-- form validasi -->
					<form action="/transaksi/proses" method="post">
						{{ csrf_field() }}
						Nama Customer
						<select class="form-control" name="customer">
							@foreach($data_customer as $customer)
							<option value="{{ $customer->id }}">{{ $customer->nama }} </option>
							@endforeach
						</select> <br/>
						Barang
						<select class="form-control" name="barang">
							@foreach($data_barang as $barang)
							<option value="{{ $barang->nama }}">{{ $barang->nama }} </option>
							@endforeach
						</select> <br/>
						Qty 
						<input class="form-control" type="number" name="qty" required="required" value="{{ old('qty') }}"> <br/>
						@if($errors->has('qty'))
						<div class="text-danger">
							{{ $errors->first('qty')}}
						</div>
						@endif
						<input class="btn btn-success" type="button" value="+ Tambah Pesanan">
						<br>
						<br>
						<input class="btn btn-primary" type="submit" value="Simpan Data"> <br><br>
						<a href="/transaksi"> << Kembali</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection