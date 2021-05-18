<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
    <br>
    <?php if($this->session->flashdata('flash')) : ?>
        
    <?php endif; ?>
    <h2 class="text-center"><?= $title ?></h2>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">TTL</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No HP</th>
                <th scope="col">Email</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <?php $i = 1; foreach($anggota as $row) : ?>
        <tbody>
            <tr>
                <td scope="row"><?= $i ?></td>
                <td><?= $row['nis'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['tp_lhr'] ?>, <?= date("d F Y", strtotime($row['tg_lhr'])); ?></td>
                <td><?= $row['gender'] ?></td>
                <td><?= $row['no_hp'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['kelas'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td>
                    <a href="<?= base_url() ?>anggota/edit/<?= $row['id'] ?>" class="badge badge-pill badge-warning">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        Edit
                    </a>
                    <a href="<?= base_url() ?>anggota/hapus/<?= $row['id'] ?>" class="badge badge-pill badge-danger tombol-hapus">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Delete
                    </a>
                </td>
            </tr>
        </tbody>
        <?php $i++; endforeach ?>
    </table>
</div>