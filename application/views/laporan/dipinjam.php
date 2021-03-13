<h1>BUKU YANG DIPINJAM</h1>

<h3>By Admin</h3>
<table class="table" id="datatable">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Buku</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Peminjam</th>

            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Tanggal harus Kembali</th>
            <th scope="col">Jumlah Pinjam</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($dipinjam as $data) : ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $data->kode_buku ?></td>
                <td><?= $data->nama_buku ?></td>
                <td><?= $data->username ?></td>
                <td><?= $data->tanggal_pinjam ?></td>
                <td><?= $data->tanggal_harus_kembali ?></td>
                <td><?= $data->jumlah_pinjam ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<h3>By Petugas</h3>
<table class="table datatable">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Buku</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Peminjam</th>
            <th scope="col">petugas</th>
            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Tanggal harus Kembali</th>
            <th scope="col">Jumlah Pinjam</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($dipinjamBypetugas as $data) : ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $data->kode_buku ?></td>
                <td><?= $data->nama_buku ?></td>
                <td><?= $data->username ?></td>
                <td><?= $data->nama_petugas ?></td>
                <td><?= $data->tanggal_pinjam ?></td>
                <td><?= $data->tanggal_harus_kembali ?></td>
                <td><?= $data->jumlah_pinjam ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>