@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Klasemen Premier League</title>
</head>
<style>
</style>
<body>

{!! Form::open(['url' => 'klasemen', 'method'=>'get', 'class'=>'form-inline'])!!}
<div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}"> 
{!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Nama Tim']) !!} 
{!! $errors->first('q', '<p class="help-block">:message</p>') !!} </div> 
{!! Form::submit('Search', ['class'=>'btn btn-primary']) !!} {!! Form::close() !!} 
<br>
<form method="get" action="">
    <button  class="btn btn-flat red darken-4 waves-effect waves-light white-text" type="submit">Hapus Pencarian</button>
</form>
<h4 style="text-align:center;">Russian Premier League</h4>
<h5 style="text-align:center;">Klasemen Sementara</h5>
<table id="example" class="table table-striped table-bordered" width="100%">
    <tr>
        <th style='vertical-align:middle; text-align:center;'>#</th>
        <th style='vertical-align:middle; text-align:center;'>Nama Tim</th>
		<th style='vertical-align:middle; text-align:center;'>Main</th>
		<th style='vertical-align:middle; text-align:center;'>W</th>
		<th style='vertical-align:middle; text-align:center;'>D</th>   
		<th style='vertical-align:middle; text-align:center;'>L</th>  
        <th style='vertical-align:middle; text-align:center;'>Jumlah Gol</th>
        <th style='vertical-align:middle; text-align:center;'>Kebobolan</th>
        <th style='vertical-align:middle; text-align:center;'>Defisit Gol</th>
        <th style='vertical-align:middle; text-align:center;'>Poin</th>
    </tr>
        <tr>
        <?php
        $no = ($data->currentPage() - 1) * $data->perPage();
        
        foreach ($data as $hasil) {
            $no++;
            $jml_main = ($hasil->menang + $hasil->draw + $hasil->kalah);
            $def_gol = ($hasil->gol - $hasil->kebobolan);
            $poin = (($hasil->menang*3) + ($hasil->draw*1));
            ?>
            <td style='vertical-align:middle; text-align:center;'><?php echo $no; ?> </td>
            <td style='vertical-align:middle; text-align:center;'>
                <img src="{{ asset('img/'.$hasil->logo)  }}" style="max-height:50px;max-width:200px;margin-right:8px;">
                <?php echo $hasil->nama_tim; ?>
            </td>
            <td style='vertical-align:middle; text-align:center;'><?php echo $jml_main; ?> </td>                            
            <td style='vertical-align:middle; text-align:center;'><?php echo $hasil->menang; ?> </td>
			<td style='vertical-align:middle; text-align:center;'><?php echo $hasil->draw; ?> </td>
			<td style='vertical-align:middle; text-align:center;'><?php echo $hasil->kalah; ?> </td>
			<td style='vertical-align:middle; text-align:center;'><?php echo $hasil->gol; ?> </td>
			<td style='vertical-align:middle; text-align:center;'><?php echo $hasil->kebobolan; ?> </td>
			<td style='vertical-align:middle; text-align:center;'><?php echo $def_gol; ?> </td>
			<td style='vertical-align:middle; text-align:center;'><strong><?php echo $poin; ?></strong></td>
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