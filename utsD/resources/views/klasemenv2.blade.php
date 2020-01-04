@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Klasemen Russian Premier League</title>
</head>
<style>
</style>
<body>
<h4 style="text-align:center;">Russian Premier League</h4>
<h5 style="text-align:center;">Klasemen Sementara</h5>
<table id="example" class="table table-striped table-bordered" width="100%">
    <tr>
        <th style='vertical-align:middle; text-align:center;'>#</th>
        <th style='vertical-align:middle; text-align:center;'>Logo</th>
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
        $no = 0;
        
        foreach ($data as $hasil) {
            $no++;
            $jml_main = ($hasil->menang + $hasil->draw + $hasil->kalah);
            $def_gol = ($hasil->gol - $hasil->kebobolan);
            $poin = (($hasil->menang*3) + ($hasil->draw*1));
            ?>
            <td style='vertical-align:middle; text-align:center;'><?php echo $no; ?> </td>
            <td style='vertical-align:middle; text-align:center;'><img src="{{ asset('img/'.$hasil->logo)  }}" style="max-height:50px;max-width:200px;margin-top:10px;"></td>
            <td style='vertical-align:middle; text-align:center;'><?php echo $hasil->nama_tim; ?></td>
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
</body>
</html>