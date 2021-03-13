<h1>BUKU YANG LEWAT TENGGANG WAKTU</h1>
<table class="table table-borderede" id="datatable">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Buku</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Peminjam</th>
            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Tanggal Harus Kembali</th>
            <th scope="col">Tanggal Kembali</th>
            <th scope="col">Jumlah Pinjam</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($lewatWaktuTenggang as $data) : ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $data->kode_buku ?></td>
                <td><?= $data->nama_buku ?></td>
                <td><?= $data->username ?></td>
                <td><?= $data->tanggal_pinjam ?></td>
                <td><?= $data->tanggal_harus_kembali ?></td>
                <td><?= $data->tanggal_kembali ?></td>
                <td><?= $data->jumlah_pinjam ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>