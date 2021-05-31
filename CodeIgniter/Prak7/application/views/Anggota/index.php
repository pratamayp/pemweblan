<div class="container">
    <div class="flash-data" data-f(lashdata="<?= $this->session->flashdata('flash') ?>"></div>
    <br>    
    <h2 class="text-center"><?= $title ?></h2><br>
    <table class="table col-sm-10 offset-1">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <?php $i = 1; foreach($anggota as $row) : ?>
        <tbody>
            <tr>
                <td scope="row"><?= $i ?></td>
                <td><?= $row['nis'] ?></td>
                <td><?= $row['nama'] ?></td>

                <td><?= $row['nama_kelas'] ?></td>

                <td style="text-align : right"">
                    <a href=" <?= base_url() ?>anggota/detail/<?= $row['id'] ?>"
                    class="badge badge-pill badge-success">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    Detail
                    </a>
                    <a href="<?= base_url() ?>anggota/edit/<?= $row['id'] ?>" class="badge badge-pill badge-warning">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        Edit
                    </a>
                    <a href="<?= base_url() ?>anggota/hapus/<?= $row['id'] ?>"
                        class="badge badge-pill badge-danger tombol-hapus">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Delete
                    </a>
                </td>
            </tr>
        </tbody>
        <?php $i++; endforeach ?>
    </table>
</div>