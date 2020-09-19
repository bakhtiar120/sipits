<?php

header("Content-type: application/octet-stream");
$date = new DateTime();
header("Content-Disposition: attachment; filename=data_kmpi.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

    <thead>

        <tr>
            <th>No</th>
            <th>Nama Pengusul</th>
            <th>Nomor Induk</th>
            <th>Departemen</th>
            <th>Universitas</th>
            <th>Alamat Kantor</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Nama Pembimbing</th>
            <th>Nomor Induk</th>
            <th>Departemen</th>
            <th>Fakultas</th>
            <th>Fakultas</th>
            <th>No HP</th>
            <th>Judul Publisher</th>
            <th>Publisher</th>
            <th>Publisher</th>
            <th>Status</th>
            <th>Luaran</th>
            <th>Tanggal Usul</th>

        </tr>

    </thead>

    <tbody>

        <?php $a = 0;
        foreach ($data as $key => $value) : $a++; ?>

            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $value['nama'];  ?></td>
                <td><?php echo $value['nomor_induk'];  ?></td>
                <td><?php echo $value['dept'];  ?></td>
                <td><?php echo $value['univ']; ?></td>
                <td><?php echo $value['alamat_kantor'];  ?></td>
                <td><?php echo $value['email'];  ?></td>
                <td><?php echo $value['no_hp'];  ?></td>
                <td><?php echo $value['nama_pembimbing']; ?></td>
                <td><?php echo $value['nomor_pembimbing'];  ?></td>
                <td><?php echo $value['departemen_pembimbing'];  ?></td>
                <td><?php echo $value['fakultas_pembimbing'];  ?></td>
                <td><?php echo $value['email_pembimbing']; ?></td>
                <td><?php echo $value['hp_pembimbing']; ?></td>
                <td><?php echo $value['judul_publikasi']; ?></td>
                <td><?php echo $value['publisher']; ?></td>
                <td><?php
                    if ($value['status_luaran'] == 1) echo "Luaran Terkumpul";
                    else echo "Belum Upload";
                    ?></td>
                <td>
                    <?php
                    if ($value['status'] == 1) echo "Proses Review";
                    elseif ($value['status'] == 2) echo "Revisi Usulan";
                    elseif ($value['status'] == 3) echo "Usulan Ditolak";
                    elseif ($value['status'] == 4) echo "Usulan Diterima";
                    else echo "Usulan Baru";
                    ?>

                </td>
                <td><?php echo $value['tanggal_submit']; ?></td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>