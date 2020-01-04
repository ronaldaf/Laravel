@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Tambah Mahasiswa</h3>
{!! Form::open(['route' => 'mhs.store', 'files' => true])!!}
@include('mhs._form')
{!! Form::close() !!}
</div>
</div>
</div>
@endsection