<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Form Registrasi</title>

</head>

<body>

    <div class="container">
        <h3>Form berhasil disubmit</h3>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">@<?= set_value('username') ?></h5>
                <h6 class="card-subtitle mb-2 text-muted text-center"><?= strtoupper(set_value('nim')) ?></h6>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>: <?= set_value('nama') ?></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>: <?= set_value('jurusan') ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: <?= set_value('jk') ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?= set_value('alamat') ?></td>
                    </tr>
                </table>
                <?php 
                    // echo $this->getAllMhs();
                ?>
                <a href="http://localhost/pemweblan/CodeIgniter/CIFormHelper/mahasiswa" class="card-link">Coba Lagi!</a>
            </div>
        </div>
    </div>

</body>

</html>