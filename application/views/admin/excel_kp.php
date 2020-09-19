<?php

header("Content-type: application/octet-stream");
$date = new DateTime();
header("Content-Disposition: attachment; filename=data_kp.xls");

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
            <th>Ketua Peneliti</th>
            <th>Judul Penelitian</th>
            <th>Skema Penelitian</th>
            <th>Sumber Dana</th>
            <th>Lama Penelitian</th>
            <th>Luaran</th>
            <th>Status</th>
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
                <td><?php echo $value['departemen'];  ?></td>
                <td><?php echo $value['universitas']; ?></td>
                <td><?php echo $value['alamat_kantor'];  ?></td>
                <td><?php echo $value['email'];  ?></td>
                <td><?php echo $value['no_hp'];  ?></td>
                <td><?php echo $value['ketua']; ?></td>
                <td><?php echo $value['judul'];  ?></td>
                <td><?php echo $value['skema'];  ?></td>
                <td><?php echo $value['sumber'];  ?></td>
                <td><?php echo $value['lama_penelitian']; ?></td>
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