<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=data_kp.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

    <thead>

        <tr>

            <th>Nama Pengusul</th>

            <th>Asal</th>

            <th>Tanggal Usul</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($data as $key => $value) : ?>

            <tr>

                <td><?php echo $value['nama'];  ?></td>

                <td><?php echo $value['universitas']; ?></td>

                <td><?php echo $value['tanggal_submit']; ?></td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>