<!-- Menghubungkan dengan view template master -->
@extends('master')
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Customer')
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

					<h3>Data Customer</h3>
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
					<form action="/customer/proses" method="post">
						{{ csrf_field() }}
						Nama 
						<input class="form-control" type="text" name="nama" required="required" value="{{ old('nama') }}"> <br/>
						Alamat 
						<input class="form-control" type="text" name="alamat" required="required" value="{{ old('alamat') }}"> <br/>
						No Telepon 
						<input class="form-control" type="text" name="no_telp" required="required" value="{{ old('no_telp') }}"> <br/>
						Catatan 
						<textarea class="form-control" name="catatan" required="required">{{ old('catatan') }}</textarea> <br/>
						<input class="btn btn-primary" type="submit" value="Simpan Data"> <br><br>
						<a href="/customer"> << Kembali</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection