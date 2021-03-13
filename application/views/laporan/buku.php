<h1>Laporan Buku</h1>

<table width="80%" align="center">
    <tr>
        <th>
            <center> no</center>
        </th>
        <th>
            <center> nama buku</center>
        </th>
        <th>
            <center> stock buku</center>
        </th>
        <th>
            <center> kondisi buku</center>
        </th>
        <th>
            <center> Jenis Buku</center>
        </th>
    </tr>
    <?php
    $i = 1;
    foreach ($buku as $data) { ?>
        <tr>
            <th>
                <center><?= $i++ ?></center>
            </th>
            <td>
                <center><?= $data->nama_buku ?></center>
            </td>
            <td>
                <center><?= $data->stock_buku ?></center>
            </td>
            <td>
                <center><?= $data->kondisi ?></center>
            </td>
            <td>
                <center><?= $data->nama_jenis ?></center>
            </td>

        </tr>
    <?php } ?>
</table>