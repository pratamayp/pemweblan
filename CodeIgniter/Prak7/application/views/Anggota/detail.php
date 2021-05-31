<div class="container">
    <div class="row mt-3">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header text-center bg-dark text-white font-weight-bold">
                        <!-- <a href="<?php //base_url() ?>" class="text-white ml-5 float-left">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </a> -->
                    <?= $judul ?>
                </div>
                <div class="card-body">
                    <table style="width:80%">
                        <tr class="font-weight-bold">
                            <th>NIS</th>
                            <th><?= $anggota['nis'] ?></th>
                        </tr>
                        <tr class="font-weight-bold">
                            <td>Nama</td>
                            <td><?= $anggota['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Tp, Tgl Lahir</td>
                            <td><?= $anggota['tp_lhr'] ?>, <?= date("d F Y", strtotime($anggota['tg_lhr'])); ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?= $anggota['gender'] ?></td>
                        </tr>
                        <tr>
                            <td>No. HP</td>
                            <td><?= $anggota['no_hp'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?= $anggota['email'] ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td><?= $anggota['kelas'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $anggota['alamat'] ?></td>
                        </tr>
                    </table> <br>
                    <a href="<?= base_url() ?>anggota/" class="btn-sm btn-secondary" aria-hidden="true"
                        style="text-decoration: none;">
                        <i class="fa fa-angle-left" aria-hidden="true"></i> KEMBALI
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>