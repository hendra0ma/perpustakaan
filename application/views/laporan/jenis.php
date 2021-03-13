<h1>JENIS JENIS BUKU</h1>
<table class="table table-borderede" id="datatable">
    <thead>
        <tr>
            <th scope="col">no</th>
            <th scope="col">jenis buku</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($jenis as $data) : ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $data->nama_jenis ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>