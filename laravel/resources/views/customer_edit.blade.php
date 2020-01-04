<!-- Menghubungkan dengan view template master -->
@extends('master')
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Profil')
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
<h3>Data Customer</h3>
<a href="/customer"> Kembali</a>
<br/>
<br/>
@foreach ($customer as $cus)
<form action="/customer/update" method="post">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{ $cus->id }}">
	Nama 
	<input type="text" name="nama" value="{{ $cus->nama }}" required="required"> <br/>
	Alamat 
	<input type="text" name="alamat" value="{{ $cus->alamat }}" required="required"> <br/>
	No Telepon 
	<input type="text" name="no_telp" value="{{ $cus->no_telp }}" required="required"> <br/>
	Catatan 
	<textarea name="catatan" required="required">{{ $cus->catatan }}</textarea> <br/>
	<input type="submit" value="Update Data">
</form>
@endforeach
@endsection