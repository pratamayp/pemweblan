$(function(){

    $('.tombolTambahData').on('click', function(){
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data'); 

        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nim').val('');
        $('#nama').val('');
        $('#pass').val('');
        $('#tgl_lahir').val('');
        $('#L').val('');
        $('#P').val('');
        $('#prodi').val('');
        $('#kewarganegaraan').val('');
        $('#stat').val('');
        $('#keterangan').val('');
        $('#id').val('');
    });

    $('.tampilModalUbah').on('click', function(){
        $('#judulModal').html('Edit Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data'); 

        $('.modal-body form').attr('action', 'http://localhost/pemweblan/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            url:'http://localhost/pemweblan/phpmvc/public/mahasiswa/getubah', 
            data:{id : id},
            method:'post',
            dataType: 'json',
            success: function(data){
                // if(data.jk=="L"){
                //     $('input:radio[name=L]')[0].checked = true;             
                // }else{
                //     $('input:radio[name=P]')[0].checked = true;
                // }   

                $('#nim').val(data.nim);
                $('#nama').val(data.nama);
                $('#pass').val(data.pass);
                $('#tgl_lahir').val(data.tgl_lahir);
                // $('input:radio[name=jk][value='+data.jk+']')[0].checked = true;
                $('#prodi').val(data.prodi);
                $('#kewarganegaraan').val(data.kewarganegaraan);
                $('#stat').val(data.stat);
                $('#keterangan').val(data.keterangan);
                $('#id').val(data.id);
            }
        });

    });


});