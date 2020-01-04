<!-- Menghubungkan dengan view template master -->
@extends('master')
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Customer')
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
<div class="container">
	<div class="card">
		<div class="card-body">
			<a href="/customer/tambah"> + Tambah Customer Baru</a>
			<br/>
			<br/>

			<p>Cari Data Nama Customer :</p>
			<form action="/customer/cari" method="GET">
				<input class="form-control" type="text" name="cari" placeholder="Cari Customer" value="{{ old('cari') }}">
				<br>
				<input class="btn btn-primary" type="submit" value="CARI">
			</form>
			<br>
			<br>

			<table class="table table-bordered">
				<tr>
					<th>Nama</th>
					<th>Alamat</th>
					<th>No Telepon</th>
					<th>Catatan</th>
					<th>Opsi</th>
				</tr>
				@foreach($customer as $cus)
				<tr>
					<td>{{ $cus->nama }}</td>
					<td>{{ $cus->alamat }}</td>
					<td>{{ $cus->no_telp }}</td>
					<td>{{ $cus->catatan }}</td>
					<td>
						<a class="btn btn-warning btn-sm" href="/customer/edit/{{ $cus->id }}">Edit</a>
						|
						<a class="btn btn-danger btn-sm" href="/customer/hapus/{{ $cus->id }}">Hapus</a>
					</td>
				</tr>
				@endforeach
			</table>

			<br>
			Halaman : {{ $customer->currentPage() }} <br>
			Jumlah Data : {{ $customer->total() }} <br>
			Data Per Halaman : {{ $customer->perPage() }} <br>

			{{ $customer->links() }}
		</div>
	</div>
</div>
@endsection