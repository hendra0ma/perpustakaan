<h1>Request Peminjam</h1>
<table class="table table-borderede" id="datatable">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Buku</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Peminjam</th>



            <th scope="col">Jumlah Pinjam</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($request as $data) : ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $data->kode_buku ?></td>
                <td><?= $data->nama_buku ?></td>
                <td><?= $data->username ?></td>
                <td><?= $data->jumlah_pinjam ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>