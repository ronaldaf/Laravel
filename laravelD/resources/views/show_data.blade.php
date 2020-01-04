@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Data</title>
</head>
<body>
    
<table>
<h3>5 Orang Dengan Rata-Rata Tertinggi</h3>
<tr>
        <th>NO</th>
        <th>NRP</th>
        <th>NAMA</th>
		<th>Rata2</th>  
    </tr>
        <tr>
        <?php
        $no = 0;
        foreach ($nilai as $best) {
			// $r=floor(($best->tugas1+$best->tugas2+$best->tugas2)/3);
            $no++; ?>
            <td style='vertical-align:middle; text-align:center;'><?php echo $no; ?> </td>
            <td style='vertical-align:middle; text-align:center;'><?php echo $best->nrp; ?> </td>
            <td style='vertical-align:middle; text-align:center;'><?php echo $best->nama; ?> </td>     
			<td style='vertical-align:middle; text-align:center;'><strong><?php echo $best->total; ?> </strong></td>
        </tr>
        <?php } ?>              
</table>
@endsection('content')
</body>
</html>