<?php

header("Content-type: application/octet-stream");
$date = new DateTime();
header("Content-Disposition: attachment; filename=data_pap.xls");

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
            <th>Alamat Pengusul</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Nama Asisten Peneliti</th>
            <th>Nomor Induk Asisten Peneliti</th>
            <th>Status Asisten Peneliti</th>
            <th>Departemen Asisten Peneliti</th>
            <th>Instansi Asisten Peneliti</th>
            <th>Alamat KTP</th>
            <th>Alamat Domisili</th>
            <th>Judul Penelitian</th>
            <th>Skema Penelitian</th>
            <th>Sumber Dana</th>
            <th>Honor</th>
            <th>Lama Penelitian</th>
            <th>Total Honor</th>
            <th>Jobdesk</th>
            <th>Tahun</th>
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
                <td><?php echo $value['nama_ketua'];  ?></td>
                <td><?php echo 'no : '.$value['nomor_induk_ketua'];  ?></td>
                <td><?php echo $value['departemen_ketua'];  ?></td>
                <td><?php echo $value['universitas_ketua']; ?></td>
                <td><?php echo $value['alamat_ketua'];  ?></td>
                <td><?php echo $value['email_ketua'];  ?></td>
                <td><?php echo $value['no_hp_ketua'];  ?></td>
                <td><?php echo $value['nama_ap']; ?></td>
                <td><?php echo 'no : ' . $value['nomor_induk_ap']; ?></td>
                <td><?php echo $value['status_ap']; ?></td>
                <td><?php echo $value['departemen_ap']; ?></td>
                <td><?php echo $value['instansi_ap']; ?></td>
                <td><?php echo $value['alamat_ktp_ap']; ?></td>
                <td><?php echo $value['alamat_domisili_ap']; ?></td>
                <td><?php echo $value['judul'];  ?></td>
                <td><?php echo $value['skema'];  ?></td>
                <td><?php echo $value['pendanaan'];  ?></td>
                <td><?php echo $value['honor']; ?></td>
                <td><?php echo $value['lama_bulan'] . ' ' . $value['jenis_lama']; ?></td>
                <td><?php echo $value['total_honor']; ?></td>
                <td><?php echo $value['jobdesk']; ?></td>
                <td><?php echo $value['tahun']; ?></td>
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