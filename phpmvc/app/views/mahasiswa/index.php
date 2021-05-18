<div class="container mt-4">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button> <br> <br>
            <h3>Daftar Mahasiswa</h3>

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Kewarganegaraan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($data['mhs'] as $mhs) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $mhs['nim'] ?></td>
                        <td><?= $mhs['nama'] ?></td>
                        <td><?= $mhs['tgl_lahir'] ?></td>
                        <td><?= $mhs['jk'] ?></td>
                        <td><?= $mhs['prodi'] ?></td>
                        <td><?= $mhs['kewarganegaraan'] ?></td>
                        <td><?= $mhs['stat'] ?></td>
                        <td><?= $mhs['keterangan'] ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id'] ?>"
                                class="badge badge-warning badge-pill float-right ml-1 tampilModalUbah"
                                data-toggle="modal" data-target="#formModal" data-id="<?=$mhs['id']?>">Edit</a>
                            <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id'] ?>"
                                class="badge badge-danger badge-pill float-right ml-1"
                                onclick="return confirm('Hapus data ?')">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; endforeach ?>
                </tbody>
            </table>


            <!-- <ul class="list-group">
                <li class="list-group-item"><?= $mhs['nim'] ?></li>
                <li class="list-group-item"><?= $mhs['nama'] ?></li>
                <li class="list-group-item"><?= $mhs['nama'] ?></li>
                <li class="list-group-item"><?= $mhs['nama'] ?></li>
                <li class="list-group-item"><?= $mhs['nama'] ?></li>
                <li class="list-group-item">
                    <?= $mhs['nama'] ?>
                </li>
            </ul> -->
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=BASEURL?>/mahasiswa/tambah" method="POST">
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="text" class="form-control" id="pass" name="pass">
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="L" name="jk" value="L" class="custom-control-input"
                                        required>
                                    <label class="custom-control-label" for="L">Laki-laki</label>
                                </div>
                            </div>
                            <div class="form-check form-check-inline">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="P" name="jk" value="P" class="custom-control-input"
                                        required>
                                    <label class="custom-control-label" for="P">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <select class="form-control" id="prodi" name="prodi">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div>Kewarganegaraan</div>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="kewarganegaraan"
                                    name="kewarganegaraan" value="WNI">
                                <label class="form-check-label" for="kewarganegaraan">
                                    WNI
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" readonly class="form-control-plaintext" name="stat" value="Aktif">

                    <label for="keterangan">Keterangan (opsional)</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"
                        style="resize:none"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>