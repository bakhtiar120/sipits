<?php

header("Content-type: application/octet-stream");
$date = new DateTime();
header("Content-Disposition: attachment; filename=data_p3i.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

    <thead>

        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Nama Pengusul</th>
            <th rowspan="2">Nomor Induk</th>
            <th rowspan="2">Departemen</th>
            <th rowspan="2">Universitas</th>
            <th rowspan="2">Alamat Kantor</th>
            <th rowspan="2">Email</th>
            <th rowspan="2">No HP</th>
            <th rowspan="2">Status Pengusul</th>
            <th rowspan="2">HIndex</th>
            <th colspan="4">Penelitian 1</th>
            <th colspan="4">Penelitian 2</th>
            <th colspan="4">Penelitian 3</th>
            <th rowspan="2">Status</th>
            <th rowspan="2">Tanggal Usul</th>
        </tr>
        <tr>
            <th>Judul 1</th>
            <th>Skema 1</th>
            <th>Sumber Dana 1</th>
            <th>Status Luaran 1</th>
            <th>Judul 2</th>
            <th>Skema 2</th>
            <th>Sumber Dana 2</th>
            <th>Status Luaran 2</th>
            <th>Judul 3</th>
            <th>Skema Dana 3</th>
            <th>Sumber 3</th>
            <th>Status Luaran 3</th>
        </tr>

    </thead>

    <tbody>

        <?php $a = 0;
        foreach ($data as $key => $value) : $a++; ?>

            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $value['nama'];  ?></td>
                <td><?php echo $value['nomor_induk'];  ?></td>
                <td><?php echo $value['departemen'];  ?></td>
                <td><?php echo $value['universitas']; ?></td>
                <td><?php echo $value['alamat_kantor'];  ?></td>
                <td><?php echo $value['email'];  ?></td>
                <td><?php echo $value['no_hp'];  ?></td>
                <td>
                    <?php
                    if ($value['kategori'] == 0) echo "Dosen ITS";
                    elseif ($value['kategori'] == 1) echo "Mahasiswa ITS";
                    elseif ($value['kategori'] == 2) echo "Dosen Non-ITS";
                    elseif ($value['kategori'] == 3) echo "Mahasiswa Non-ITS";
                    else echo "Umum";
                    ?>
                </td>
                <td><?php echo $value['hindex']; ?></td>
                <td><?php echo $value['judul1'];  ?></td>
                <td><?php echo $value['skema1'];  ?></td>
                <td><?php echo $value['sumber1']; ?></td>
                <td><?php
                    if ($value['status_luaran1'] == 1) echo "Luaran Terkumpul";
                    else echo "Belum Upload";
                    ?>
                </td>
                <td><?php echo $value['judul2'];  ?></td>
                <td><?php echo $value['skema2'];  ?></td>
                <td><?php echo $value['sumber2']; ?></td>
                <td><?php
                    if ($value['status_luaran2'] == 1) echo "Luaran Terkumpul";
                    else echo "Belum Upload";
                    ?>
                </td>
                <td><?php echo $value['judul3'];  ?></td>
                <td><?php echo $value['skema3'];  ?></td>
                <td><?php echo $value['sumber3']; ?></td>
                <td><?php
                    if ($value['status_luaran3'] == 1) echo "Luaran Terkumpul";
                    else echo "Belum Upload";
                    ?>
                </td>
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