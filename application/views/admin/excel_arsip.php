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
            <th>Judul Kegiatan</th>
            <th>Nama Ketua</th>
            <th>HardCopy</th>
            <th>SoftCopy</th>

        </tr>

    </thead>

    <tbody>
        <!-- var_dump($data); -->
        <?php $a = 0;
        // $id = $data[0]['id_arsip'];
        $hardcopy = '';
        $softcopy = '';
        $nama = '';
        $judul = '';
        $tahun = '';
        foreach ($data as $key => $value) : $a++;

            // if ($value['id_arsip'] == $id) {
            //     // $nama = $value['nama_ketua'];
            //     // $judul = $value['judul'];
            //     // $tahun = $value['tahun'];
            //     if ($value['status'] == 1)
            //         $hardcopy = $hardcopy . cekNamaKategori($value['id_kategori']) .', ';
            //     if ($value['status_upload'] == 1)
            //     $softcopy = $softcopy . cekNamaKategori($value['id_kategori']) . ', ';
            // }
        ?>

            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $value['tahun'];  ?></td>
                <td><?php echo $value['judul']; ?></td>
                <td><?php echo $value['nama_ketua']; ?></td>
                <td><?php echo cekstatusSoftCopy($value['id_arsip'], 'hardcopy'); ?></td>
                <td><?php echo cekstatusSoftCopy($value['id_arsip'], 'softcopy'); ?></td>
            </tr>

        <?php $hardcopy = '';
            $softcopy = '';
            $nama = '';
            $judul = '';
            $tahun = '';

            $id = $value['id_arsip'];
        endforeach; ?>

    </tbody>

</table>