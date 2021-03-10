<div class="container">
    <div class="card">
        <div class="card-body">
        
            <div class="table-responsive">
                <table class="table table-borderede" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Peminjam</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Harus Kembali</th>
                            <th scope="col">Jumlah Pinjam</th>
                            
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dikembalikan as $data) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $data->kode_buku ?></td>
                                <td><?= $data->nama_buku ?></td>
                                <td><?= $data->nama_lengkap ?></td>
                                <td><?= $data->nama_petugas ?></td>
                                <td><?= $data->tanggal_pinjam ?></td>
                                <td><?= $data->tanggal_kembali ?></td>
                                <td><?= $data->jumlah_pinjam ?></td>
                                <td>
                                    
                                    <a href="<?=base_url()?>dashboard/admin/peminjaman/delete/<?=$data->id_peminjaman?>" class="badge badge-danger"onclick="return confirm('yakin?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
