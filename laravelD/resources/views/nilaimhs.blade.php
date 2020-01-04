@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Data Laravel</title>
</head>
<style>
</style>
<body>

{!! Form::open(['url' => 'show_ci', 'method'=>'get', 'class'=>'form-inline'])!!}
<div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}"> 
{!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Nama Mahasiswa..']) !!} 
{!! $errors->first('q', '<p class="help-block">:message</p>') !!} </div> 
{!! Form::submit('Search', ['class'=>'btn btn-primary']) !!} {!! Form::close() !!} 
<br>

<h3>List Mahasiswa
<small>
<a href="{{ route('mhs.create') }}"
class="btn btn-warning btn-sm">Tambah Mahasiswa</a>
</small>
</h3>


<form method="get" action="">
    <button type="submit">Hapus Pencarian</button>
</form>
<h3 style="text-align:center;">Semua Data</h3>
<table id="example" class="table table-striped table-bordered" width="100%">
    <tr>
        <th>NRP</th>
        <th>NAMA</th>
		<th>Tugas 1</th>
		<th>Tugas 2</th>
		<th>Tugas 3</th>   
		<th>Rata2</th> 
        <th>Aksi</th> 
    </tr>
        <tr>
        <?php
        $no = 0;
        foreach ($data as $nilais) {
			$r=floor(($nilais->tugas1+$nilais->tugas2+$nilais->tugas3)/3);
            ?>
            <td style='vertical-align:middle; text-align:center;'><?php echo $nilais->nrp; ?> </td>
            <td style='vertical-align:middle; text-align:center;'><?php echo $nilais->nama; ?> </td>                            
            <td style='vertical-align:middle; text-align:center;'><?php echo $nilais->tugas1; ?> </td>
			<td style='vertical-align:middle; text-align:center;'><?php echo $nilais->tugas2; ?> </td>
			<td style='vertical-align:middle; text-align:center;'><?php echo $nilais->tugas3; ?> </td>
			<td style='vertical-align:middle; text-align:center;'><strong><?php echo $r; ?> </strong></td>
            <td>{!! Form::model($nilais, ['route' => ['mhs.destroy', $nilais],
            'method' => 'delete', 'class' => 'form-inline'] ) !!}
            <a href="{{ route('mhs.edit', $nilais->id)}}" class="btn btn-warning btn-sm">edit</a> &nbsp;
            {!! Form::submit('delete', ['class'=>'btn btn-danger btn-sm']) !!}
            {!! Form::close()!!}
            </td>
        </tr>
        <?php } ?>              
                                            
</table>
<br>
Halaman : {{ $data->currentPage() }} <br/>
Jumlah Data : {{ $data->total() }} <br/>
Data Per Halaman : {{ $data->perPage() }} <br/> 
<br>
{{ $data->links() }}
@endsection('content')

</body>
</html>