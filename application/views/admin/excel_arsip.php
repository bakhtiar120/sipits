<?php

header("Content-type: application/octet-stream");
$date = new DateTime();
header("Content-Disposition: attachment; filename=data_arsip.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

    <thead>

        <tr>
            <th>No</th>
            <th>Tahun</th>
            <th>Skema</th>
            <th>Sumber Dana</th>
            <th>Judul Kegiatan</th>
            <th>Nama Ketua</th>
            <th>Departemen</th>
            <th>Fakultas</th>
            <th>Dana Disetujui</th>
            <th>Dana Terpakai</th>
            <th>Dana Sisa</th>
            <th>Nomor Kontrak</th>
            <th>Tanggal Kontrak</th>
            <th>Nomor SK</th>
            <th>Tanggal SK</th>
            <th>Kode Unik</th>

        </tr>

    </thead>

    <tbody>

        <?php $a = 0;
        foreach ($data as $key => $value) : $a++; ?>

            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $value['tahun'];  ?></td>
                <td><?php echo $value['skema'];  ?></td>
                <td><?php echo $value['sumber'];  ?></td>
                <td><?php echo $value['judul']; ?></td>
                <td><?php echo $value['nama_ketua'];  ?></td>
                <td><?php echo $value['departemen'];  ?></td>
                <td><?php echo $value['fakultas'];  ?></td>
                <td><?php echo $value['dana_disetujui']; ?></td>
                <td><?php echo $value['sptb'];  ?></td>
                <td><?php echo $value['dana_sisa'];  ?></td>
                <td><?php echo $value['nomor_kontrak']; ?></td>
                <td><?php echo $value['tgl_kontrak']; ?></td>
                <td><?php echo $value['nomor_sk']; ?></td>
                <td><?php echo $value['tgl_sk']; ?></td>
                <td><?php echo $value['kode_unik']; ?></td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>