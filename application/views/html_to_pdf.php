<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
</head>
<body>
<?php foreach($dt_mitra as $row){?>
<table class="table table-bordered table-striped">
    <tr>
        <th style="width: 25%" align="left">Nama Mitra</th>
        <td style="width: 5%">:</td>
        <td><?php echo $row->nm_mitra?></td>
    </tr>
    <tr>
        <th style="width: 25%" align="left">Alamat Kirim</th>
        <td style="width: 5%">:</td>
        <td><?php echo $row->almt_kirim?></p></td>
    </tr>
    <tr>
        <th style="width: 25%" align="left">Provinsi</th>
        <td style="width: 5%">:</td>
        <td><?php echo $row->almt_prov_kirim?></p></td>
    </tr>
    <tr>
        <th style="width: 25%" align="left">Kota</th>
        <td style="width: 5%">:</td>
        <td><?php echo $row->almt_kt_kirim?></p></td>
    </tr>
    <tr>
        <th style="width: 25%" align="left">Kecamatan</th>
        <td style="width: 5%">:</td>
        <td><?php echo $row->almt_kec_kirim?></p></td>
    </tr>
    <tr>
        <th style="width: 25%" align="left">Kelurahan</th>
        <td style="width: 5%">:</td>
        <td><?php echo $row->almt_kel_kirim?></p></td>
    </tr>
</table>
<br>
<?php }?>
<table class="table table-bordered" border="1" style="width: 100%;">
    <tr>
        <th width="10%">No</th>
        <th width="30%">Nama Barang</th>
        <th width="20%">Jumlah</th>
        <th width="20%">Harga</th>
        <th width="20%">Total</th>
    </tr>
    <?php
        $i = 0;
        $totka = 0;
        foreach($dt_order as $row){
            $i++;
            $total = $row->harga_barang * $row->jml_barang;
            $totka += $totka+$total;
    ?>
         <tr>
            <td align="center"><?php echo $i?></td>
            <td><?php echo $row->nm_barang?></td>
            <td><?php echo $row->jml_barang?></td>
            <td><?php echo 'Rp '.number_format($row->harga_barang, 2, ",", ".")?></td>
            <td><?php echo 'Rp '.number_format($total, 2, ",", ".")?></td>
        </tr>
    <?php
        }
    ?>
    <tr>
        <td colspan="4" style="width: 25%" align="right">Total Order</td>
        <td ><?php echo'Rp '.number_format($totka, 2, ",", ".")?></td>
    </tr>
</table>
</body>
</html>