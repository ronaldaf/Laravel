@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Edit {{ $liat->nama }}</h3>
{!! Form::model($liat, ['route' => ['mhs.update', $liat],'method' =>'patch', 'files' => true])!!}
@include('mhs._form', ['model' => $liat])
{!! Form::close() !!}
</div>
</div>
</div>
@endsection