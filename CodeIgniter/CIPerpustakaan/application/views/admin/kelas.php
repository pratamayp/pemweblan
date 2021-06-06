                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
                    <br>
                    <h2 class="text-center"><?= $title ?></h2><br>
                    <table class="table col-sm-10 offset-1">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID Kelas</th>
                                <th scope="col">Nama Kelas</th>
                            </tr>
                        </thead>
                        <?php $i = 1; foreach($kelas as $row) : ?>
                        <tbody>
                            <tr>
                                <td scope="row"><?= $i ?></td>
                                <td><?= $row['id_kelas'] ?></td>
                                <td><?= $row['nama_kelas'] ?></td>
                            </tr>
                        </tbody>
                        <?php $i++; endforeach ?>
                    </table>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                </div>
                <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>