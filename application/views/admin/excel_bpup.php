<?php

header("Content-type: application/octet-stream");
$date = new DateTime();
header("Content-Disposition: attachment; filename=data_bpup.xls");

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
            <th>Judul</th>
            <th>Nomor Kontrak</th>
            <th>Tanggal Kontrak</th>
            <th>Skema</th>
            <th>Sumber Dana</th>
            <th>Tahun</th>
            <th>NRP</th>
            <th>Nama Lengkap</th>
            <th>Program Studi</th>
            <th>Pendidikan</th>
            <th>Alamat KTP</th>
            <th>Alamat Domisili</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Jenis Reward</th>
            <th>Lama Pembiayaan</th>
            <th>Sejak - Tahun Ajaran</th>
            <th>Sampai - Tahun Ajaran</th>
            <th>Satuan BIaya</th>
            <th>Total Biaya</th>
            <th>Jenis Luaran</th>
            <th>Isi Luaran</th>
            <th>Status Luaran</th>
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
                <td><?php echo $value['alamat_kampus'];  ?></td>
                <td><?php echo $value['email'];  ?></td>
                <td><?php echo $value['no_hp'];  ?></td>
                <td><?php echo $value['judul']; ?></td>
                <td><?php echo $value['no_kontrak'];  ?></td>
                <td><?php echo $value['tanggal_kontrak'];  ?></td>
                <td><?php echo $value['skema']; ?></td>
                <td><?php echo $value['sumber']; ?></td>
                <td><?php echo $value['tahun']; ?></td>
                <td><?php echo $value['nrp']; ?></td>
                <td><?php echo $value['nama_lengkap']; ?></td>
                <td><?php echo $value['program_studi']; ?></td>
                <td><?php echo $value['pendidikan']; ?></td>
                <td><?php echo $value['alamat_ktp']; ?></td>
                <td><?php echo $value['alamat_domisili']; ?></td>
                <td><?php echo $value['email_bea']; ?></td>
                <td><?php echo $value['no_hp_bea']; ?></td>
                <td><?php echo $value['jenis_reward']; ?></td>
                <td><?php echo $value['lama_pembiayaan']; ?></td>
                <td><?php echo $value['sejak'] . " - " . $value['sejak_tahun']; ?></td>
                <td><?php echo $value['sampai'] . " - " . $value['sampai_tahun']; ?></td>
                <td><?php echo nominal($value['satuan_biaya']); ?></td>
                <td><?php echo nominal($value['total_biaya']); ?></td>
                <td><?php echo $value['jenis_luaran']; ?></td>
                <td><?php echo $value['isi_luaran']; ?></td>
                <td><?php echo $value['status_luaran']; ?></td>
                <td><?php
                    if ($value['status_luaran'] == 1) echo "Luaran Terkumpul";
                    else echo "Belum Upload";
                    ?>
                </td>
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