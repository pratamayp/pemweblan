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

<style>
.container {
    width: 50%;
}

body{
    background-color: #d1d1d1;
}
</style>

<body>
    <section id="cover">
        <div id="cover-caption">
            <div id="container" class="container shadow p-3 mb-4 mt-3 bg-white rounded">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <h2 class="text-center pt-4 ">Form Registrasi Mahasiswa</h2>
                        <div class="info-form"><br>

                        <?php if(validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors() ?>
                            </div>
                        <?php endif ?>
                            
                        <?= form_open('mahasiswa')?>

                        <?= form_label('NIM', 'nim') ?>
                        <?= form_input([
                            'type' => 'text',
                            'name' => 'nim',
                            'id' => 'nim',
                            'class' => 'form-control col-4',
                            'value' => set_value("nim") 
                            ]) ?>
                            <br>

                        <?= form_label('Nama', 'nama') ?>
                        <?= form_input([
                            'type' => 'text',
                            'name' => 'nama',
                            'id' => 'nama',
                            'class' => 'form-control',
                            'value' => set_value("nama")
                            ]) ?>
                        <br>
                        <?= form_label('Jurusan', 'jurusan') ?>
                        <?= form_dropdown('jurusan', [
                            '' => '',
                            'Teknik Informatika' => "Teknik Informatika",
                            'Matematika' => "Matematika",
                            'Statistika' => "Statistika"
                            ], set_value('jurusan'), 'class="form-control" id="jurusan"') ?>
                            <br>
                        <?= form_label('Jenis Kelamin', 'jk', ['class="form-control"']) ?><br>
                        <label for="L">
                            <?= form_radio('jk', 'Laki-laki', set_radio('jk', 'Laki-laki'), "id='L'"); ?> Laki-Laki
                        </label>

                        <label for="P">
                            <?= form_radio('jk', 'Perempuan', set_radio('jk', 'Perempuan'), "id='P'"); ?> Perempuan
                        </label>
                        <br>

                        <?= form_label('Alamat', 'alamat') ?>
                        <?= form_textarea([
                            'name' => 'alamat',
                            'id' => 'alamat',
                            'class' => 'form-control',
                            'rows' => '3',
                            'cols' => '30',
                            'value' => set_value("alamat")
                        ]) ?>
                            <br><hr><br>
                        <?= form_label('Username', 'username') ?>
                        <?= form_input([
                            'type' => 'text',
                            'name' => 'username',
                            'id' => 'username',
                            'class' => 'form-control',
                            'value' => set_value("username")
                        ]) ?>
                            <br>
                        <?= form_label('Password', 'pw') ?>
                        <?= form_input([
                            'type' => 'password',
                            'name' => 'pw',
                            'id' => 'pw',
                            'class' => 'form-control'
                        ]) ?>
                            <br>
                        <?= form_label('Konfirmasi Password', 'confpw') ?>
                        <?= form_input([
                            'type' => 'password',
                            'name' => 'confpw',
                            'id' => 'confpw',
                            'class' => 'form-control'
                        ]) ?>
                            <br>
                            
                        <?= form_checkbox('agree', 'agree', FALSE, 'id="agree"'); ?>
                        <?= form_label('Setuju ketentuan yang berlaku', 'agree') ?>
                            <br><br>

                        <?= form_submit('tombolSubmit', 'REGISTER', 'class="btn btn-primary"') ?>

                        <?= form_close() ?>

                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>