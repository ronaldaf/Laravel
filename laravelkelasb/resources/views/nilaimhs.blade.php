@extends('layouts.app')
@section('content')

{!! Form::open(['url' => 'nilaimhs', 'method'=>'get', 'class'=>'form-inline'])!!}
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
<table class="table table-hover">
<thead>
<tr>
<td>Nama</td>
<td>NRP</td>
<td>Tugas 1</td>
<td>Tugas 2</td>
<td>Tugas 3</td>
<td>Rata2</td>
<td>Aksi</td>
</tr>
</thead>
<tbody>
@foreach($liat as $nilais)
 
<tr>
<td>{{ $nilais->nama }}</td>
<td>{{ $nilais->nrp }}</td>
<td>{{ $nilais->tugas1 }}</td>
<td>{{ $nilais->tugas2 }}</td>
<td>{{ $nilais->tugas3 }}</td>
<td>{{ $r= floor(($nilais->tugas1+$nilais->tugas2+$nilais->tugas3) /3) }}</td>
<td>{!! Form::model($nilais, ['route' => ['mhs.destroy', $nilais],
'method' => 'delete', 'class' => 'form-inline'] ) !!}
<a href="{{ route('mhs.edit', $nilais->id)}}" class="btn btn-warning btn-sm">edit</a> &nbsp;
{!! Form::submit('delete', ['class'=>'btn btn-danger btn-sm']) !!}
{!! Form::close()!!}
</td>
</tr>
@endforeach
</tbody>
</table>
{{ $liat->appends(compact('q'))->links() }}
@endsection